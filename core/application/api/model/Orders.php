<?php

namespace app\api\model;

use app\api\library\InitModel;
use think\Db;
use printer\Printer;
use think\Session;
use app\api\model\Shopbag as shopbagModel;
class Orders Extends InitModel
{
    // 表名
    protected $name = 'longbing_shequpintuan_orders';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';
    protected $resultSetType = 'collection';

    // 追加属性
    protected $append = [
    ];
//    自动转换数据
    protected $type = [
        'coupon_data'    =>  'serialize',
        'pay_data'     =>  'serialize',
        'ref_data'    =>  'serialize',
//        'order_path'    =>  'serialize',
    ];
    /*
        *  反射回父类调用
        *  在经验限制内只能想到此方法
        *  如果能简便方法 请自行更改 请勿骂人!!!!!!!
        *
        * */
    static public function initModel(){
        return __CLASS__ ;
    }

    /* public function setGoodsDataAttr($value)
     {
         return serialize($value);
     }*/
    public function Shopbag()
    {
        return $this->hasMany('Shopbag' , 'oid');
    }
    public function getAddressDataAttr($value , $data)
    {
        $value = ($value) ? lb_mb_unserialize($value) : '';
        return $value;
    }

    /* public function getFxPriceAttr($value , $data)
     {
         $value = \app\api\model\Shopbag::where('oid' , $value)->sum('fx_price');
         return $value;
     }*/
    public function getAtvIdAttr($value , $data)
    {
        $value = ($value) ? $value : $data['atv_id'];
        $value = \app\api\model\Activity::get($value);
        return ($value) ? $value->toArray() : [];
    }

    /*
     *  格式化货单商品
     * */
    public function printfGoods($order)
    {
        $tmp  = [];
//            格式化商品
        if($order){
            $list = [];
            foreach ($order as $k => $v){
                $oborder = self::get($v['oid']);
                if(empty($oborder))
                    return false;
                foreach ($oborder->goods_data as $j => $p){
                    $list[$k][$j]['id'] = $p['goods_id'];
                    $list[$k][$j]['goods_name'] = $p['goods_name'];
                    $list[$k][$j]['goods_num'] = $p['goods_num'];
                    $list[$k][$j]['price'] = $p['price'];
                    $list[$k][$j]['norms'] = $p['norms'];
                }
            }
//            去重相加
            foreach($list as $v) {
                foreach($v as $z) {
                    if (empty($tmp[$z['id']]))
                        $tmp[$z['id']] = $z;
                    else {
                        $tmp[$z['id']]['goods_num'] += $z['goods_num'];
                        $tmp[$z['id']]['price'] = round(($tmp[$z['id']]['price'] + $z['price']), 2);
                    }
                }
            }
        }
        return array_merge($tmp);
    }

    public function setAddressDataAttr($value)
    {
        return serialize($value);
    }


//               兼容老数据  过个一个月左右就可以直接用新数据
    public function getGoodsDataAttr($value , $data)
    {
        if(empty($value)){
            $order = self::get($data['id']);
            $value = $order->Shopbag->toArray();;
        }else{
            $value = unserialize($value);
        }
        /*
        if($value){
            for ($i = 0; $i < sizeof($value); $i++){
                $value[$i]['comment_id'] = \app\api\model\Shopbag::where('id',$value[$i]['id'])->column('comment_id')[0];
            }
        }*/
        return $value;
    }

    /*
     *  用户端订单
     *
     * */
    /*public function ShowOrders($map , $type)
    {
        if($type != 999)
            $map['pay_type'] = $type;
        $orders = self::where($map)->order('update_time desc')->paginate(10)->toArray();
        if($orders['data']){
            foreach ($orders['data'] as $k => $v){
                $v['is_end'] = true; ###　未付款判断是否能取消订单 true能取消
                    if($v['pay_type'] == 0 || $v['pay_type'] == 1){
                        if($v['atv_id']['end_time'] <= $_SERVER['REQUEST_TIME']){
                            $v['is_end'] = false;
                        }
                    }
            }
        }
        return $orders;
    }*/

