<?php
include_once("../common/login_check.php");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");

$id			=	intval($_REQUEST['hf_id']);
$name		=	$_REQUEST['name'];
$qc_rqdz	=	intval($_REQUEST['qc_rqdz']);
$qc_rqdc	=	intval($_REQUEST['qc_rqdc']);
$qc_dsdz	=	intval($_REQUEST['qc_dsdz']);
$qc_dsdc	=	intval($_REQUEST['qc_dsdc']);
$qc_dxdz	=	intval($_REQUEST['qc_dxdz']);
$qc_dxdc	=	intval($_REQUEST['qc_dxdc']);
$qc_dydz	=	intval($_REQUEST['qc_dydz']);
$qc_dydc	=	intval($_REQUEST['qc_dydc']);
$sb_rqdz	=	intval($_REQUEST['sb_rqdz']);
$sb_rqdc	=	intval($_REQUEST['sb_rqdc']);
$sb_dxdz	=	intval($_REQUEST['sb_dxdz']);
$sb_dxdc	=	intval($_REQUEST['sb_dxdc']);
$sb_dydz	=	intval($_REQUEST['sb_dydz']);
$sb_dydc	=	intval($_REQUEST['sb_dydc']);
$bd_dz  	=	intval($_REQUEST['bd_dz']);
$bd_dc  	=	intval($_REQUEST['bd_dc']);
$rqs_dz 	=	intval($_REQUEST['rqs_dz']);
$rqs_dc 	=	intval($_REQUEST['rqs_dc']);
$bqc_dz 	=	intval($_REQUEST['bqc_dz']);
$bqc_dc 	=	intval($_REQUEST['bqc_dc']);
$gg_dz		=	intval($_REQUEST['gg_dz']);
$gg_dc		=	intval($_REQUEST['gg_dc']);
$lq_dsdz	=	intval($_REQUEST['lq_dsdz']);
$lq_dsdc	=	intval($_REQUEST['lq_dsdc']);
$lq_rfdz	=	intval($_REQUEST['lq_rfdz']);
$lq_rfdc	=	intval($_REQUEST['lq_rfdc']);
$lq_dxdz	=	intval($_REQUEST['lq_dxdz']);
$lq_dxdc	=	intval($_REQUEST['lq_dxdc']);
$gq_rfdz	=	intval($_REQUEST['gq_rfdz']);
$gq_rfdc	=	intval($_REQUEST['gq_rfdc']);
$gq_dxdz	=	intval($_REQUEST['gq_dxdz']);
$gq_dxdc	=	intval($_REQUEST['gq_dxdc']);
$gq_qcrqdz	=	intval($_REQUEST['gq_qcrqdz']);
$gq_qcrqdt	=	intval($_REQUEST['gq_qcrqdt']);
$gq_qcdxdz	=	intval($_REQUEST['gq_qcdxdz']);
$gq_qcdxdc	=	intval($_REQUEST['gq_qcdxdc']);
$gq_sbrqdz	=	intval($_REQUEST['gq_sbrqdz']);
$gq_sbrqdc	=	intval($_REQUEST['gq_sbrqdc']);
$gq_sbdxdz	=	intval($_REQUEST['gq_sbdxdz']);
$gq_sbdxdc	=	intval($_REQUEST['gq_sbdxdc']);
$gq_qcdydz	=	intval($_REQUEST['gq_qcdydz']);
$gq_qcdydc	=	intval($_REQUEST['gq_qcdydc']);
$gq_sbdydz	=	intval($_REQUEST['gq_sbdydz']);
$gq_sbdydc	=	intval($_REQUEST['gq_sbdydc']);
$wq_dydz	=	intval($_REQUEST['wq_dydz']);
$wq_dydc	=	intval($_REQUEST['wq_dydc']);
$wq_rbdz	=	intval($_REQUEST['wq_rbdz']);
$wq_rbdc	=	intval($_REQUEST['wq_rbdc']);
$wq_dsdz	=	intval($_REQUEST['wq_dsdz']);
$wq_dsdc	=	intval($_REQUEST['wq_dsdc']);
$wq_dxdz	=	intval($_REQUEST['wq_dxdz']);
$wq_dxdc	=	intval($_REQUEST['wq_dxdc']);
$pq_dydz	=	intval($_REQUEST['pq_dydz']);
$pq_dydc	=	intval($_REQUEST['pq_dydc']);
$pq_rpdz	=	intval($_REQUEST['pq_rpdz']);
$pq_rpdc	=	intval($_REQUEST['pq_rpdc']);
$pq_dxdz	=	intval($_REQUEST['pq_dxdz']);
$pq_dxdc	=	intval($_REQUEST['pq_dxdc']);
$pq_dsdz	=	intval($_REQUEST['pq_dsdz']);
$pq_dsdc	=	intval($_REQUEST['pq_dsdc']);
$bp_rfdz	=	intval($_REQUEST['bp_rfdz']);
$bp_rfdc	=	intval($_REQUEST['bp_rfdc']);
$bp_dxdz	=	intval($_REQUEST['bp_dxdz']);
$bp_dxdc	=	intval($_REQUEST['bp_dxdc']);
$bp_dsdz	=	intval($_REQUEST['bp_dsdz']);
$bp_dsdc	=	intval($_REQUEST['bp_dsdc']);
$gj_dz		=	intval($_REQUEST['gj_dz']);
$gj_dc		=	intval($_REQUEST['gj_dc']);
$jr_dz		=	intval($_REQUEST['jr_dz']);
$jr_dc		=	intval($_REQUEST['jr_dc']);
$wdy_dz		=	intval($_REQUEST['wdy_dz']);
$wdy_dc		=	intval($_REQUEST['wdy_dc']);
$cp_zd		=	intval($_REQUEST['cp_zd']);
$cp_zg		=	intval($_REQUEST['cp_zg']);
$ty_zd		=	intval($_REQUEST['ty_zd']);
$zqfsbl		=	floatval($_REQUEST['zqfsbl'])/100;
$cpfsbl		=	floatval($_REQUEST['cpfsbl'])/100;
$bbinfsbl		=	floatval($_REQUEST['bbinfsbl'])/100;
$agfsbl		=	floatval($_REQUEST['agfsbl'])/100;
$mgfsbl		=	floatval($_REQUEST['mgfsbl'])/100;

