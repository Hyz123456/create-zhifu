<?php 
include_once($C_Patch."/app/member/class/report_sport.php");

$date_POST = $_REQUEST["date"];
$s_time = $date_POST;
$e_time = $date_POST;
$inUserString = "(".$_SESSION["userid"].")";

$ft_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"足球",$inUserString);
$bk_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"篮球",$inUserString);
$tn_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"网球",$inUserString);
$vl_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"排球",$inUserString);
$bs_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"棒球",$inUserString);
$gj_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"冠军",$inUserString);
$ds_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"单式",$inUserString);
$cg_result = report_sport::getBetMoneyAndCountCg($s_time,$e_time,$inUserString);
$other_result = report_sport::getBetMoneyAndCount($s_time,$e_time,"其他",$inUserString);

$ft_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"足球",$inUserString,"0");
$bk_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"篮球",$inUserString,"0");
$tn_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"网球",$inUserString,"0");
$vl_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"排球",$inUserString,"0");
$bs_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"棒球",$inUserString,"0");
$gj_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"冠军",$inUserString,"0");
$ds_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"单式",$inUserString,"0");
$cg_result_status0 = report_sport::getBetMoneyAndCountCg($s_time,$e_time,$inUserString,"0");
$other_result_status0 = report_sport::getBetMoneyAndCount($s_time,$e_time,"其他",$inUserString,"0");

$ft_win = report_sport::getTotalWin($s_time,$e_time,"足球",$inUserString);
$bk_win = report_sport::getTotalWin($s_time,$e_time,"篮球",$inUserString);
$tn_win = report_sport::getTotalWin($s_time,$e_time,"网球",$inUserString);
$vl_win = report_sport::getTotalWin($s_time,$e_time,"排球",$inUserString);
$bs_win = report_sport::getTotalWin($s_time,$e_time,"棒球",$inUserString);
$gj_win = report_sport::getTotalWin($s_time,$e_time,"冠军",$inUserString);
$ds_win = report_sport::getTotalWin($s_time,$e_time,"单式",$inUserString);
$cg_win = report_sport::getTotalWinCg($s_time,$e_time,$inUserString);
$other_win = report_sport::getTotalWin($s_time,$e_time,"其他",$inUserString);

$total_bet_count = $ft_result["bet_count"] + $bk_result["bet_count"]
    + $tn_result["bet_count"] + $vl_result["bet_count"]+ $bs_result["bet_count"]
    + $gj_result["bet_count"] + $cg_result["bet_count"]+ $other_result["bet_count"];

$total_bet_money = $ft_result["bet_money"] + $bk_result["bet_money"]
    + $tn_result["bet_money"] + $vl_result["bet_money"]+ $bs_result["bet_money"]
    + $gj_result["bet_money"]+ $cg_result["bet_money"]+ $other_result["bet_money"];

$total_bet_money_status0 = $ft_result_status0["bet_money"] + $bk_result_status0["bet_money"]
    + $tn_result_status0["bet_money"] + $vl_result_status0["bet_money"]+ $bs_result_status0["bet_money"]
    + $gj_result_status0["bet_money"]+ $cg_result_status0["bet_money"]+ $other_result_status0["bet_money"];

$total_win_money = $ft_win + $bk_win + $tn_win + $vl_win + $bs_win + $gj_win + $cg_win + $other_win;

echo '
<style type="text/css">
    #choiceForm2 {
        background: url("/cl/tpl/template/images/bgform05_03.gif") repeat-y scroll center bottom transparent;
        left: 250px;
        position: absolute;
        top: 148px;
        width: 293px;
        display: none;
        border-bottom: 1px solid #CCC;
    }
    #choiceForm2 .title {
        background: url("/cl/tpl/template/images/bgform05_01.gif") no-repeat scroll left top transparent;
        float: left;
        height: 41px;
        line-height: 55px;
        padding-left: 40px;
        width: 253px;
    }
    #choiceForm2 .titleBtn01 {
        height: 16px;
        position: absolute;
        right: 8px;
        top: 20px;
        width: 28px;
    }
    #choiceForm2 .btn {
        float: right;
        width: 150px;
    }
    #choiceForm2 .text {
        float: left;
        margin: 10px 13px;
        width: 90%;
    }
	a.btn11 {
	    background: url("/cl/tpl/template/images/btn11.jpg") no-repeat scroll center top transparent;
	    color: #666666;
	    cursor: pointer;
	    display: block;
	    float: left;
	    height: 16px;
	    line-height: 22px;
	    text-align: center;
	    width: 16px;
	}
