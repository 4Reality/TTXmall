<?php
namespace fast;

use app\common\model\Attachment;
use app\common\model\ConfigUpload;
use OSS\Core\OssException;
use think\Request;

//上传类
class Upload {

    protected $request;
    protected $mini_config;//配置
    protected $path_type;//图片  音频   视频
    protected $attachment_model;

    /**
     * 架构函数
     * @param Request $request Request对象
     * @access public
     */
    public function __construct(Request $request = null)
    {
        if (is_null($request)) {
            $request = Request::instance();
        }
        $this->request = $request;
        $this->attachment_model = new Attachment();
        $this->mini_config=new ConfigUpload();
    }

    /**
     * 上传图片
     */
    public function upload($uniacid,$type) {
        if($type=='picture'){
            //图片上传的配置
            $image_config      = [
                'mimes'=>'image/*',
                'maxSize'=>2097152,
                'exts'=>'gif,jpg,jpeg,bmp,png',
                'subName'=>[
                    0=>'date',
                    1=>'Y-m-d',
                ],
                'rootPath'=>PUBLIC_PATH.'uploads/picture',//图片路径
                'savePath'=>'',
                'weiqinPath'=>$_SERVER['DOCUMENT_ROOT'].'/attachment/upload/'.$uniacid.'/picture',
                'saveName'=>'uniqid',
                'driver'=>'local',
            ];
        }
        if($type=='audio'){//音频
            $image_config      = [
                'maxSize'=>2097152,
                'exts'=>'mp3,wma,wav,m4a',
                'subName'=>[
                    0=>'date',
                    1=>'Y-m-d',
                ],
                'rootPath'=>PUBLIC_PATH.'uploads/audio',//音频路径
                'savePath'=>'',
                'weiqinPath'=>$_SERVER['DOCUMENT_ROOT'].'/attachment/upload/'.$uniacid.'/audio',
                'saveName'=>'uniqid',
                'driver'=>'local',
            ];
        }
        if($type=='video'){//视频
            $image_config      = [
                'maxSize'=>2097152,
                'exts'=>'wmv,mp4,avi,mpg,rmvb',
                'subName'=>[
                    0=>'date',
                    1=>'Y-m-d',
                ],
                'rootPath'=>PUBLIC_PATH.'uploads/video',//图片路径
                'savePath'=>'',
                'weiqinPath'=>$_SERVER['DOCUMENT_ROOT'].'/attachment/upload/'.$uniacid.'/video',
                'saveName'=>'uniqid',
                'driver'=>'local',
            ];
        }
        //先保存载本地

        //图片上传路径
        $rootPath =$image_config['rootPath'];

        //判断是否从微擎进入
        if(defined('IS_WEIQIN')){
            $rootPath=$image_config['weiqinPath'];
        }
        $upload_path = $rootPath.'/'.call_user_func_array($image_config['subName'][0],[$image_config['subName'][1],time()]);

        // 获取表单上传的图片
        $file = $this->request->file('file');
        if ($file->validate(['size'=>$image_config['maxSize'],'ext'=>$image_config['exts']])) {//验证通过

            $info = $file->rule($image_config['saveName'])->move($upload_path, true, false);//保存文件

            //获取数组数据   保存数据库
            $upload_info = $this->parseFile($info);
            //是否开启了阿里云
            $mini_config=$this->mini_config->get(['uniacid'=>$uniacid]);
            if($mini_config['oss'] == 0){
                //上传阿里云
                $oss_res=$this->oss_upload($upload_info['path'],$uniacid);
                $upload_info['driver']='aliyun';
                if(isset($oss_res['info']['url'])){
                    $upload_info['src']=$oss_res['info']['url'];//完整路径
                }else{
                    $upload_info['src']='';
                }
            }else{//本地
                $upload_info['driver']='local';
                if(defined('IS_WEIQIN')){
                    $media_path='/';
                }else{
                    if(defined('MEDIA_PATH')){// define('MEDIA_PATH', '/addons/'.APP_NAME.'/core/public/');
                        $media_path=MEDIA_PATH;
                    }else{
                        $media_path='/';
                    }
                }
                $upload_info['src']=getHttpUrlRoot().$media_path.$upload_info['path'];
            }
            //判断这条记录是否存在
            $ori=$this->attachment_model->where(['uniacid'=>$uniacid,'sha1'=>$upload_info['sha1'],'driver'=>$upload_info['driver']])->find();

            $upload_info['uniacid']=$uniacid;
            $upload_info['status']=1;

            if($ori){
                $upload_info['id']=$ori['id'];
                $return = [
                    'code'=>0,
                    'msg' =>'success',
                    'data'=>$upload_info
                ];
            }else{
                //新增 保存进数据表
                $res=$this->attachment_model->insertGetId($upload_info);
                if($res){
                    //刚插入的id
                    $upload_info['id']=$res;
                    $return = [
                        'code'=>0,
                        'msg' =>'success',
                        'data'=>$upload_info
                    ];
                }else{
                    $return = [
                        'code' =>1,
                        'msg'  =>'save_sql_fail',
                        'data' =>[],
                    ];
                }
            }

        } else {
            $return = [
                'code' =>1,//code大于0就是失败
                'msg'  =>$file->getError(),
                'data' =>[],
            ];
        }
        return $return;
    }

