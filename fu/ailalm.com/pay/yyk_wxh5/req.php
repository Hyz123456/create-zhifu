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
$pId = $_REQUEST['pa_code'];

#�̻�������
##�ύ�Ķ����ű����������˻�������Ψһ
$pOrder = $_REQUEST['p_Order'];

#�������
##��λ:Ԫ����ȷ���֡�����������ֵ100000����Сֵ0
$pAmt = $_REQUEST['p_Amt'];

#ϵͳ֪ͨ��ַ
##֧������������ɺ��ҷ�ϵͳ����õ�ַ����֧�����֪ͨ���õ�ַ�����Դ�����
$pUrl = $_REQUEST['p_Url'];

#�û�id
##�ǿղ���
$pUid = $_REQUEST['p_Uid'];

#��Ʒ����
##ͬ�̻������ţ�������ǩ����
$pPid = $_REQUEST['p_Pid'];

#֧������
## WXWAP��΢��wap  ALIAPP��֧����wap
$pType = $_REQUEST['p_Type'];

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

$res = request_post($reqURL_onLine,$_data);

print_r($res);

?>