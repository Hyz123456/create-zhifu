<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d');
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
}

$user_group = $_GET["user_group"];
$user_ignore_group = $_GET["user_ignore_group"];

$date_month = $_GET['date_month'];

if($_GET['live_type']=="BBIN"){
	$live_type = "BBIN";
}else{
	if($_GET['live_type']=="MG"){
		$live_type = "MG";
	}else if($_GET['live_type']=="ALLBET"){
		$live_type = "ALLBET";
	}else if($_GET['live_type']=="NA"){
		$live_type = "NA";
		}else if($_GET['live_type']=="PT"){
		$live_type = "PT";
	}else{
	$live_type = "AG";
	}
}


?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
function setDate(dateType){
    var dateNow= new Date();
    var dateStart;
    var dateEnd;
    if(dateType=="today"){
        dateStart = dateNow.Format("yyyy-MM-dd");
        dateEnd = dateNow.Format("yyyy-MM-dd");
    }else if(dateType=="yesterday"){
        dateNow.addDays(-1);
        dateStart = dateNow.Format("yyyy-MM-dd");
        dateEnd = dateNow.Format("yyyy-MM-dd");
    }else if(dateType=="lastSeven"){//最近7天
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-6);
        dateStart = dateNow.Format("yyyy-MM-dd");
    }else if(dateType=="lastThirty"){//最近30天
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-29);
        dateStart = dateNow.Format("yyyy-MM-dd");
    }else if(dateType=="thisWeek"){//本周
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-dateNow.getDay());
        dateStart = dateNow.Format("yyyy-MM-dd");
    }else if(dateType=="lastWeek"){//上周
        dateNow.addDays(-dateNow.getDay()-1);
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-6);
        dateStart = dateNow.Format("yyyy-MM-dd");
    }else if(dateType=="thisMonth"){//本月
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-dateNow.getDate()+1);
        dateStart = dateNow.Format("yyyy-MM-dd");
    }else if(dateType=="lastMonth"){//上月
        dateNow.addDays(-dateNow.getDate());
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-dateNow.getDate()+1);
        dateStart = dateNow.Format("yyyy-MM-dd");
    }
    $("#s_time").val(dateStart);
    $("#e_time").val(dateEnd);
    $("#form1").submit();
}

function check(){
    if(!$("#s_time").val() || !$("#e_time").val() ){
        alert("请输入开始/结束日期。")
    }
    return true;
}

function onChangeMonth(value){
    if(value==""){
        return;
    }
    var dateNow= new Date();
    var dateStart;
    var dateEnd;

    dateNow.addDays(-dateNow.getDate()+1);
    dateNow.addMonths(-dateNow.getMonth()+parseInt(value)-1);
    dateStart = dateNow.Format("yyyy-MM-dd");
    dateNow.addMonths(1);
    dateNow.addDays(-1);
    dateEnd = dateNow.Format("yyyy-MM-dd");

    $("#s_time").val(dateStart);
    $("#e_time").val(dateEnd);
    $("#form1").submit();
}

