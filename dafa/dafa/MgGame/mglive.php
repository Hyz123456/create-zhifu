<?php 
@session_start();
include_once("include/config.php");
$_SESSION["check_action"]=''; //检测用户是否用软件打水标识
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/styles/ucenter.css">
	<script src="/assets/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
	<script language="JavaScript">
	<!--
	window.onerror=function(){return true;}

	if(self==top){
		top.location='/index.php';
	}
	-->
	</script>
</head>
<body class="dashboard games iframe">

<?php
if(isset($_SESSION["uid"],$_SESSION["username"])){
?>
<script language="javascript">
parent.topFrame.document.getElementById('yhhd').style.display = 'none';
parent.topFrame.document.getElementById('mfkh').style.display = 'none';
parent.topFrame.document.getElementById('zhcx').style.display = 'block';
parent.topFrame.document.getElementById('grzl').style.display = 'block';
</script>
<?php
}else{ //未登陆
?>
<script language="javascript">
	parent.topFrame.window.location.reload(); //未登陆，刷新登陆页面
</script>
<?php
}
?> 
<div class="list-group menucp">
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Cqssc.php">重庆时时彩<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Jxssc.php">天津时时彩<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Xjssc.php">新疆时时彩<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Pk10.php">北京赛车PK10<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Xyft.php">幸运飞艇<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Cqsf.php">重庆幸运农场<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Gdsf.php">广东快乐十分<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/3D.php">福彩3D<span class="fa fa-lg fa-chevron-right"></span></a>
  <a href="#" class="list-group-item" data-iframe="J_GamesFrame" data-url="Lottery/Pl3.php">排列三<span class="fa fa-lg fa-chevron-right"></span></a>
</div>
	
	<?php include_once("scripts.php"); ?>

<script language="javascript">
function ShowHiddena(){
			if(document.getElementById('Label1').style.display == "block")
            {
				document.getElementById('Label1').style.display = "none";
            }
			if(document.getElementById('Label0').style.display == "none")
            {
				document.getElementById('Label0').style.display = "block";
            }else{
				document.getElementById('Label0').style.display = "none";
			}
			
			
}
function ShowHiddenb(){
			if(document.getElementById('Label0').style.display == "block")
            {
				document.getElementById('Label0').style.display = "none";
            }
			if(document.getElementById('Label1').style.display == "none")
            {
				document.getElementById('Label1').style.display = "block";
            }else{
				document.getElementById('Label1').style.display = "none";
			}
}
</script>


<div style="clear:both"></div>
<div>
</div>

<script type="text/javascript" language="javascript" src="js/left.js"></script>
<script type="text/javascript" language="javascript" src="js/touzhu.js?v=1"></script>
<!-- 
<script type="text/javascript" language="javascript" src="BJpkTen/js/bet.js"></script>
<script type="text/javascript" language="javascript" src="GDHappyTen/js/bet.js"></script>
 -->
<script type="text/javascript" language="javascript" src="js/left_mouse.js"></script>
<script type="text/javascript" language="javascript" src="/js/ifcp.js"></script>
<script language="javascript">
function ResumeError() {
    return true;
}
window.onerror = ResumeError; 
</script>
</body>
</html>