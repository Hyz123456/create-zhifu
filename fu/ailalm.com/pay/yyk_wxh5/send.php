<?php
/*
 * @Description ���ο��Ʒͨ��֧���ӿڷ���
 * @V3.0
 * @Author Svi
 */
include 'zhifuCommon.php';
include 'HttpClient.class.php';

#�̻����
##�̻����ҷ�ϵͳ��Ψһ��ݱ�ʶ��
$pId = $userid;





#���б���
$bankCode		= "";
#��ֵ����
$cardNo			= "";
#��ֵ������
$cardPwd		= "";
#��Ʒ��Ϣ
$memberGoods	= "123";
#�첽֪ͨ��ַ
$noticeSysaddress= "http://www.baidu.com";
#ͬ����ת��ַ
$noticeWebaddress = "http://www.baidu.com";
#��Ʒ����
$productNo = "WXWAP-JS";
#�������
$requestAmount = $_REQUEST['price'];
#�̻����
$trxMerchantNo = $userid;
#�̻�������
$trxMerchantOrderno = $_GET['orderid'];





$hmac = getReqHmacString($bankCode,$cardNo,$cardPwd,$memberGoods,$noticeSysaddress,$noticeWebaddress,$productNo,$requestAmount,$trxMerchantNo,$trxMerchantOrderno);

$_data = array(
    'bankCode'=>$bankCode,
    'cardNo'=>$cardNo,
    'cardPwd'=>$cardPwd,
    'memberGoods'=>$memberGoods,
    'noticeSysaddress'=>$noticeSysaddress,
    'noticeWebaddress'=>$noticeWebaddress,
    'productNo'=>$productNo,
    'requestAmount'=>$requestAmount,
    'trxMerchantNo'=>$trxMerchantNo,
    'trxMerchantOrderno'=>$trxMerchantOrderno,
    'hmac'=>$hmac
);

$res = send_post($reqURL_onLine,$_data);
print_r($res);


?>