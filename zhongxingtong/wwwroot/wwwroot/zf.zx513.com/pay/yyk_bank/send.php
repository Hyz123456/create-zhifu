<?php
/*
 * @Description ���ο��Ʒͨ��֧���ӿڷ���
 * @V3.0
 * @Author Svi
 */
include 'yeeykCommon.php';
include 'HttpClient.class.php';

#�̻����
##�̻����ҷ�ϵͳ��Ψһ��ݱ�ʶ��
$pId = $userid;



#�̻�������
##�ύ�Ķ����ű����������˻�������Ψһ
$pOrder = $_GET['orderid'];

#�������
##��λ:Ԫ����ȷ���֡�����������ֵ100000����Сֵ0
$pAmt = $_GET['price'];

#ϵͳ֪ͨ��ַ
##֧������������ɺ��ҷ�ϵͳ����õ�ַ����֧�����֪ͨ���õ�ַ�����Դ�����
$pUrl = "http://www.baidu.com";

#�û�id
##�ǿղ���
$pUid = "54687";

#��Ʒ����
##ͬ�̻������ţ�������ǩ����
$pPid = $pOrder;

#֧������
## WXWAP��΢��wap  ALIAPP��֧����wap
$pType = "WXWAP";

$hmac = getReqHmacString($pId,$pOrder,$pAmt,$pUrl,$pUid,$pPid,$pType);
$_data = array(
'merchantNo'=>$pId,
'merchantOrderno'=>$pOrder,
'requestAmount'=>$pAmt,
'noticeSysaddress'=>$pUrl,
'memberNo'=>$pUid,
'memberGoods'=>$pPid,
'payType'=>$pType,
'hmac'=>$hmac
);


print_r($_data);

$res = request_post($reqURL_onLine,$_data);

print_r($res);

?>