    public function msgAll($user)
    {
//        $user['all'] = self::where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] , 'pay_type' => ['ELT' , 3]])->where('pay_type','EGT','0')->count();
        $user['all'] = 0;
        $user['not_pay']  = self::where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] ,'pay_type' => 0])->count();
        $user['not_send'] = self::where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] ,'pay_type' => 1])->count();
        $user['not_up']   = self::where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] ,'pay_type' => 3])->count();
        $user['end']      = self::where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] ,'pay_type' => 4])->count();
        $user['return_num']= Db::name('longbing_shequpintuan_order_return')->where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] ,'company_status' => 0])->count();
        $user['evaluate']  = Db::name('longbing_shequpintuan_goods_evaluate')->where(['user_id' => $user['id'] ,'uniacid' => $user['uniacid']])->count();
        $end_order = Db::name('longbing_shequpintuan_orders')->where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] ,'pay_type' => 4,'end_time'=>['>',time()-7*86400]])->select();
        if(!empty($end_order)){
            $oid      = array_column($end_order,'id');
            $shop_num = Db::name('longbing_shequpintuan_shopbag')->where(['uid' => $user['id'] , 'uniacid' => $user['uniacid'] ,'oid' =>['IN',$oid]])->count();
            $user['evaluate'] = $shop_num-$user['evaluate'];
        }else{
            $user['evaluate'] = 0;
        }
        return $user;
    }
    /*
     *
     *  取消订单
     *  -4002 商品库存修改失败
     *  -4001 购物袋删除失败
     * */

    public function cancelOrder($orders , $newresult,$uniacid)
    {
        Db::startTrans();
        $printsModel = new \app\api\model\ConfigPrinter();
        $prints = $printsModel->get(['uniacid' => $uniacid, 'status' => 1 , 'isauto' => 1,'city_id'=>0]);
        for ($i = 0; $i < sizeof($orders); $i++){
            if(!empty($orders[$i]['pay_type'])&&$prints&&$orders[$i]['pay_type']>0){
                if(!in_array('',$prints->obconfig)){
                    $map['id'] = $orders[$i]['id'];
                    $order = self::where($map)->find();
                    $lift = $order->lift;
                    $goods = $order->goods_data;
                    if(empty($goods)){
                        $id = $order->id;
                        $goods = model('Shopbag')->where(array('oid'=>$id))->select()->toArray();
                    }
                    $re = $this->fonts($goods , $order , $lift , $prints);
                    if ($re['ret'] != 0)
                        return ['code' => false, 'data' => $re['ret']];
                    model('Orders')->where(['id'=>$order->id])->update(['print_status'=>1]);
                    lb_mylog('用户取消订单打印', $re, $uniacid);
                }
            }

//                    修改支付状态
            $re = self::where('id' , $orders[$i]['id'])->update(['pay_type' => -1 ,'ref_data' => serialize($newresult) , 'ref_time' => $_SERVER['REQUEST_TIME']]);
            if($re === false)
                return ['code' => false , 'data' => __('订单更新失败啦!')];
            $obgoods = $orders[$i]['goods_data'];
//                减去商品库存和关联订单
            for ($j = 0; $j < sizeof($obgoods); $j++){
                $goods = model('Goods')->get($obgoods[$j]['goods_id']);
                $goods->stock = $goods->stock + $obgoods[$j]['goods_num'];
                if(!empty($obgoods[$j]['much_norms'])){
                    model('GoodsNorms')->editNormsStock($obgoods[$j]['much_norms'],$obgoods[$j]['goods_num']*-1);
                }

                if($goods->save() === false)
                    return ['code' => true , 'data' => -4002];
            }
            if(shopbagModel::where('oid' , $orders[$i]['id'])->update(['qx_is' => 1]) === false)
                return ['code' => true , 'data' => -4001];
        }
        Db::commit();
        return ['code' => true , 'data' => 200];
    }
    /*
     *  易联云和飞鹅打印
     *
     * */
    public function fonts($goods , $order ,$lift , $printer,$status='')
    {
        if(!empty($order->delivery_data)){
            $order->delivery_data = unserialize($order->delivery_data);
            $delivery_data = date('H:s',$order['delivery_data']['start_time']).'-'.date('H:s',$order['delivery_data']['end_time']);
        }
        $lift_text = $lift==1?'送货上门':'自提';
        $order_text = empty($order->order_text)?'无':$order->order_text;
        if($printer->uniquepr == 1){
            $brs = "\n";
            $orderInfo = $status==1?'用户订单'.$brs:'用户取消订单'.$brs;
        } else{
            $brs = "<BR>";
            $orderInfo = $status==1?'<CB>用户订单</CB><BR>':'<CB>用户取消订单</CB><BR>';
        }
        $orderInfo .= '--------------------------------'.$brs;
        foreach ($goods as $v) {
            $v['goods_name'] = mb_convert_encoding($v['goods_name'], "UTF-8", "auto");
            $orderInfo .= '商品名称:'.$v['goods_name'].$brs;
            $orderInfo .= '活动价格:'.round($v['price'],2).$brs;
            $orderInfo .= '商品数量:'.$v['goods_num'].$brs;
            $orderInfo .= '商品规格:'.$v['norms'].$brs;
            $orderInfo .= '合计金额:'.($v['price'] * $v['goods_num']).$brs;
            $orderInfo .= '****************************'.$brs;
        }
        $orderInfo .= '编号:' . $order->order_code.$brs;
        $orderInfo .= '合计:' . $order->pay_price . '元'.$brs;
        $orderInfo .= '用户:' . $order->address_data['nickname'].$brs;
        $orderInfo .= '微信名:'. $order->uid['nickname'].$brs;
        $orderInfo .= '电话:' . $order->address_data['mobile'] .$brs;
        $orderInfo .= empty($order->address_data['captain_text'])?'小区:' . '无' .$brs:'小区:' .$order->address_data['captain_text']['homename'] .$brs;
        $orderInfo .= empty($order->address_data['captain_text'])?'团长:' . '无' .$brs:'团长:' .$order->address_data['captain_text']['username'] .$brs;
        $orderInfo .= empty($order->address_data['captain_text'])?'团长电话:' . '无' .$brs:'团长电话:' .$order->address_data['captain_text']['mobile'] .$brs;
        $orderInfo .= '配送方式:' . $lift_text .$brs;
        if($lift==1){
            $orderInfo .= '配送费:' . $order->freight .$brs;
            $orderInfo .= '楼层信息:'.$order->address_data['storey'] .$brs;
        }
        $orderInfo .= '配送时间:' . date('Y-m-d H:i:s' , $order->delivery_time) .$brs;
        $orderInfo .= '留言信息:' . $order_text .$brs;
        if(!empty($delivery_data)){
            $orderInfo .= '配送时间段:' . $delivery_data .$brs;
        }
        $orderInfo .= $order->is_spike==1?'秒杀订单:是':'秒杀订单:否'.$brs;
        $orderInfo .= $order->is_virtual==1?'商品类型:虚拟商品':'商品类型:普通商品'.$brs;
        $orderInfo .= '使用积分:' . $order->use_integral .$brs;
        $orderInfo .= '赠送积分:' . $order->send_integral .$brs;
        if($printer->uniquepr == 1){
            $re = Printer::action_print($printer->obconfig['user_id'], $printer->obconfig['machine_code'],$orderInfo,$printer->obconfig['apiKey'],$printer->obconfig['msign']);
            $re['ret'] = 0;
        } else{
            $re = Printer::FeiePrintMsg($printer->obconfig, $orderInfo);
        }
        return $re;
    }

    /*
     *用户付款自动打印订单
     *
     * */
    public function printerOrder(array $data ,$map ,$printer , &$level = -1)
    {
        $level ++;
        if($level < sizeof($data)){
            $map['id'] = $data[$level];
            $order = self::where($map)->find();
            $lift  = $order->lift;
            if(empty($goods)){
                $id = $order->id;
                $goods = model('Shopbag')->where(array('oid'=>$id))->select()->toArray();
            }
            if($order->pay_type >= 1) {
                $re = $this->fonts($goods , $order , $lift , $printer,1);
                if ($re['ret'] != 0)
                    return ['code' => false, 'msg' => $re['ret']];
                model('Orders')->where(['id'=>$order->id])->update(['print_status'=>1]);
                lb_mylog('用户订单打印', $re, $map['uniacid']);
            }
            $this->printerOrder($data,$map, $printer, $level);
        }
        return  ['code' => true, 'msg' => 200];
    }



    public function getUidAttr($value , $data)
    {
        $value = $value ? $value : $data['uid'];
        if(!empty(\app\api\model\User::get($value))){
            return \app\api\model\User::get($value)->toArray();
        }else{
            return [];
        }
    }
    /*
     *  团长端 - 订单
     *  和用户端分开  后期更改好看
     *
    public function capShowOrders($map , $type)
    {
        $map['pay_type'] = ($type == 999) ? ['IN','1,2,3'] : $type;
        $orders = self::where($map)->paginate(10)->visible(['id' , 'order_code' , 'goods_data' , 'address_data' , 'fx_price', 'count_price','pay_price' , 'pay_type'])->toArray();
        return $orders;
    }*/

    function sendMsg($data,$access_token){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=".$access_token);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $tmpInfo;
    }


    /**
     * @param $order_id
     * @return bool|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 支付成功模板消息
     */

    public function send($order_id,$uniacid){

        $template = model('ConfigTemplate')->where(['type'=>1,'uniacid'=>$uniacid])->find();
        if($template){
            $template_id = $template->template_id;
            $order = model('orders')->where('id',$order_id)->select()->toArray();
            //获取openid
            foreach ($order as $k=>$v){
                $goods = model('Shopbag')->where('oid',$v['id'])->select()->toArray();
                foreach ($goods as $ks=>$vs){
                    if($ks<=2){
                        $allgoods[] = $vs['goods_name'];
                    }
                }
                $order[$k]['goods_name'] = implode('/',$allgoods);//商品名字
            }
            //发送模板消息
            foreach ($order as $v){
                $access_token=lb_getToken($v['uniacid']);
//模板数据,微信要的是json数据,我这里先构建数组再转成json
                $data=array(
                    'touser'     => $v['uid']['openid'],//要发送的用户
                    'template_id'=> $template_id,//模板id,从模板库中获取,可通过接口获取或直接从小程序后台复制
                    "page"       => "pages/index/index",//跳转小程序的页面
                    'form_id'    => $v['prepay_id'],//表单提交场景下，为 submit 事件带上的 formId；支付场景下，为本次支付的 prepay_id
                    'data'=>array(
                        'keyword1'=>array(
                            'value'=>$v['uid']['captain_text']['homename'],
                        ),
                        'keyword2'=>array(
                            'value'=>$v['order_code'],
                        ),
                        'keyword3'=>array(
                            'value'=>$v['goods_name'],
                        ),
                        'keyword4'=>array(
                            'value'=>$v['uid']['captain_text']['username'],
                        ),
                        'keyword5'=>array(
                            'value'=>$v['uid']['captain_text']['mobile'],
                        ),
                        'keyword6'=>array(
                            'value'=>date('Y-m-d H:i:s',$v['delivery_time']),
                        ),
                    ),
                    'emphasis_keyword'=>'keyword1.DATA'//需要放大显示的关键词
                );//发送模板消息
                $result=$this->sendMsg(json_encode($data),$access_token);
                return $result;
            }
        }
    }

    /**
     * @param $order_id
     * @return bool|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 收货成功模板消息
     */

    public function sendGoods($order_id,$uniacid){

        $template = model('ConfigTemplate')->where(['type'=>0,'uniacid'=>$uniacid])->find();
        if($template){
            $template_id = $template->template_id;
            $order = model('orders')->where('id',$order_id)->select()->toArray();
            foreach ($order as $k=>$v){
                $order[$k]['cap_info']   = model('Applycaptain')->get($v['cap_id']);
                $goods = model('Shopbag')->where('oid',$v['id'])->select()->toArray();
                foreach ($goods as $ks=>$vs){
                    if($ks<=2){
                        $allgoods[] = $vs['goods_name'];
                    }
                }
                $order[$k]['goods_name'] = implode('/',$allgoods);//商品名字
                $f_dis = [];
                $f_dis['end_time'] = array('>',time());
                $f_dis['status']   = 0;
                $f_dis['uid']      = $v['uid']['id'];
                $formid = Db::name('longbing_shequpintuan_config_formid')->where($f_dis)->find();
                Db::name('longbing_shequpintuan_config_formid')->where(['id'=>$formid['id']])->update(['status'=>1]);
                $order[$k]['formid'] = $formid['form_id'];//团员电话
            }
            //发送模板消息
            foreach ($order as $v){
                $access_token=lb_getToken($v['uniacid']);
                $data=array(
                    'touser'     =>$v['uid']['openid'],//要发送的用户
                    'template_id'=>$template_id,//模板id,从模板库中获取,可通过接口获取或直接从小程序后台复制
                    "page"       =>"pages/index/index",//跳转小程序的页面
                    'form_id'    =>$v['formid'],//表单提交场景下，为 submit 事件带上的 formId；支付场景下，为本次支付的 prepay_id
                    'data'=>array(
                        'keyword1'=>array(
                            'value'=>$v['cap_info']['homename'],
                        ),
                        'keyword2'=>array(
                            'value'=>$v['cap_info']['username'],
                        ),
                        'keyword3'=>array(
                            'value'=>$v['cap_info']['mobile'],
                        ),
                        'keyword4'=>array(
                            'value'=>$v['order_code'],
                        ),
                        'keyword5'=>array(
                            'value'=>$v['goods_name'],
                        ),
                        'keyword6'=>array(
                            'value'=>date('Y-m-d H:i:s',$v['up_time']),
                        ),
                    ),
                    'emphasis_keyword'=>'keyword1.DATA'//需要放大显示的关键词
                );
//发送模板消息
                $result=$this->sendMsg(json_encode($data),$access_token);

                return $result;
            }
        }
    }

    /**
     * @throws \think\exception\DbException
     *
     * 供应商清单
     */

    public function supoclearorder($order){
        $carModel    = model('CargosSup');
        $carsupModel = model('CargosSupConnect');
        $tmp = [];
        foreach ($order['goods_data'] as $k=>$v){
            $tmp[$v['sup_id']][] = $v;
        }

        foreach ($tmp as $k=>$v){
            foreach ($v as $j){
                $sup_id = $j['sup_id'];
            }
            $ins      = [];
            $sup_code = [];
            $ins['delivery_time'] = $order['delivery_time'];
            $ins['cityid']        = $order['cityid'];
            $ins['sup_id']        = $sup_id;
            $sup_code = $carModel->where($ins)->find();
            if(!$sup_code){
                $ins['cargos_code'] = date("Ymdhis") . \fast\Random::numeric(6);
                $car = $carModel->isUpdate(false)->allowField(true)->data($ins)->save();
                if($car === false)
                    $this->returnSuccess(-4002);
                $caid = $carModel->getLastInsID();
            }else{
                $caid = $sup_code->id;
            }
            $insert         = [];
            $insert['caid'] = $caid;
            $insert['oid']  = $order['id'] ;
            $carsupModel->isUpdate(false)->allowField(true)->data($insert)->save();
        }
        $res = model('orders')->where('id',$order['id'])->update(['cargoid' =>1]);
        return $res;
    }


    /**
     * @param $order
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException\
     * 团长清单
     */

    public function capclearorder($order){
        $carModel    = model('Cargos');
        $carconModel = model('CargosConnect');
        $ins = [];
        $ins['delivery_time'] = $order['delivery_time'];
        $ins['cityid']        = $order['cityid'];
        $ins['cap_id']        = $order['cap_id'];
        $sup_code = $carModel->where($ins)->find();
        if(!$sup_code){
            $ins['cargos_code']   = date("Ymdhis") . \fast\Random::numeric(6);
            $car = $carModel->isUpdate(false)->allowField(true)->data($ins)->save();
            if($car === false)
                $this->returnSuccess(-4002);
            $caid = $carModel->getLastInsID();
        }else{
            $caid = $sup_code->id;
            if($sup_code->sign_status==1){
                $carModel->where(['id'=>$caid])->update(['sign_status'=>0]);
            }
        }
        $insert         = [];
        $insert['caid'] = $caid;
        $insert['oid']  = $order['id'] ;
        $carconModel->isUpdate(false)->allowField(true)->data($insert)->save();
        $res = model('orders')->where('id',$order['id'])->update(['cargoid' =>2]);
        return $res;
    }

    /**
     * @param array $order_id
     * @return InitModel
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException\
     * 自动清单
     */

    public function auto($order_id){
        $order = $this->getallorder($order_id);
        $res   = $this->supoclearorder($order);
        if($res!=1){
            return($res);
        }
        $res   = $this->capclearorder($order);
        return $res;
    }

    /**
     * @param $order_id
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取查询的订单
     */
    public function getallorder($order_id){
        $dis['id']       = $order_id;
        $order = model('orders')->where($dis)->find()->toArray();
        return $order;
    }

    /**
     * @param $order_id
     * @return array|int
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 订单退款删除清单
     */
    public function cancelclaerorder($order_id,$status=''){
        $dis = [];
        $dis['id']       = $order_id;
        $order = model('Orders')->where($dis)->find()->toArray();
        if($order['balance']>0&&$order['pay_type'] == 1&&$status!=1){//余额返回
            $user = model('User')->get($order['uid']['id']);
            $balance = $user->cash+$order['balance'];
            model('User')->where(['id'=>$order['uid']['id']])->update(['cash'=>$balance]);
        }
        if($order){
            //删除供应商清单
            $res = $this->canclesuporder($order);
            //删除团长清单
            $res = $this->canclecaporder($order);
            return $res;
        }else{
            return array();
        }

    }

    /**
     * @param $order
     * @return array|int
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 删除供应商清单
     */

    public function canclesuporder($order){
        $carsupModel    = model('CargosSup');
        $carsupconModel = model('CargosSupConnect');
        $car = $carsupconModel->where('oid',$order['id'])->select()->toArray();
        if($car){
            foreach ($car as $v){
                $ins = [];
                $ins['caid'] = $v['caid'];
                $ins['oid']  = ['neq',$order['id']];
                $y_car = $carsupconModel->where($ins)->find();
                if(empty($y_car)){
                    $carsupModel->where('id',$v['caid'])->delete();
                }
            }
            $res = $carsupconModel->where('oid',$order['id'])->delete();
            return $res;
        }else{
            return array();
        }
    }

    /**
     * @param $order
     * @return array|int
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 删除团长清单
     */

    public function canclecaporder($order){
        $carModel       = model('Cargos');
        $carconModel    = model('CargosConnect');
        $car = $carconModel->where('oid',$order['id'])->select()->toArray();
        if($car){
            foreach ($car as $v){
                $ins = [];
                $ins['caid'] = $v['caid'];
                $ins['oid']  = ['neq',$order['id']];
                $y_car = $carconModel->where($ins)->find();
                if(empty($y_car)){
                    $carModel->where('id',$v['caid'])->delete();
                }
            }
            $res = $carconModel->where('oid',$order['id'])->delete();
            return $res;
        }else{
            return array();
        }
    }

    /**
     * 扣除用户余额
     */

    public function deductionBalance($order_id){
        $order = Db::name('longbing_shequpintuan_orders')->where(['id'=>$order_id])->find();
        if($order['balance']>0){
            $user = model('User')->get($order['uid']);
            $cash = $user->cash-$order['balance'];
            $res  = model('User')->where(['id'=>$order['uid']])->update(['cash'=>$cash]);
            return $res;
        }

    }

    /**
     * @param $order_id
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 添加分销信息
     */
    public function addFX($order_id,$uniacid){
        $res  = true;
        $site = Db::name('longbing_shequpintuan_config_wechat')->where(['uniacid'=>$uniacid])->find();
        if($site['fx_status']==1){
            $order = Db::name('longbing_shequpintuan_orders')->where(['id'=>$order_id])->find();
            $user  = Db::name('longbing_shequpintuan_user')->where(['id'=>$order['uid']])->find();
            if(!empty($user['fx_pid'])){
                $res   = $this->addFxInfo(0,$order,$user['fx_pid']);
            }
        }
        return $res;
    }
    /**
     * @param $i
     * @param $data
     * 递归添加分销信息
     */
    public function addFxInfo($i,$order,$uid){
        $leve = Db::name('longbing_shequpintuan_user_fx')->where(['uniacid'=>$order['uniacid']])->count();
        $i++;
        if($i<=$leve){
            $d = Db::name('longbing_shequpintuan_user')->where(['id'=>$uid])->find();
            if(!empty($d)){
                Db::startTrans();
                $fx       = Db::name('longbing_shequpintuan_user_fx')->where(['uniacid'=>$order['uniacid'],'level'=>$i])->find();
                $fx_price = round($fx['balance']/100*$order['pay_price'],2);
                $ins['uniacid']   = $order['uniacid'];
                $ins['uid']       = $d['id'];
                $ins['cid']       = $order['uid'];
                $ins['time']      = time();
                $ins['cash']      = $fx_price;
                $ins['order_id']  = $order['id'];
                $ins['level']     = $i;
                $ins['order_code']= $order['order_code'];
                Db::name('longbing_shequpintuan_user_fx_record')->insert($ins);
                if(!empty($d['fx_pid'])){
                    $this->addFxInfo($i,$order,$d['fx_pid']);
                }
                Db::commit();
            }
        }
        return true;
    }

    /**
     * @param array $data
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 判段多个商品时有没有虚拟商品
     */


    public function virtualGoods($data=array(),$uniacid){

        if(count($data)>1){
            $goods = Db::name('longbing_shequpintuan_goods')->where(['uniacid'=>$uniacid,'id'=>['IN',$data],'virtual_goods'=>1])->find();
            if(!empty($goods)){
                return $goods['goods_name'];
            }
        }
        return true;

    }

    /**
     * @param array $data
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 判段虚拟商品
     */
    public function isVirtualGoods($map,$uniacid){
        $cap   = model('Capgoods')->where($map)->find();
        $goods = Db::name('longbing_shequpintuan_goods')->where(['uniacid'=>$uniacid,'id'=>$cap->gid['id'],'virtual_goods'=>1])->find();
        if(!empty($goods)){
            return $goods['goods_name'];
        }else{
            return true;
        }
    }

    /**
     * @param $uniacid
     * @return array
     * 获取虚拟商品
     */
    public function getVirtualGoods($uniacid){
        $goods = Db::name('longbing_shequpintuan_goods')->where(['uniacid'=>$uniacid,'virtual_goods'=>1])->column('id');
        return $goods;
    }

    /**
     * @param $uniacid
     * @param $goods_id
     * @return int
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 判断单个商品是不是虚拟商品
     */

    public function singeVirtualGoods($uniacid,$goods_id){
        $goods = Db::name('longbing_shequpintuan_goods')->where(['uniacid'=>$uniacid,'id'=>$goods_id,'virtual_goods'=>1])->field('id')->find();
        $res   = !empty($goods)?1:0;
        return $res;
    }

    /**
     * @param $order_id
     * 通过团长分销
     */
    public function passCapFx($order_id,$uniacid){
        $res = Db::name('longbing_shequpintuan_cap_level_cash')->where(['order_id'=>$order_id,'uniacid'=>$uniacid])->update(['status'=>1]);
    }


    /**
     * @param $order_code
     * @return bool|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     * 余额支付
     */

    public function balancePay($order_code,$user_info){

        $orderMode = new \app\api\model\Orders();
        $lntegral  = new \app\api\model\Integral();
        $order = $orderMode->get(['order_code' => $order_code , 'pay_type' => 0]);
        if (!$order || ($order->pay_type > 0 && $order->pay_time > 0)) { // 如果订单不存在 或者 订单已经支付过了
            return 'Order not exist.';
        }
        if($user_info['cash']<$order->balance){
            return 600;
        }
        $orderMode->send($order->id,$order->uniacid);//发送模板消息
        $orderMode->auto($order->id);//自动清单
        $orderMode->deductionBalance($order->id);
        $orderMode->addFX($order->id,$order->uniacid);
        $orderMode->passCapFx($order->id,$order->uniacid);
        $lntegral ->getUserIntegral($order->id,1);
        $order->pay_time = time();
        $order->pay_type = 1;
        $order->pay_data = 'balance pay';
        $order->save();
        $printsModel = new \app\api\model\ConfigPrinter();
        $prints  = $printsModel->get(['uniacid' => $order->uniacid , 'status' => 1 , 'isauto' => 1,'city_id'=>0]);
        if($prints){
            if(!in_array('',$prints->obconfig)){
                $orderMode->printerOrder([$order->id],['uniacid' => $order->uniacid] , $prints);
            }
        }
        return  true;

    }
    /**
     * @param $order_id
     * @param $uniacid
     * 获取退款的金额
     */
    public function getRefundPrice($order_id,$uniacid){
        $re_price   = Db::name('longbing_shequpintuan_order_return')->where(['uniacid'=>$uniacid,'order_id'=>$order_id])->sum('price');
        $re_balance = Db::name('longbing_shequpintuan_order_return')->where(['uniacid'=>$uniacid,'order_id'=>$order_id])->sum('balance');
        $price      = model('orders')->where(['id'=>$order_id])->sum('pay_price');
        $balance    = model('orders')->where(['id'=>$order_id])->sum('balance');
        $data['price']   = round($price-$re_price,2);
        $data['balance'] = round($balance-$re_balance,2);
        return $data;

    }



}