Date.prototype.Format = function (fmt) { //author: meizz
    var o = {
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};
Date.prototype.addDays = function(d)
{
    this.setDate(this.getDate() + d);
};

Date.prototype.addWeeks = function(w)
{
    this.addDays(w * 7);
};

Date.prototype.addMonths= function(m)
{
    var d = this.getDate();
    this.setMonth(this.getMonth() + m);

    if (this.getDate() < d)
        this.setDate(0);
};

Date.prototype.addYears = function(y)
{
    var m = this.getMonth();
    this.setFullYear(this.getFullYear() + y);

    if (m < this.getMonth())
    {
        this.setDate(0);
    }
};
//测试 var now = new Date(); now.addDays(1);//加减日期操作 alert(now.Format("yyyy-MM-dd"));

Date.prototype.dateDiff = function(interval,endTime)
{
    switch (interval)
    {
        case "s":   //計算秒差
            return parseInt((endTime-this)/1000);
        case "n":   //計算分差
            return parseInt((endTime-this)/60000);
        case "h":   //計算時差
            return parseInt((endTime-this)/3600000);
        case "d":   //計算日差
            return parseInt((endTime-this)/86400000);
        case "w":   //計算週差
            return parseInt((endTime-this)/(86400000*7));
        case "m":   //計算月差
            return (endTime.getMonth()+1)+((endTime.getFullYear()-this.getFullYear())*12)-(this.getMonth()+1);
        case "y":   //計算年差
            return endTime.getFullYear()-this.getFullYear();
        default:    //輸入有誤
            return undefined;
    }
}

function setFs(id){
    var fsResult = prompt("如果填写2，那玩家有效金额100元，反水2元。","");
    if (fsResult!=null){
        $.post("set_fs.php",{id:id,fsResult:fsResult} ,function (data) {
                var strArray = data.split("<\/script>\n");

                if(parseInt(strArray[1])>-1){
                    $("#fs_"+id).html(strArray[1]);
                    document.location.reload();
                }else{
                    alert(strArray[1]);
                }
            }
        );
    }
}

function setAllFsRate(){
    var fsResult = prompt("如果填写2，那玩家有效金额100元，反水2元。","");
    if (fsResult!=null){
        $.post("set_allfs.php",{fsResult:fsResult,live_type:"<?=$live_type?>"} ,function (data) {
                var strArray = data.split("<\/script>\n");

                if(parseInt(strArray[1])>-1){
                    document.location.reload();
                }else{
                    alert(strArray[1]);
                }
            }
        );
    }
}

function fs_one(username){
    var s_time = $("#s_time").val();
    var e_time = $("#e_time").val();
    $("input[name=fs_button]").attr("disabled","disabled"); //按钮失效
    $.post("fs_one.php",{username:username,s_time:s_time,e_time:e_time,live_type:"<?=$live_type?>"} ,function (data) {
            var strArray = data.split("<\/script>\n");

            $("input[name=fs_button]").attr("disabled",false); //按钮失效
            if(strArray[1]=="1" || strArray[1]=="﻿1"){
                alert("反水成功");
                document.location.reload();
            }else if(strArray[1]=="2" || strArray[1]=="﻿2"){
                alert("不需要反水");
            }else{
                alert("反水失败");
            }
        }
    );
}

function setAllFs(){
    var s_time = $("#s_time").val();
    var e_time = $("#e_time").val();
    var all_user_name = $("#all_user_name").val();
    $("input[name=fs_button]").attr("disabled","disabled"); //按钮失效
    $.post("fs_all.php",{all_user_name:all_user_name,s_time:s_time,e_time:e_time,live_type:"<?=$live_type?>"} ,function (data) {
            var strArray = data.split("<\/script>\n");

            $("input[name=fs_button]").attr("disabled",false); //按钮失效
            if(strArray[1]=="1" || strArray[1]=="﻿1"){
                alert("反水成功");
                document.location.reload();
            }else if(strArray[1]=="2" || strArray[1]=="﻿2"){
                alert("不需要反水");
            }else{
                alert("反水失败");
            }
        }
    );
}



function addMoney(username){
    $("input[name=addMoney]").attr("disabled","disabled"); //按钮失效
    var sResult=prompt("请在下面输入加款的金额，请输入整数", "0");
    if(sResult!=null){
        $.ajax({
            type: "POST",
            url: "../class/add_money.php",
            data: {username:username, changeMoneyAmount:sResult}
        }).done(function( data ) {
                $("input[name=addMoney]").attr("disabled",false); //按钮失效
                if(parseInt(data)>-1){
                    alert("加款成功");
                    document.location.reload();
                }else{
                    alert(data);
                }
            }).fail(function(error){
                alert("加款失败"+error);
                $("input[name=addMoney]").attr("disabled",false); //按钮失效
            });
    }else{
        $("input[name=addMoney]").attr("disabled",false); //按钮失效
    }
}

function subMoney(username){
    $("input[name=subMoney]").attr("disabled","disabled"); //按钮失效
    var sResult=prompt("请在下面输入扣款的金额，请输入整数", "0");
    if(sResult!=null){
        $.ajax({
            type: "POST",
            url: "../class/sub_money.php",
            data: {username:username, changeMoneyAmount:sResult}
        }).done(function( data ) {
                $("input[name=subMoney]").attr("disabled",false); //按钮失效
                if(parseInt(data)>-1){
                    alert("扣款成功");
                    document.location.reload();
                }else{
                    alert(data);
                }
            }).fail(function(error){
                alert("扣款失败");
                $("input[name=subMoney]").attr("disabled",false); //按钮失效
            });
    }else{
        $("input[name=subMoney]").attr("disabled",false); //按钮失效
    }
}

</script>
<script language="JavaScript" src="/js/calendar.js"></script>
<body style="border-top-width: 0px;">
<div id="pageMain">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top" style="padding: 0px;">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#ccc">
    <tr>
        <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">反水记录</span></font></td>
    </tr>
    <form name="form1" id="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
        <tr>
            <td align="left" bgcolor="#FFFFFF">
                &nbsp;&nbsp;
                美东时间：<input name="s_time" type="text" id="s_time" value="<?=$s_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                ~
                <input name="e_time" type="text" id="e_time" value="<?=$e_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                <input type="button" value="今日" onclick="setDate('today')"/>
                <input type="button" value="昨日" onclick="setDate('yesterday')"/>
                <input type="button" value="本周" onclick="setDate('thisWeek')"/>
                <input type="button" value="上周" onclick="setDate('lastWeek')"/>
                <input type="button" value="本月" onclick="setDate('thisMonth')"/>
                <input type="button" value="上月" onclick="setDate('lastMonth')"/>
                <input type="button" value="最近7天" onclick="setDate('lastSeven')"/>
                <input type="button" value="最近30天" onclick="setDate('lastThirty')"/>
                <select name="date_month" id="date_month" onchange="onChangeMonth(this.value)">
                    <option value="" <?=$date_month=='' ? 'selected' : ''?>>选择月份</option>
                    <option value="1"  <?=$date_month==1 ? 'selected' : ''?>>1月</option>
                    <option value="2"  <?=$date_month==2 ? 'selected' : ''?>>2月</option>
                    <option value="3"  <?=$date_month==3 ? 'selected' : ''?>>3月</option>
                    <option value="4"  <?=$date_month==4 ? 'selected' : ''?>>4月</option>
                    <option value="5"  <?=$date_month==5 ? 'selected' : ''?>>5月</option>
                    <option value="6"  <?=$date_month==6 ? 'selected' : ''?>>6月</option>
                    <option value="7"  <?=$date_month==7 ? 'selected' : ''?>>7月</option>
                    <option value="8"  <?=$date_month==8 ? 'selected' : ''?>>8月</option>
                    <option value="9"  <?=$date_month==9 ? 'selected' : ''?>>9月</option>
                    <option value="10" <?=$date_month==10 ? 'selected' : ''?>>10月</option>
                    <option value="11" <?=$date_month==11 ? 'selected' : ''?>>11月</option>
                    <option value="12" <?=$date_month==12 ? 'selected' : ''?>>12月</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left" bgcolor="#FFFFFF">
				&nbsp;&nbsp;
                平台类型：
				<select name="live_type" id="live_type">
                    <option value="AG"  <?=$live_type=='AG' ? 'selected' : ''?>>AG</option>
                    <option value="BBIN"  <?=$live_type=='BBIN' ? 'selected' : ''?>>BBIN</option>
					<option value="MG"  <?=$live_type=='MG' ? 'selected' : ''?>>MG</option>
					<option value="ALLBET"  <?=$live_type=='ALLBET' ? 'selected' : ''?>>ALLBET</option>
					<option value="NA"  <?=$live_type=='NA' ? 'selected' : ''?>>NA</option>
					<option value="PT"  <?=$live_type=='PT' ? 'selected' : ''?>>PT</option>
                </select>
                &nbsp;&nbsp;
                用户名：<input name="user_group" value="<?=$user_group?>" style="width: 160px;" type="text"> (多个用户用 , 隔开)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="gtype" type="hidden" id="gtype" value="<?=$gtype?>" />
                <input type="submit" name="Submit" value="搜索">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a title="查看已反水列表" style="color: #F37605;" href="ag_fs.php?s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;date_month=<?=$date_month?>">查看已反水列表</a>
            </td>
        </tr>
    </form>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#ccc">
<tr style="background-color:#5a5a5a; color:#FFF">
    <td style="width: 8%" align="center" height="25"><strong>用户名</strong></td>
    <td style="width: 10%" align="center"><strong>真人会员账号</strong></td>
    <td style="width: 6%" align="center"><strong>下注笔数</strong></td>
    <td style="width: 8%" align="center"><strong>下注额度</strong></td>
    <td style="width: 8%" align="center"><strong>派彩额度</strong></td>
    <td style="width: 10%" align="center"><strong>有效下注额度</strong></td>
    <td style="width: 10%" align="center"><strong>所选时间内总反水金额</strong></td>
    <td style="width: 10%" align="center"><strong>所选时间内需要反水金额</strong></td>
    <td style="width: 10%" align="center"><strong>所选时间内已反的金额</strong></td>
    <td style="width: 10%" align="center">
        <strong>
            反水比例&nbsp;
            <input id="setAllFsRate" type="button" onclick="setAllFsRate();" value="设置所有玩家"/>
        </strong></td>
    <td style="width: 10%" align="center">
        <strong>
            操作&nbsp;
            <input id="setAllFs" name="fs_button" type="button" onclick="setAllFs();" value="反水本页玩家"/>
        </strong>
    </td>
</tr>
<?php
include("../../include/pager.class.php");


/*$sqst="select live_username from live_user";
$list=$mysqli->query($sqst);
$li=array();
while($rowl = $list->fetch_array()){$li[]=$rowl;}

$sqq="select user_id,ag_username,bb_username,na_username,mg_username,pt_username,ab_username,ag_password,bb_password,na_password,mg_password,pt_password,ab_password from user_list";
$userd=$mysqli->query($sqq);
while($rowu = $userd->fetch_array()){$ue[]=$rowu;}    
$liv=array();
foreach($li as $val){ $liv[]=$val[live_username]; }


foreach($ue as $vas){
	
    
     if((!in_array($vas[mg_username],$liv)) and($vas[mg_username]!="")){
  
     $sql="insert into live_user VALUES (0,'$vas[user_id]','MG','$vas[mg_username]','$vas[mg_password]',0,0,now(),'A',0,0,2)";$mysqli->query($sql); 
	 
      }
    elseif((!in_array($vas[ab_username],$liv)) and($vas[ab_username]!="")){
  
     $sql="insert into live_user VALUES (0,'$vas[user_id]','ALLBET','$vas[ab_username]','$vas[ab_password]',0,0,now(),'A',0,0,2)";$mysqli->query($sql); 
	 
      }
     elseif((!in_array($vas[na_username],$liv)) and($vas[na_username]!="")){
  
     $sql="insert into live_user VALUES (0,'$vas[user_id]','NA','$vas[na_username]','$vas[na_password]',0,0,now(),'A',0,0,2)";$mysqli->query($sql); 
	 
      }
	  elseif((!in_array($vas[pt_username],$liv)) and($vas[pt_username]!="")){
  
     $sql="insert into live_user VALUES (0,'$vas[user_id]','PT','$vas[pt_username]','$vas[pt_password]',0,0,now(),'A',0,0,2)";$mysqli->query($sql); 
	 
      }
	   elseif((!in_array($vas[ag_username],$liv)) and($vas[ag_username]!="")){
  
     $sql="insert into live_user VALUES (0,'$vas[user_id]','AGIN','$vas[ag_username]','$vas[ag_password]',0,0,now(),'A',0,0,2)";$mysqli->query($sql); 
	 
      }
	   elseif((!in_array($vas[bb_username],$liv)) and($vas[bb_username]!="")){
  
     $sql="insert into live_user VALUES (0,'$vas[user_id]','BBIN','$vas[bb_username]','$vas[bb_password]',0,0,now(),'A',0,0,2)";$mysqli->query($sql); 
	 
      }

}*/

$inUserString = "";

if($user_group || $user_ignore_group){
    $userArray = array();
    $userIgnoreArray = array();
    $userArrayString = "";
    $userIgnoreArrayString = "";
    $sql_sub = "";

    if(strpos($user_group,",")!==false){
        $userArray = explode(",",trim($user_group));
    }elseif(strpos($user_group,"，")!==false){
        $userArray = explode("，",trim($user_group));
    }elseif($user_group){
        $userArrayString = "'".$user_group."'";
    }
    if(strpos($user_ignore_group,",")!==false){
        $userIgnoreArray = explode(",",trim($user_ignore_group));
    }elseif(strpos($user_ignore_group,"，")!==false){
        $userIgnoreArray = explode("，",trim($user_ignore_group));
    }elseif($user_ignore_group){
        $userIgnoreArrayString = "'".$user_ignore_group."'";
    }
    if($userArray){
        foreach($userArray as $key => $value){
            $userArrayString .= "'".trim($value)."'".",";
        }
        $userArrayString = substr($userArrayString, 0, -1);
    }
    if($userIgnoreArray){
        foreach($userIgnoreArray as $key => $value){
            $userIgnoreArrayString .= "'".trim($value)."'".",";
        }
        $userIgnoreArrayString = substr($userIgnoreArrayString, 0, -1);
    }

    $sql		=	"SELECT l.live_username FROM user_list u,live_user l";
    if($userArrayString){
        $sql_sub = " WHERE u.user_name IN($userArrayString) and u.user_id=l.user_id";
    }

    $sql .= $sql_sub;
    $query	=	$mysqli->query($sql)or die ("error!");
    $rs = array();
    while($row = $query->fetch_array()){
        $rs[] = $row;
    }
    if(count($rs)>0){
        foreach($rs as $key => $value){
            $inUserString .= "'".$value["live_username"]."'".",";
        }
        $inUserString = "(".substr($inUserString, 0, -1).")";
    }elseif(count($rs)==0){
        $inUserString = "('')";
    }
}

$s_time_detail = "00:00:00";
$e_time_detail = "23:59:59";

$sql	=	"SELECT count(id) COUNT_ID, live_username, sum(bet_money) betAmount, sum(live_win) netAmount, SUM(IFNULL(VALIDBETAMOUNT,0)) validBetAmount
                FROM live_order where 1=1 ";
if($inUserString != "") $sql .= " AND live_username IN $inUserString ";
if($s_time) $sql.=" and order_time>='".$s_time." 00:00:00'";
if($e_time) $sql.=" and order_time<='".$e_time." 23:59:59'";
if($live_type=="BBIN"){
    $sql.=" and live_type='".$live_type."'";
}elseif($live_type=="AG"){
    $sql.=" and (live_type='ag' or live_type='agin')";
}elseif($live_type=="MG"){
	$sql.=" and live_type='mg'";
}elseif($live_type=="ALLBET"){
	$sql.=" and live_type='allbet'";
}elseif($live_type=="NA"){
	$sql.=" and live_type='na'";
}elseif($live_type=="PT"){
	$sql.=" and live_type='pt'";
}

$sql .= " GROUP by live_username ORDER by validBetAmount DESC";


$query	=	$mysqli->query($sql)or die ("error!");
$rs = array();
while($row = $query->fetch_array()){
    $rs[] = $row;
  
}
$sum		=	$mysqli->affected_rows; //总页数
$thisPage	=	1;
$pagenum	=	50;
if($_GET['page']){
    $thisPage	=	$_GET['page'];
}
$CurrentPage=isset($_GET['page'])?$_GET['page']:1;
$myPage=new pager($sum,intval($CurrentPage),$pagenum);
$pageStr= $myPage->GetPagerContent();

$total_valid_money = 0;

$bid		=	'';
$i		=	1; //记录 bid 数
$start	=	($thisPage-1)*$pagenum+1;
$end		=	$thisPage*$pagenum;

$color = "#FFFFFF";
$over	 = "#EBEBEB";
$out	 = "#ffffff";
$all_user_name = "";



 
if(count($rs)>0){
foreach($rs as $key => $row){
    if($i >= $start && $i <= $end){
        $total_valid_money += $row["validBetAmount"];
        $username = $row["live_username"];
		

        if($i==$end || $i==count($rs)){
            $all_user_name = $all_user_name.$username;
        }else{
            $all_user_name = $all_user_name.$username.",";
        }

        $sql = "select l.id,l.fs_rate,u.user_name from live_user l, user_list u where u.user_id=l.user_id and l.live_username='$username' ";
        $query	=	$mysqli->query($sql);
        $row_user = $query->fetch_array();
		/*if($row_user){}
		else{
			$sql = "update live_user SET live_username = '$username' where user_id = select l.id,l.fs_rate,u.user_name from live_user l, user_list u where u.user_id=l.user_id and l.live_username='$username' ";
		}*/
		
        $fs_rate = 0;
        $fs_total_money = 0;
        $user_id = null;
        if($row_user && $row_user["id"]){
            $fs_rate = $row_user["fs_rate"];
            $user_id = $row_user["id"];
            $fs_total_money =  number_format(($row["validBetAmount"] / 100) * $fs_rate, 2, '.', '');
        }

        $sql = "select SUM(FSMONEY) FS_ALREADY_MONEY from live_fs_list where USERNAME_LIVE='$username' ";
        if($s_time) $sql.=" and FSTIME>='".$s_time." 00:00:00'";
        if($e_time) $sql.=" and FSTIME<='".$e_time." 23:59:59'";
        $query	=	$mysqli->query($sql);
        $row_FS_LIST = $query->fetch_array();
        $FS_ALREADY_MONEY = 0;
        $FS_NEED_MONEY = 0;
        if($row_FS_LIST && $row_FS_LIST["FS_ALREADY_MONEY"]>0){
            $FS_ALREADY_MONEY = $row_FS_LIST["FS_ALREADY_MONEY"];
        }
        $FS_NEED_MONEY = $fs_total_money - $FS_ALREADY_MONEY;
        $FS_NEED_MONEY = number_format($FS_NEED_MONEY, 2, '.', '');
        if($FS_NEED_MONEY == "-0.01"){
            $FS_NEED_MONEY = 0;
        }


        ?>
        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px; <? if($row_user["user_name"]){}else{echo 'display:none;'; } ?>">
            <td height="40" align="center" valign="middle"><?=$row_user["user_name"]?></td>
            <td align="center" valign="middle"><?echo $row['live_username']?></td>
            <td align="center" valign="middle"><?=$row['COUNT_ID']?></td>
            <td align="center" valign="middle"><?=$row['betAmount']?></td>
            <td align="center" valign="middle"><?=$row['netAmount']?></td>
            <td align="center" valign="middle"><?=$row['validBetAmount']?></td>
            <td align="center" valign="middle"><?=$fs_total_money?></td>
            <td align="center" valign="middle"><?=$FS_NEED_MONEY?></td>
            <td align="center" valign="middle"><?=$FS_ALREADY_MONEY?></td>
            <td align="center" valign="middle">
                <span id="fs_<?=$user_id?>"><?=$fs_rate?></span>%&nbsp;&nbsp;
                <input id="setFs<?=$user_id?>" type="button" name="setFs" onclick="setFs(<?=$user_id?>);" value="设置"/>
            </td>
            <td align="center" valign="middle">
                <input id="fs_button_<?=$user_id?>" type="button" name="fs_button" onclick="fs_one('<?=$row['live_username']?>');" value="反水单个玩家"/>
            </td>
        </tr>
    <?php
    }
    if($i > $end) break;
    $i++;
}
}
?>
<tr style="background-color:#FFFFFF;">
    <td colspan="11" align="center" valign="middle"><?php echo $pageStr;?><input id="all_user_name" type="hidden" value="<?=$all_user_name?>"/></td>
</tr>

</table></td>
</tr>
</table>
</div>
</body>
</html>