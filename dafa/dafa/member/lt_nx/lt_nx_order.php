<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include_once "../../app/member/utils/login_check.php";
include_once "../../app/member/utils/error_handle.php";
include_once "../../app/member/utils/convert_name.php";
include_once "../../app/member/utils/time_util.php";

include_once "../../app/member/class/six_lottery_odds.php";
include_once "../../app/member/class/six_lottery_order.php";
include_once "../../app/member/class/six_lottery_schedule.php";
include_once "../../app/member/class/user_group.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");

include_once "../../member/lt/lt_util.php";

$rType = $_POST["rtype"];
$checkArray = $_POST["lt_nx"];

$odds_NX = six_lottery_odds::getOdds("NX");

$selectCount = 0;
$animalString = "";
$unSelectAnimal = "";

foreach($checkArray as $value){

    if($value == "NX_A1"){
        $animalString .= "鼠,";
        $selectCount += 1;
    }elseif($value == "NX_A2"){
        $animalString .= "牛,";
        $selectCount += 1;
    }elseif($value == "NX_A3"){
        $animalString .= "虎,";
        $selectCount += 1;
    }elseif($value == "NX_A4"){
        $animalString .= "兔,";
        $selectCount += 1;
    }elseif($value == "NX_A5"){
        $animalString .= "龙,";
        $selectCount += 1;
    }elseif($value == "NX_A6"){
        $animalString .= "蛇,";
        $selectCount += 1;
    }elseif($value == "NX_A7"){
        $animalString .= "马,";
        $selectCount += 1;
    }elseif($value == "NX_A8"){
        $animalString .= "羊,";
        $selectCount += 1;
    }elseif($value == "NX_A9"){
        $animalString .= "猴,";
        $selectCount += 1;
    }elseif($value == "NX_AA"){
        $animalString .= "鸡,";
        $selectCount += 1;
    }elseif($value == "NX_AB"){
        $animalString .= "狗,";
        $selectCount += 1;
    }elseif($value == "NX_AC"){
        $animalString .= "猪,";
        $selectCount += 1;
    }
}
$animalString = substr($animalString,0,-1);
if(strpos($animalString,"鼠")===false){
    $unSelectAnimal .= "鼠,";
}
if(strpos($animalString,"牛")===false){
    $unSelectAnimal .= "牛,";
}
if(strpos($animalString,"虎")===false){
    $unSelectAnimal .= "虎,";
}
if(strpos($animalString,"兔")===false){
    $unSelectAnimal .= "兔,";
}
if(strpos($animalString,"龙")===false){
    $unSelectAnimal .= "龙,";
}
if(strpos($animalString,"蛇")===false){
    $unSelectAnimal .= "蛇,";
}
if(strpos($animalString,"马")===false){
    $unSelectAnimal .= "马,";
}
if(strpos($animalString,"羊")===false){
    $unSelectAnimal .= "羊,";
}
if(strpos($animalString,"猴")===false){
    $unSelectAnimal .= "猴,";
}
if(strpos($animalString,"鸡")===false){
    $unSelectAnimal .= "鸡,";
}
if(strpos($animalString,"狗")===false){
    $unSelectAnimal .= "狗,";
}
if(strpos($animalString,"猪")===false){
    $unSelectAnimal .= "猪,";
}
$unSelectAnimal = substr($unSelectAnimal,0,-1);

if($rType == "NX_IN"){
    $descName = "合肖 中";
    $oddsValue = $odds_NX["h".$selectCount];
    $postAnimal = $animalString;
    $postCount = $selectCount;
    if($selectCount<2 || $selectCount>11){
        echo "数据不正确";
        exit;
    }
}elseif($rType == "NX_OUT"){
    $descName = "合肖 不中";
    $oddsValue = $odds_NX["h".(12-$selectCount)];
    $postAnimal = $unSelectAnimal;
    $postCount = 12-$selectCount;
    if($selectCount<1 || $selectCount>10){
        echo "数据不正确";
        exit;
    }
}

$page = '\'\'+
\'<div class=\"inner\">\n\'+
    \'<div class=\"msg-title\">六合彩 合肖  下注单</div>\n\'+
    \'<div class=\"msg-text\">\n\'+
    \'<form name=\"LAYOUTFORM\" action=\"/member/Grp/grpOrder.php\" method=\"post\" onsubmit=\"return false\">\n\'+
    \'<div class=\"PlayType\">\n\'+
    \'<span style=\"color:#990000\">期数 : '.$qishu.'</span>\n            &nbsp;\'+
    \'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">'.$descName.'</span>\n            @ \n\'+
    \'<b class=\"OddsL\">'.$oddsValue.' </b>\n            <br/>\n\'+
    \'<span style=\"background-color:#c1d7e5;color:#333\"><b>'.$animalString.'</b></span>\n\'+
    \'</div>\n\'+
    \'<label for=\"gold\">\n <br/>           下注金额:\n          </label>\n\'+
    \'<input type=\"text\" pattern=\"[0-9]*\" min=\"0\" id=\"gold\" name=\"gold\" class=\"OrderGold\"  />\n<br/>\n\'+
    \'<div style=\"display: none;\">\n          可赢金额: \n\'+
    \'<span style=\"color:#FF0000\" id=\"pc\">0.00</span>\n          <br/>\n\'+
    \'</div>\n  <br/>        最低限额: '.$lowestMoney.'\n          <br/>\'+
    \'      最高限额: '.$maxMoney.'\n          <br/><br/>\n         \n\'+
    \'<br/>\n          \n\'+
    \'<div style=\"padding-left: 20px\">\n\'+
    \'<input type=\"button\" class=\"cancel_cen\" name=\"btnCancel\" value=\"取消\" />&nbsp;&nbsp;\n\'+
    \'<input type=\"button\" class=\"submit_cen\" name=\"btnSubmit\" value=\"确定\" />\n          </div>\n\'+
    \'<input type=\"hidden\" name=\"rs_r\" value=\"\" />\n\'+
    \'<input type=\"hidden\" name=\"num\" value=\"\" />\n\'+
    \'<input type=\"hidden\" name=\"gid\" value=\"NX\" />\n\'+
    \'<input type=\"hidden\" name=\"concede_r\" value=\"NX_IN\" />\n\'+

    \'<input type=\"hidden\" name=\"select_count\" value=\"'.$postCount.'\" />\n\'+
    \'<input type=\"hidden\" NAME=\"num\" value=\"'.$postAnimal.'\" />\n\'+
    \'</form>\n      </div>\n    </div>\n    <div class=\"footer\"></div>\n\'';

if($_GET['cl']='wap'){

	echo '

var Left = document.getElementById("message_box");
Left.innerHTML = '.$page.';
Left.style.display = "";
var betO = betSpace.bet.instance();
betO.clientType="wap";

//派彩有1000000限制
betO.millionLimit = true;
betO.init("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$userMoney.'", "");
';

}else{

echo '
document.getElementById("bet-credit").innerHTML = "'.$userMoney.'";
var Left = document.getElementById("message_box");
Left.innerHTML = '.$page.';
Left.style.display = "";
var betO = betSpace.bet.instance();
//派彩有1000000限制
betO.millionLimit = true;
betO.init("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$userMoney.'", "");
';
}