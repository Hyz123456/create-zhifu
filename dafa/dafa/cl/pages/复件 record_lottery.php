<?php 
$lhc_today_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d",time()));
$lhc_today_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d",time()),"0");
$lhc_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date("Y-m-d"));

$d3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"D3");
$p3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"P3");
$t3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"T3");
$cq_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQ");
$tj_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJ");
$jx_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"JX");
$gxsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GXSF");
$gdsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GDSF");
$tjsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJSF");
$gd11_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GD11");
$bjpk_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJPK");
$bjkn_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJKN");
$cqsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQSF");

$d3_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"D3","0");
$p3_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"P3","0");
$t3_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"T3","0");
$cq_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQ","0");
$tj_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJ","0");
$jx_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"JX","0");
$gxsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GXSF","0");
$gdsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GDSF","0");
$tjsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJSF","0");
$gd11_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GD11","0");
$bjpk_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJPK","0");
$bjkn_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJKN","0");
$cqsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQSF","0");

$d3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"D3");
$p3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"P3");
$t3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"T3");
$cq_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"CQ");
$tj_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"TJ");
$jx_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"JX");
$gxsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"GXSF");
$gdsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"GDSF");
$tjsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"TJSF");
$gd11_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"GD11");
$bjpk_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"BJPK");
$bjkn_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"BJKN");
$cqsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"CQSF");

$total_today_count = $lhc_today_result["bet_count"] + $d3_today_result["bet_count"] + $p3_today_result["bet_count"]
    + $t3_today_result["bet_count"] + $cq_today_result["bet_count"]+ $tj_today_result["bet_count"]
    + $jx_today_result["bet_count"]+ $gxsf_today_result["bet_count"] + $gdsf_today_result["bet_count"]
    + $tjsf_today_result["bet_count"] + $gd11_today_result["bet_count"]+ $bjpk_today_result["bet_count"]
    + $bjkn_today_result["bet_count"] + $cqsf_today_result["bet_count"];
$total_today_money = $lhc_today_result["bet_money"] + $d3_today_result["bet_money"] + $p3_today_result["bet_money"]
    + $t3_today_result["bet_money"] + $cq_today_result["bet_money"]+ $tj_today_result["bet_money"]
    + $jx_today_result["bet_money"]+ $gxsf_today_result["bet_money"] + $gdsf_today_result["bet_money"]
    + $tjsf_today_result["bet_money"] + $gd11_today_result["bet_money"]+ $bjpk_today_result["bet_money"]
    + $bjkn_today_result["bet_money"] + $cqsf_today_result["bet_money"];

$total_today_money_status0 = $lhc_today_result_status0["bet_money"] + $d3_today_result_status0["bet_money"] + $p3_today_result_status0["bet_money"]
    + $t3_today_result_status0["bet_money"] + $cq_today_result_status0["bet_money"]+ $tj_today_result_status0["bet_money"]
    + $jx_today_result_status0["bet_money"]+ $gxsf_today_result_status0["bet_money"] + $gdsf_today_result_status0["bet_money"]
    + $tjsf_today_result_status0["bet_money"] + $gd11_today_result_status0["bet_money"]+ $bjpk_today_result_status0["bet_money"]
    + $bjkn_today_result_status0["bet_money"]+ $cqsf_today_result_status0["bet_money"];

$total_win_money = $lhc_win + $d3_win + $p3_win
    + $t3_win + $cq_win+ $tj_win
    + $jx_win+ $gxsf_win + $gdsf_win
    + $tjsf_win + $gd11_win+ $bjpk_win
    + $bjkn_win + $cqsf_win;
