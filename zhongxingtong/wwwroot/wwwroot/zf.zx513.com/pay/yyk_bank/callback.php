<?php
/*
 * @Description ���ο��Ʒͨ�ýӿڷ��� 
 * @V3.0
 * @Author Svi
 */

include 'yeeykCommon.php';

$return = getCallBackValue($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount,$hmac);

$check = checkHmac($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount,$hmac);

if($check==true && ($result=='SUCCESS'||$reCode==1)){
echo "SUCCESS";
}else{
	if(!$check){
		echo "����ǩ�����۸�!";
	}else{
		echo "Payment is fail!r1_Code=".$reCode;
	}
}

?>