$abfsbl		=	floatval($_REQUEST['abfsbl'])/100;
$ptfsbl		=	floatval($_REQUEST['ptfsbl'])/100;
$value		=	''; //更新或新增提示信息

$sql =	"select * from k_group WHERE  name = '$name'";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
if(!empty($rs)){
    ///$updateSql = 'UPDATE user_list SET agfs = '.$agfsbl.',bbinfs = '.$bbinfsbl.' WHERE gid = '.$rs['id'].';';
    //$mysqli->query($updateSql);
}

if($id>0){ //更新
    $value	=	'更新';
    $sql	=	"Update `k_group` Set name='$name',qc_rqdz=$qc_rqdz,qc_rqdc=$qc_rqdc,qc_dsdz=$qc_dsdz,qc_dsdc=$qc_dsdc,qc_dxdz=$qc_dxdz,qc_dxdc=$qc_dxdc,qc_dydz=$qc_dydz,qc_dydc=$qc_dydc,sb_rqdz=$sb_rqdz,sb_rqdc=$sb_rqdc,sb_dxdz=$sb_dxdz,sb_dxdc=$sb_dxdc,sb_dydz=$sb_dydz,sb_dydc=$sb_dydc,bd_dz=$bd_dz,bd_dc=$bd_dc,rqs_dz=$rqs_dz,rqs_dc=$rqs_dc,bqc_dz=$bqc_dz,bqc_dc=$bqc_dc,gg_dz=$gg_dz,gg_dc=$gg_dc,lq_dsdz=$lq_dsdz,lq_dsdc=$lq_dsdc,lq_rfdz=$lq_rfdz,lq_rfdc=$lq_rfdc,lq_dxdz=$lq_dxdz,lq_dxdc=$lq_dxdc,gq_rfdz=$gq_rfdz,gq_rfdc=$gq_rfdc,gq_dxdz=$gq_dxdz,gq_dxdc=$gq_dxdc,gq_qcrqdz=$gq_qcrqdz,gq_qcrqdt=$gq_qcrqdt,gq_qcdxdz=$gq_qcdxdz,gq_qcdxdc=$gq_qcdxdc,gq_sbrqdz=$gq_sbrqdz,gq_sbrqdc=$gq_sbrqdc,gq_sbdxdz=$gq_sbdxdz,gq_sbdxdc=$gq_sbdxdc,gq_qcdydz=$gq_qcdydz,gq_qcdydc=$gq_qcdydc,gq_sbdydz=$gq_sbdydz,gq_sbdydc=$gq_sbdydc,wq_dydz=$wq_dydz,wq_dydc=$wq_dydc,wq_rbdz=$wq_rbdz,wq_rbdc=$wq_rbdc,wq_dsdz=$wq_dsdz,wq_dsdc=$wq_dsdc,wq_dxdz=$wq_dxdz,wq_dxdc=$wq_dxdc,pq_dydz=$pq_dydz,pq_dydc=$pq_dydc,pq_rpdz=$pq_rpdz,pq_rpdc=$pq_rpdc,pq_dxdz=$pq_dxdz,pq_dxdc=$pq_dxdc,pq_dsdz=$pq_dsdz,pq_dsdc=$pq_dsdc,bp_rfdz=$bp_rfdz,bp_rfdc=$bp_rfdc,bp_dxdz=$bp_dxdz,bp_dxdc=$bp_dxdc,bp_dsdz=$bp_dsdz,bp_dsdc=$bp_dsdc,gj_dz=$gj_dz,gj_dc=$gj_dc,jr_dz=$jr_dz,jr_dc=$jr_dc,wdy_dz=$wdy_dz,wdy_dc=$wdy_dc,cp_zd=$cp_zd,cp_zg=$cp_zg,ty_zd=$ty_zd,zqfsbl=$zqfsbl,cpfsbl=$cpfsbl,bbinfsbl=$bbinfsbl,agfsbl=$agfsbl,mgfsbl=$mgfsbl,abfsbl=$abfsbl,ptfsbl=$ptfsbl Where id=$id";
}else{ //新增
    $value	=	'新增';
    $sql	=	"Insert Into `k_group` (name,qc_rqdz,qc_rqdc,qc_dsdz,qc_dsdc,qc_dxdz,qc_dxdc,qc_dydz,qc_dydc,sb_rqdz,sb_rqdc,sb_dxdz,sb_dxdc,sb_dydz,sb_dydc,bd_dz,bd_dc,rqs_dz,rqs_dc,bqc_dz,bqc_dc,gg_dz,gg_dc,lq_dsdz,lq_dsdc,lq_rfdz,lq_rfdc,lq_dxdz,lq_dxdc,gq_rfdz,gq_rfdc,gq_dxdz,gq_dxdc,gq_qcrqdz,gq_qcrqdt,gq_qcdxdz,gq_qcdxdc,gq_sbrqdz,gq_sbrqdc,gq_sbdxdz,gq_sbdxdc,gq_qcdydz,gq_qcdydc,gq_sbdydz,gq_sbdydc,wq_dydz,wq_dydc,wq_rbdz,wq_rbdc,wq_dsdz,wq_dsdc,wq_dxdz,wq_dxdc,pq_dydz,pq_dydc,pq_rpdz,pq_rpdc,pq_dxdz,pq_dxdc,pq_dsdz,pq_dsdc,bp_rfdz,bp_rfdc,bp_dxdz,bp_dxdc,bp_dsdz,bp_dsdc,gj_dz,gj_dc,jr_dz,jr_dc,wdy_dz,wdy_dc,cp_zd,cp_zg,ty_zd,zqfsbl,cpfsbl,bbinfsbl,agfsbl,mgfsbl,abfsbl,ptfsbl) values ('$name',$qc_rqdz,$qc_rqdc,$qc_dsdz,$qc_dsdc,$qc_dxdz,$qc_dxdc,$qc_dydz,$qc_dydc,$sb_rqdz,$sb_rqdc,$sb_dxdz,$sb_dxdc,$sb_dydz,$sb_dydc,$bd_dz,$bd_dc,$rqs_dz,$rqs_dc,$bqc_dz,$bqc_dc,$gg_dz,$gg_dc,$lq_dsdz,$lq_dsdc,$lq_rfdz,$lq_rfdc,$lq_dxdz,$lq_dxdc,$gq_rfdz,$gq_rfdc,$gq_dxdz,$gq_dxdc,$gq_qcrqdz,$gq_qcrqdt,$gq_qcdxdz,$gq_qcdxdc,$gq_sbrqdz,$gq_sbrqdc,$gq_sbdxdz,$gq_sbdxdc,$gq_qcdydz,$gq_qcdydc,$gq_sbdydz,$gq_sbdydc,$wq_dydz,$wq_dydc,$wq_rbdz,$wq_rbdc,$wq_dsdz,$wq_dsdc,$wq_dxdz,$wq_dxdc,$pq_dydz,$pq_dydc,$pq_rpdz,$pq_rpdc,$pq_dxdz,$pq_dxdc,$pq_dsdz,$pq_dsdc,$bp_rfdz,$bp_rfdc,$bp_dxdz,$bp_dxdc,$bp_dsdz,$bp_dsdc,$gj_dz,$gj_dc,$jr_dz,$jr_dc,$wdy_dz,$wdy_dc,$cp_zd,$cp_zg,$ty_zd,$zqfsbl,$cpfsbl,$bbinfsbl,$agfsbl,$mgfsbl,$abfsbl,$ptfsbl)";
}