echo '
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
	
        
        <span class="MGameType" onclick="chgType(\'liveHistory\');">真人记录</span>｜
        <span class="MGameType MCurrentType" onclick="chgType(\'skRecord\');">彩票投注记录</span>｜
        <span class="MGameType" onclick="chgType(\'ballRecord\');">体育投注记录</span>｜
		<span class="MGameType" onclick="chgType(\'cqRecord\');">存取款记录</span>｜
    </div>
    <div id="MMainData">
        <div class="MControlNav">
            <select name="foo" id="MSelectType" class="MFormStyle">
                <option label="今日交易" value="today" selected="selected">今日交易</option>
                <option label="历史交易" value="history">历史交易</option>
            </select>

            <select disabled="disabled">
                <option label="'.date("Y-m-d").'" selected="selected">'.date("Y-m-d").'</option>
            </select>
        </div>
        <div class="MPanel" style="display: block;">
            <table class="MMain" border="1">
                <tr>
                    <th style="width: 20%">游戏名称</th>
                    <th style="width: 30%">下注金额</th>
                    <th style="width: 30%">未结算金额</th>
                    <th style="width: 20%">结果</th>
                </tr>
				<tr align="center" class="MColor1">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'CQ\'});">重庆时时彩</a>
                    </td>
                    <td>
                        '.$cq_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$cq_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$cq_win.'</td>
                </tr>
                <tr align="center" class=" MColor2">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'BJPK\'});">北京PK拾</a>
                    </td>
                    <td>
                        '.$bjpk_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$bjpk_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$bjpk_win.'</td>
                </tr>
                <tr align="center" class="MColor1" >
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLhcHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'LT\'});">六合彩</a></td>
                    <td>'.$lhc_today_result["bet_money"].'</td>
                    <td>'.$lhc_today_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$lhc_win.'</td>
                </tr>
                <tr align="center" class=" MColor2">
                    <td><a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'D3\'});">3D彩</a></td>
                    <td>
                        '.$d3_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$d3_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$d3_win.'</td>
                </tr>
                <tr align="center" class="MColor1">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'P3\'});">排列三</a>
                    </td>
                    <td>
                        '.$p3_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$p3_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$p3_win.'</td>
                </tr>
                <tr align="center" class=" MColor2" style="display:none;">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'T3\'});">上海时时乐</a>
                    </td>
                    <td>
                        '.$t3_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$t3_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$t3_win.'</td>
                </tr>
                
                <tr align="center" class=" MColor2" style="display:none;">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'JX\'});">江西时时彩</a>
                    </td>
                    <td>
                        '.$jx_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$jx_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$jx_win.'</td>
                </tr>
                <tr align="center" class="MColor1" style="display:none;">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'TJ\'});">天津时时彩</a>
                    </td>
                    <td>
                        '.$tj_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$tj_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$tj_win.'</td>
                </tr>
                <tr align="center" class=" MColor2" style="display:none;">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'GXSF\'});">广西十分彩</a>
                    </td>
                    <td>
                        '.$gxsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$gxsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$gxsf_win.'</td>
                </tr>
                <tr align="center" class=" MColor2" style="display:none;">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'GDSF\'});">广东十分彩</a>
                    </td>
                    <td>
                        '.$gdsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$gdsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$gdsf_win.'</td>
                </tr>
                <tr align="center" class="MColor1" style="display:none;">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'TJSF\'});">天津十分彩</a>
                    </td>
                    <td>
                        '.$tjsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$tjsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$tjsf_win.'</td>
                </tr>
                <tr align="center" class="MColor1" style="display:none;">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'CQSF\'});">重庆十分彩</a>
                    </td>
                    <td>
                        '.$cqsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$cqsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$cqsf_win.'</td>
                </tr>
                <tr align="center" class=" MColor2" >
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'BJKN\'});">北京快乐8</a></td>
                    <td>
                        '.$bjkn_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$bjkn_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$bjkn_win.'</td>
                </tr>
                <tr align="center" class="MColor1">
                    <td><a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'GD11\'});">广东十一选五</a>
                    </td>
                    <td>
                        '.$gd11_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$gd11_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$gd11_win.'</td>
                </tr>
				
                <tr align="center">
                    <td>总计</td>
                    <td>'.$total_today_money.'</td>
                    <td>'.$total_today_money_status0.'</td>
                    <td>'.$total_win_money.'</td>
                </tr>

            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
var GAMESELECT = "SKRecord"
//選擇遊戲
$("#MSelectType").change(function() {
    switch(GAMESELECT) {
        case \'SKRecord\':
        case \'SKLotteryRecord\':
            f_com.MChgPager({method: \'SKHistory\'});
    break;
case \'SKHistory\':
    case \'SKLotteryHistory\':
        f_com.MChgPager({method: \'SKRecord\'});
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