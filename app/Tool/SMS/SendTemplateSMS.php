<?php

namespace App\Tool\SMS;

use App\Models\M3Result;

class SendTemplateSMS
{
  //主帐号
  //private $accountSid='aaf98f8949d575140149dd482efa04b5';
  private $accountSid='aaf98f89544cd9d90154532e41d5086d';

  //主帐号Token
  //private $accountToken='c7a1c3563b1347f4adbe0734f981dac1';
  private $accountToken='880c866091da4d20be4cbf197fd48708';

  //应用Id
  //private $appId='8a48b55149d5792d0149dd63a3c4046d';
  private $appId='aaf98f89544cd9d901546c4ab39d1b87';

  //请求地址，格式如下，不需要写https://
  private $serverIP='sandboxapp.cloopen.com';

  //请求端口
  private $serverPort='8883';

  //REST版本号
  private $softVersion='2013-12-26';

  /**
    * 发送模板短信
    * @param to 手机号码集合,用英文逗号分开
    * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
    * @param $tempId 模板Id
    */
  public function sendTemplateSMS($to,$datas,$tempId)
  {
       $m3_result = new M3Result;

       // 初始化REST SDK
       $rest = new CCPRestSDK($this->serverIP,$this->serverPort,$this->softVersion);
       $rest->setAccount($this->accountSid,$this->accountToken);
       $rest->setAppId($this->appId);

       // 发送模板短信
      //  echo "Sending TemplateSMS to $to <br/>";
       $result = $rest->sendTemplateSMS($to,$datas,$tempId);
       if($result == NULL ) {
           $m3_result->status = 3;
           $m3_result->message = 'result error!';
       }
       if($result->statusCode != 0) {
           $m3_result->status = $result->statusCode;
           $m3_result->message = $result->statusMsg;
       }else{
           $m3_result->status = 0;
           $m3_result->message = '发送成功';
       }

       return $m3_result;
  }
}

//sendTemplateSMS("18576437523", array(1234, 5), 1);