    /**
     * 获取文件信息
     * @param  [type] $info [description]
     * @return [type]       [description]
     */
    protected function parseFile($info) {
        if(defined('IS_WEIQIN')){
            $start=strlen($_SERVER['DOCUMENT_ROOT'])+1;
        }else{
            $start=strlen(PUBLIC_PATH);
        }
        $data = [];
        if (!empty($info)) {
            $data['create_time'] = $info->getATime();
            $data['ext']         = $info->getExtension();
            $data['name']    	 = $data['alt']= str_replace('.'.$data['ext'],'',$info->getInfo()['name']);
            $data['path_type']    = $this->path_type;
            $data['mime_type']    = $info->getMime() ? strstr($info->getMime(),'/',true):'';
            $data['path']         = str_replace("\\", '/', substr($info->getPathname(), $start));
            $data['size']        = $info->getSize();
            $data['md5']         = md5_file($info->getPathname());
            $data['sha1']        = sha1_file($info->getPathname());
        }
        return $data;
    }
    /*
     * 上传阿里云
     *  $param string $object 图片路径
     * */
    //上传阿里云
    public function oss_upload($object = '',$uniacid = 0 , $fc = 0) {

        $mini_config = $this->mini_config->get(['uniacid'=>$uniacid]);
        $path = ltrim($object,'/');
        $object = $mini_config['al_base_dir'].'/'.$object;
        //try 要执行的代码,如果代码执行过程中某一条语句发生异常,则程序直接跳转到CATCH块中,由$e收集错误信息和显示
        try{
            $bucket = $mini_config['al_bucket'];
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/'.$path;
            if (file_exists($filePath)) {
                if($fc == 0) {
                    //本地文件的路径
                    if (defined('IS_WEIQIN')) {
                        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $path;
                    } else {
                        $filePath = PUBLIC_PATH . $path;
                    }
                }
                //实例化OSS
                require_once  EXTEND_PATH.'aliyuncs/oss-sdk-php/autoload.php';
                $ossClient =new \OSS\OssClient($mini_config['al_access_key_id'],$mini_config['al_access_key_secret'],$mini_config['al_endpoint']);
                //uploadFile的上传方法
                $res = $ossClient->uploadFile($bucket, $object, $filePath);
                return ['code' => true , 'data' => $res];
            }
        } catch(OssException $e) {
            //如果出错这里返回报错信息
            return ['code' => false , 'data' => $e->getMessage()];
        }
        //否则，完成上传操作
        return ['code' => false , 'data' => __('糟糕,好像没找到文件了呢!')];
    }
}
