<?php

/*
 * @Description ���ο��Ʒͨ�ýӿڷ���
 * @V3.0
 * @Author Svi
 */
include 'merchantProperties.php';
#	ʱ������
date_default_timezone_set('prc');

#	��Ʒͨ�ýӿ������ַ
$reqURL_onLine = "http://fpay.yeeyk.com/fourth-app/prof/acquiring";
#	������ѯ�ӿ������ַ
 $queryURL_onLine = "http://fpay.yeeyk.com/fourth-app/queryForMerchant";

#	ǩ����������ǩ����
function getReqHmacString($pId,$pOrder,$pAmt,$pUrl,$pUid,$pPid,$pType) {
	include 'merchantProperties.php';
	#ȡ�ü���ǰ���ַ���
	$sbOld = "";
	#����̻����
	$sbOld = $sbOld . $pId;
	#
	$sbOld = $sbOld . $pOrder;
	#
	$sbOld = $sbOld . $pAmt;
	#
	$sbOld = $sbOld . $pUrl;
	#
	$sbOld = $sbOld . $pUid;
	#
	$sbOld = $sbOld . $pPid;
	#
	$sbOld = $sbOld . $pType;
	logstr($pOrder, $sbOld, HmacMd5($sbOld, $merchantKey));

	return HmacMd5($sbOld, $merchantKey);
}
#	У�鷵�ؽ��
function checkHmac($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount,$hmac){
	if ($hmac == getCallbackHmacString($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount))
        return true;
    else
        return false;
}
#	����У����
function getCallbackHmacString($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount){
	$sbOld = "";
	$sbOld = $sbOld.$reCode;
	$sbOld = $sbOld.$merchantNo;
	$sbOld = $sbOld.$merchantOrderno;
	$sbOld = $sbOld.$result;
	$sbOld = $sbOld.$payType;
	$sbOld = $sbOld.$memberGoods;
	$sbOld = $sbOld.$amount;
	return HmacMd5($sbOld, $merchantKey);
}
function HmacMd5($data, $key) {
	// RFC 2104 HMAC implementation for php.
	// Creates an md5 HMAC.
	// Eliminates the need to install mhash to compute a HMAC
	// Hacked by Lance Rushing(NOTE: Hacked means written)

	//��Ҫ���û���֧��iconv���������Ĳ���������������
	$key = iconv("GB2312", "UTF-8", $key);
	$data = iconv("GB2312", "UTF-8", $data);

	$b = 64; // byte length for md5
	if (strlen($key) > $b) {
		$key = pack("H*", md5($key));
	}
	$key = str_pad($key, $b, chr(0x00));
	$ipad = str_pad('', $b, chr(0x36));
	$opad = str_pad('', $b, chr(0x5c));
	$k_ipad = $key ^ $ipad;
	$k_opad = $key ^ $opad;

	return md5($k_opad . pack("H*", md5($k_ipad . $data)));
}
#POST����
function request_post($url = '', $param = '') {
	if (empty($url) || empty($param)) {
		return false;
	}

	$postUrl = $url;
	$curlPost = $param;
	$ch = curl_init();//��ʼ��curl
	curl_setopt($ch, CURLOPT_URL,$postUrl);//ץȡָ����ҳ
	curl_setopt($ch, CURLOPT_HEADER, 0);//����header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//Ҫ����Ϊ�ַ������������Ļ��
	curl_setopt($ch, CURLOPT_POST, 1);//post�ύ��ʽ
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	$data = curl_exec($ch);//����curl
	curl_close($ch);

	return $data;
}

#	��ȡ�ص����
function getCallBackValue(&$reCode,&$merchantNo,&$merchantOrderno,&$result,&$payType,&$memberGoods,$amount,&$hmac){
	$reCode = $_REQUEST['reCode'];
	$merchantNo = $_REQUEST['merchantNo'];
	$merchantOrderno = $_REQUEST['merchantOrderno'];
	$result = $_REQUEST['result'];
	$payType = $_REQUEST['payType'];
	$memberGoods = $_REQUEST['memberGoods'];
	$amount = $_REQUEST['amount'];
	$hmac = $_REQUEST['hmac'];
	return null;
}

function logstr($orderid, $str, $hmac)
{
	include 'merchantProperties.php';
	$james = fopen($logName, "a+");
	fwrite($james, "\r\n" . date("Y-m-d H:i:s") . "|orderid[" . $orderid . "]|str[" . $str . "]|hmac[" . $hmac . "]");
	fclose($james);
}
