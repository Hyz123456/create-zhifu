<?php
/*
 * @Description ���ο��Ʒͨ�ýӿڷ��� 
 * @V3.0
 * @Author Svi
 */
include 'yeeykCommon.php';

$pCode = $_POST['pa_code'];#�̻����
$pOrder = $_POST['p_Order'];#�̻�������

$sbOld = "";
$sbOld = $sbOld.$pCode;
$sbOld = $sbOld.$pOrder;

$hmac = HmacMd5($sbOld,$merchantKey); 

$_data = array(
	'merchantNo'=>$pCode,
	'merchantOrderNo'=>$pOrder,
	'hmac'=>$hmac
);
$result = request_post($queryURL_onLine,$_data);
echo $result;
?>