$mysqli->autocommit(FALSE);
$mysqli->query("BEGIN"); //事务开始
try{
    //echo $sql;exit;
    $mysqli->query($sql);
    $q1		=	$mysqli->affected_rows;
    if($id<1) $id = $mysqli->insert_id; //取新增id
    if($q1 == 1){
        //写入缓存文件开始
        $group  = "<?php\r\nunset(\$dz_db,\$dc_db);\r\n";
        $group .= "\$dz_db=array();\r\n";
        $group .= "\$dc_db=array();\r\n";
        $group .= "\$dz_db['足球单式']['让球']=".$qc_rqdz.";\r\n";
        $group .= "\$dc_db['足球单式']['让球']=".$qc_rqdc.";\r\n";
        $group .= "\$dz_db['足球单式']['单双']=".$qc_dsdz.";\r\n";
        $group .= "\$dc_db['足球单式']['单双']=".$qc_dsdc.";\r\n";
        $group .= "\$dz_db['足球单式']['大小']=".$qc_dxdz.";\r\n";
        $group .= "\$dc_db['足球单式']['大小']=".$qc_dxdc.";\r\n";
        $group .= "\$dz_db['足球单式']['标准盘']=".$qc_dydz.";\r\n";
        $group .= "\$dc_db['足球单式']['标准盘']=".$qc_dydc.";\r\n";
        $group .= "\$dz_db['足球上半场']['上半场让球']=".$sb_rqdz.";\r\n";
        $group .= "\$dc_db['足球上半场']['上半场让球']=".$sb_rqdc.";\r\n";
        $group .= "\$dz_db['足球上半场']['上半场大小']=".$sb_dxdz.";\r\n";
        $group .= "\$dc_db['足球上半场']['上半场大小']=".$sb_dxdc.";\r\n";
        $group .= "\$dz_db['足球上半场']['上半场标准盘']=".$sb_dydz.";\r\n";
        $group .= "\$dc_db['足球上半场']['上半场标准盘']=".$sb_dydc.";\r\n";
        $group .= "\$dz_db['足球单式']['波胆']=".$bd_dz.";\r\n";
        $group .= "\$dc_db['足球单式']['波胆']=".$bd_dc.";\r\n";
        $group .= "\$dz_db['足球单式']['入球数']=".$rqs_dz.";\r\n";
        $group .= "\$dc_db['足球单式']['入球数']=".$rqs_dc.";\r\n";
        $group .= "\$dz_db['足球单式']['半全场']=".$bqc_dz.";\r\n";
        $group .= "\$dc_db['足球单式']['半全场']=".$bqc_dc.";\r\n";
        $group .= "\$dz_db['足球早餐']['让球']=".$qc_rqdz.";\r\n";
        $group .= "\$dc_db['足球早餐']['让球']=".$qc_rqdc.";\r\n";
        $group .= "\$dz_db['足球早餐']['单双']=".$qc_dsdz.";\r\n";
        $group .= "\$dc_db['足球早餐']['单双']=".$qc_dsdc.";\r\n";
        $group .= "\$dz_db['足球早餐']['大小']=".$qc_dxdz.";\r\n";
        $group .= "\$dc_db['足球早餐']['大小']=".$qc_dxdc.";\r\n";
        $group .= "\$dz_db['足球早餐']['标准盘']=".$qc_dydz.";\r\n";
        $group .= "\$dc_db['足球早餐']['标准盘']=".$qc_dydc.";\r\n";
        $group .= "\$dz_db['足球早餐']['上半场让球']=".$sb_rqdz.";\r\n";
        $group .= "\$dc_db['足球早餐']['上半场让球']=".$sb_rqdc.";\r\n";
        $group .= "\$dz_db['足球早餐']['上半场大小']=".$sb_dxdz.";\r\n";
        $group .= "\$dc_db['足球早餐']['上半场大小']=".$sb_dxdc.";\r\n";
        $group .= "\$dz_db['足球早餐']['上半场标准盘']=".$sb_dydz.";\r\n";
        $group .= "\$dc_db['足球早餐']['上半场标准盘']=".$sb_dydc.";\r\n";
        $group .= "\$dz_db['足球早餐']['波胆']=".$bd_dz.";\r\n";
        $group .= "\$dc_db['足球早餐']['波胆']=".$bd_dc.";\r\n";
        $group .= "\$dz_db['足球早餐']['入球数']=".$rqs_dz.";\r\n";
        $group .= "\$dc_db['足球早餐']['入球数']=".$rqs_dc.";\r\n";
        $group .= "\$dz_db['足球早餐']['半全场']=".$bqc_dz.";\r\n";
        $group .= "\$dc_db['足球早餐']['半全场']=".$bqc_dc.";\r\n";
        $group .= "\$dz_db['足球滚球']['让球']=".$gq_qcrqdz.";\r\n";
        $group .= "\$dc_db['足球滚球']['让球']=".$gq_qcrqdt.";\r\n";
        $group .= "\$dz_db['足球滚球']['大小']=".$gq_qcdxdz.";\r\n";
        $group .= "\$dc_db['足球滚球']['大小']=".$gq_qcdxdc.";\r\n";
        $group .= "\$dz_db['足球滚球']['上半场让球']=".$gq_sbrqdz.";\r\n";
        $group .= "\$dc_db['足球滚球']['上半场让球']=".$gq_sbrqdc.";\r\n";
        $group .= "\$dz_db['足球滚球']['上半场大小']=".$gq_sbdxdz.";\r\n";
        $group .= "\$dc_db['足球滚球']['上半场大小']=".$gq_sbdxdc.";\r\n";
        $group .= "\$dz_db['足球滚球']['标准盘']=".$gq_qcdydz.";\r\n";
        $group .= "\$dc_db['足球滚球']['标准盘']=".$gq_qcdydc.";\r\n";
        $group .= "\$dz_db['足球滚球']['上半场标准盘']=".$gq_sbdydz.";\r\n";
        $group .= "\$dc_db['足球滚球']['上半场标准盘']=".$gq_sbdydc.";\r\n";
        $group .= "\$dz_db['篮球单式']['单双']=".$lq_dsdz.";\r\n";
        $group .= "\$dc_db['篮球单式']['单双']=".$lq_dsdc.";\r\n";
        $group .= "\$dz_db['篮球单式']['让球']=".$lq_rfdz.";\r\n";
        $group .= "\$dc_db['篮球单式']['让球']=".$lq_rfdc.";\r\n";
        $group .= "\$dz_db['篮球单式']['大小']=".$lq_dxdz.";\r\n";
        $group .= "\$dc_db['篮球单式']['大小']=".$lq_dxdc.";\r\n";
        $group .= "\$dz_db['篮球滚球']['让球']=".$gq_rfdz.";\r\n";
        $group .= "\$dc_db['篮球滚球']['让球']=".$gq_rfdc.";\r\n";
        $group .= "\$dz_db['篮球滚球']['大小']=".$gq_dxdz.";\r\n";
        $group .= "\$dc_db['篮球滚球']['大小']=".$gq_dxdc.";\r\n";
        $group .= "\$dz_db['网球单式']['标准盘']=".$wq_dydz.";\r\n";
        $group .= "\$dc_db['网球单式']['标准盘']=".$wq_dydc.";\r\n";
        $group .= "\$dz_db['网球单式']['让球']=".$wq_rbdz.";\r\n";
        $group .= "\$dc_db['网球单式']['让球']=".$wq_rbdc.";\r\n";
        $group .= "\$dz_db['网球单式']['单双']=".$wq_dsdz.";\r\n";
        $group .= "\$dc_db['网球单式']['单双']=".$wq_dsdc.";\r\n";
        $group .= "\$dz_db['网球单式']['大小']=".$wq_dxdz.";\r\n";
        $group .= "\$dc_db['网球单式']['大小']=".$wq_dxdc.";\r\n";
        $group .= "\$dz_db['排球单式']['标准盘']=".$pq_dydz.";\r\n";
        $group .= "\$dc_db['排球单式']['标准盘']=".$pq_dydc.";\r\n";
        $group .= "\$dz_db['排球单式']['让球']=".$pq_rpdz.";\r\n";
        $group .= "\$dc_db['排球单式']['让球']=".$pq_rpdc.";\r\n";
        $group .= "\$dz_db['排球单式']['大小']=".$pq_dxdz.";\r\n";
        $group .= "\$dc_db['排球单式']['大小']=".$pq_dxdc.";\r\n";
        $group .= "\$dz_db['排球单式']['单双']=".$pq_dsdz.";\r\n";
        $group .= "\$dc_db['排球单式']['单双']=".$pq_dsdc.";\r\n";
        $group .= "\$dz_db['棒球单式']['让球']=".$bp_rfdz.";\r\n";
        $group .= "\$dc_db['棒球单式']['让球']=".$bp_rfdc.";\r\n";
        $group .= "\$dz_db['棒球单式']['大小']=".$bp_dxdz.";\r\n";
        $group .= "\$dc_db['棒球单式']['大小']=".$bp_dxdc.";\r\n";
        $group .= "\$dz_db['棒球单式']['单双']=".$bp_dsdz.";\r\n";
        $group .= "\$dc_db['棒球单式']['单双']=".$bp_dsdc.";\r\n";
        $group .= "\$dz_db['冠军']=".$gj_dz.";\r\n";
        $group .= "\$dc_db['冠军']=".$gj_dc.";\r\n";
        $group .= "\$dz_db['金融']=".$jr_dz.";\r\n";
        $group .= "\$dc_db['金融']=".$jr_dc.";\r\n";
        $group .= "\$dz_db['串关']=".$gg_dz.";\r\n";
        $group .= "\$dc_db['串关']=".$gg_dc.";\r\n";
        $group .= "\$dz_db['未定义']=".$wdy_dz.";\r\n";
        $group .= "\$dc_db['未定义']=".$wdy_dc.";\r\n";
        $group .= "\$pk_db['彩票最低']=".$cp_zd.";\r\n";
        $group .= "\$pk_db['彩票最高']=".$cp_zg.";\r\n";
        $group .= "\$pk_db['体育最低']=".$ty_zd.";\r\n";
        $group .= "\$pk_db['体育返水']=".$zqfsbl.";\r\n";
        $group .= "\$pk_db['彩票返水']=".$cpfsbl.";\r\n";
        $group .= "\$pk_db['BB娱乐返水']=".$bbinfsbl.";\r\n";
		       $group .= "\$pk_db['MG娱乐返水']=".$mgfsbl.";\r\n";
        $group .= "\$pk_db['AB娱乐返水']=".$abfsbl.";\r\n";
        $group .= "\$pk_db['PT娱乐返水']=".$ptfsbl.";\r\n";
        if(@!chmod("../../cache",0777)){ //设置可写入缓存权限
            message("缓存文件写入失败！请先设 /cache 文件权限为：0777");
        }
        if(!write_file("../../cache/group_".$id.".php",$group.'?>')){ //写入缓存失败
            message("缓存文件写入失败！请先设/cache/group_".$id.".php文件权限为：0777");
        }
        if($m_file && !write_file($m_file."cache/group_".$id.".php",$group.'?>')){ //写入缓存失败
            message("缓存文件写入失败！请先设WAP/cache/group_".$id.".php文件权限为：0777");
        }

        //写入缓存文件结束
        $mysqli->commit(); //事务提交
        message($value."会员组限额成功!","group_edit.php?id=".$id);
    }else{
        $mysqli->rollback(); //数据回滚
        message($value."会员组限额失败2!");
    }
}catch(Exception $e){
    $mysqli->rollback(); //数据回滚
    message($value."会员组限额失败!");
}

function message($value,$url=""){ //默认返回上一页
    header("Content-type: text/html; charset=utf-8");
    $js  ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>message</title>
</head>

<body>';
    $js  .= "<script type=\"text/javascript\" language=\"javascript\">\r\n";
    $js .= "alert(\"".$value."\");\r\n";
    if($url) $js .= "window.location.href=\"$url\";\r\n";
    else $js .= "window.history.go(-1);\r\n";
    $js .= "</script>\r\n";
    $js.="</body></html>";
    echo $js;
    exit;
}
?>