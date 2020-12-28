<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: luofei614 <weibo.com/luofei614>
// +----------------------------------------------------------------------
// | 修改者: anuo (本权限类在原3.2.3的基础上修改过来的)
// +----------------------------------------------------------------------

namespace printer;

class Printer
{


    /*
     *  飞鹅  打印/检查打印机状态
     * */
    public static function FeiePrintMsg($config , $orderInfo , $apiname = 'Open_printMsg')
    {
        $content = array(
            'user' => $config['user'],
            'stime' => $_SERVER['REQUEST_TIME'],
            'sig' => sha1($config['user'] . $config['ukey'] . $_SERVER['REQUEST_TIME']),
            'apiname' => $apiname,

            'sn' => $config['sn'],
            'content' => $orderInfo,
            'times' => 1
        );
        return self::getStream($content);

    }
    /*
     * @param array $index 订单ID
     * 根据订单索引,去查询订单是否打印成功
     *
     * */
    public static function FeieQueryOrderState($config , $index){
        $msgInfo = array(
            'user' => $config['user'],
            'stime' => $_SERVER['REQUEST_TIME'],
            'sig' => sha1($config['user'] . $config['ukey'] . $_SERVER['REQUEST_TIME']),
            'apiname'=>'Open_queryOrderState',
            'orderid'=>$index
        );
      return self::getStream($msgInfo);
    }

    /**
     * Request stream.
     * @param array $msgInfo
     * @return array
     */
    protected static function getStream($msgInfo)
    {
        $client = new \printer\HttpClient('api.feieyun.cn',80);
        if(!$client->post('/Api/Open/',$msgInfo))
            return ['code' => false];
        else
            return json_decode($client->getContent(),true);
    }
//      飞鹅 over



// 易联云

    /**
     * 打印接口
     * @param  int $partner     用户ID
     * @param  string $machine_code 打印机终端号
     * @param  string $content      打印内容
     * @param  string $apiKey       API密钥
     * @param  string $msign       打印机密钥
     */

    public static function  action_print($partner,$machine_code,$content,$apiKey,$msign)
    {
        $param = array(
            "partner"=>$partner,
            'machine_code'=>$machine_code,
            'time'=>time(),
        );

        //获取签名
        $param['sign'] = self::generateSign($param,$apiKey,$msign);
        $param['content'] = $content;
        $str = self::getStr($param);
        return json_decode(self::sendCmd('http://open.10ss.net:8888',$str) , true);
    }

    /**
     * 生成签名sign
     * @param  array $params 参数
     * @param  string $apiKey API密钥
     * @param  string $msign 打印机密钥
     * @return   string sign
     */

    protected static function generateSign($params, $apiKey,$msign)
    {
        //所有请求参数按照字母先后顺序排
        ksort($params);
        //定义字符串开始所包括的字符串
        $stringToBeSigned = $apiKey;
        //把所有参数名和参数值串在一起
        foreach ($params as $k => $v)
        {
            $stringToBeSigned .= urldecode($k.$v);
        }
        unset($k, $v);
        //定义字符串结尾所包括的字符串
        $stringToBeSigned .= $msign;
        //使用MD5进行加密，再转化成大写
        return strtoupper(md5($stringToBeSigned));
    }
    /**
     * 生成字符串参数
     * @param array $param 参数
     * @return  string        参数字符串
     */
    protected static function getStr($param)
    {
        $str = '';
        foreach ($param as $key => $value) {
            $str=$str.$key.'='.$value.'&';
        }
        $str = rtrim($str,'&');
        return $str;
    }

    /**
     * 发起请求
     * @param  string $url  请求地址
     * @param  string $data 请求数据包
     * @return   string      请求返回数据
     */

    protected static function sendCmd($url,$data)
    {
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检测
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:')); //解决数据包大不能提交
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回

        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);
        }
        curl_close($curl); // 关键CURL会话
        return $tmpInfo; // 返回数据
    }
}
