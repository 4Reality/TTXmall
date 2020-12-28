<?php
namespace fast;

use app\api\model\Attachment;
use OSS\Core\OssException;
use think\Request;
use app\common\controller\Upload;

class Fastupload
{
    //上传接口(包括 图片  音频  视频  文件)
    public function upload()
    {
//        $this->checkToken();
        $input = input();
        //上传类型
        $type=$input['type'];
        if(!$type){
            $type='picture';
        }
        $uniacid = $input['i'];//uniacid
        $controller = new Upload();
        $return = $controller->upload($uniacid,$type);
//        resultJsonStr(0,'success',$return);
        exit(json_encode($return));
    }

}
