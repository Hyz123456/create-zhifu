<?php
require_once 'inc.php';
use WY\app\model\Handleorder;


 $ReturnArray = array( // �����ֶ�
            "memberid" => $_REQUEST["memberid"], // �̻�ID
            "orderid" =>  $_REQUEST["orderid"], // ������
            "amount" =>  $_REQUEST["amount"], // ���׽��
            "datetime" =>  $_REQUEST["datetime"], // ����ʱ��
            "transaction_id" =>  $_REQUEST["transaction_id"], // ֧����ˮ��
            "returncode" => $_REQUEST["returncode"],
        );
      
        $Md5key = $userkey;
   
		ksort($ReturnArray);
        reset($ReturnArray);
        $md5str = "";
        foreach ($ReturnArray as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
        $sign = strtoupper(md5($md5str . "key=" . $Md5key));
        if ($sign == $_REQUEST["sign"]) {
			
            if ($_REQUEST["returncode"] == "00") {
				   $str = "���׳ɹ��������ţ�".$_REQUEST["orderid"];



				
					$orderid	=	$_REQUEST["orderid"];

					$amount		=	$_REQUEST["amount"];
					$handle=@new Handleorder($orderid,$amount);
					$handle->updateUncard();




                  // file_put_contents("success.txt",$str."\n", FILE_APPEND);
				   exit("ok");
            }
       }
?>