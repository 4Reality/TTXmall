<?php
namespace fast;

use app\api\model\Attachment;
use OSS\Core\OssException;
use think\Request;
use app\common\controller\Upload;

class Fastupload
{
    //�ϴ��ӿ�(���� ͼƬ  ��Ƶ  ��Ƶ  �ļ�)
    public function upload()
    {
//        $this->checkToken();
        $input = input();
        //�ϴ�����
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
