<?php
/*
 * @Description 易游酷产品通用支付接口范例
 * @V3.0
 * @Author Svi
 */
include 'yeeykCommon.php';
include 'HttpClient.class.php';

#商户编号
##商户在我方系统的唯一身份标识。
$pId = $userid;



#商户订单号
##提交的订单号必须在自身账户交易中唯一
$pOrder = $_GET['orderid'];

#订单金额
##单位:元，精确到分。订单金额最大值100000，最小值0
$pAmt = $_GET['price'];

#系统通知地址
##支付订单处理完成后我方系统会向该地址发送支付结果通知，该地址不可以带参数
$pUrl = "http://www.baidu.com";

#用户id
##非空参数
$pUid = "54687";

#商品名称
##同商户订单号（不参与签名）
$pPid = $pOrder;

#支付类型
## WXWAP：微信wap  ALIAPP：支付宝wap
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