</style>
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
    
        <span class="MGameType" onclick="chgType(\'liveHistory\');">真人记录</span>｜
        <span class="MGameType" onclick="chgType(\'skRecord\');">彩票投注记录</span>｜
		<span class="MGameType MCurrentType" onclick="chgType(\'ballRecord\');">体育投注记录</span>｜
        <span class="MGameType" onclick="chgType(\'cqRecord\');">存取款记录</span>｜
    </div>
    <div id="MMainData">
        <div class="MControlNav">
            <select disabled="disabled" name="foo" id="MSelectType" class="MFormStyle">
                <option label="'.$date_POST.'" dis="false" value="history" selected="selected">'.$date_POST.'</option>
            </select>

            <input type="button" class="MBtnStyle" value="上一页" onclick="f_com.MChgPager({type: \'GET\', method: \'ballRecord\'});" onmouseover="mover(this);" onmouseout="mout(this);" />
        </div>
        <div class="MPanel" style="display: block;">
            <table class="MMain" border="1">
                <tr>
                    <th width="20%">游戏名称</th>
                    <th width="30%">下注金额</th>
                    <th width="30%">未结算金额</th>
                    <th width="20%">结果</th>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameDetails\'}, {date: \''.$date_POST.'\',gtype: \'足球\'});">足球</a>
                    </td>
                    <td style="text-align: center;">'.$ft_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$ft_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$ft_win.'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameDetails\'}, {date: \''.$date_POST.'\',gtype: \'篮球\'});">篮球</a>
                    </td>
                    <td style="text-align: center;">'.$bk_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$bk_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$bk_win.'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameDetails\'}, {date: \''.$date_POST.'\',gtype: \'网球\'});">网球</a>
                    </td>
                    <td style="text-align: center;">'.$tn_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$tn_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$tn_win.'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameDetails\'}, {date: \''.$date_POST.'\',gtype: \'排球\'});">排球</a>
                    </td>
                    <td style="text-align: center;">'.$vl_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$vl_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$vl_win.'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameDetails\'}, {date: \''.$date_POST.'\',gtype: \'棒球\'});">棒球</a>
                    </td>
                    <td style="text-align: center;">'.$bs_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$bs_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$bs_win.'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameDetails\'}, {date: \''.$date_POST.'\',gtype: \'冠军\'});">冠军</a>
                    </td>
                    <td style="text-align: center;">'.$gj_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$gj_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$gj_win.'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameCgDetails\'}, {date: \''.$date_POST.'\',gtype: \'串关\'});">串关</a>
                    </td>
                    <td style="text-align: center;">'.$cg_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$cg_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$cg_win.'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameDetails\'}, {date: \''.$date_POST.'\',gtype: \'其他\'});">其他</a>
                    </td>
                    <td style="text-align: center;">'.$other_result["bet_money"].'</td>
                    <td style="text-align: center;">'.$other_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$other_win.'</td>
                </tr>
                <tr>
                    <td style="text-align: center;">总计</td>
                    <td style="text-align: center;" align="right">'.$total_bet_money.'</td>
                    <td style="text-align: center;" align="right">'.$total_bet_money_status0.'</td>
                    <td style="text-align: center;" align="right">'.$total_win_money.'</td>
                </tr>

            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
var GAMESELECT = "ballRecord"
//選擇遊戲
$("#MSelectType").change(function() {
    switch(GAMESELECT) {
    case \'ballRecord\':
        f_com.MChgPager({method: \'ballHistory\'});
        break;
    case \'ballHistory\':
        f_com.MChgPager({method: \'ballRecord\'});
        break;
    }
});

function chgType(type) {
    switch(type) {
    case \'ballRecord\':
        f_com.MChgPager({method: \'ballRecord\'});
        break;
    case \'lotteryRecord\':
        f_com.MChgPager({method: \'lotteryRecord\'});
        break;
    case \'liveHistory\':
        f_com.MChgPager({method: \'liveHistory\'});
        break;
    case \'gameHistory\':
        f_com.MChgPager({method: \'gameHistory\'});
        break;
    case \'skRecord\':
    	f_com.MChgPager({method: \'skRecord\'});
        break;
    case \'a3dhHistory\':
    	f_com.MChgPager({method: \'a3dhHistory\'});
        break;
    case \'TPBFightHistory\':
        f_com.MChgPager({method: \'TPBFightHistory\'});
        break;
    case \'TPBSPORTHistory\':
        f_com.MChgPager({method: \'TPBSPORTHistory\'});
        break;
    case \'cqRecord\':
        f_com.MChgPager({method: \'cqRecord\'});
        break;
    }
}
</script>
';