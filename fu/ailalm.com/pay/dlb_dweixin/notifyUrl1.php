<?php
function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//ȥ�����һ��&�ַ�
	$arg = substr($arg,0,count($arg)-2);
	
	//�������ת���ַ�����ôȥ��ת��
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}



$url=createLinkstring($_GET)."\n";


file_put_contents("ceshi.txt", $url, FILE_APPEND);



$head=getallheaders();



file_put_contents("ceshi2.txt", "timestamp|".$head["timestamp"]."\n", FILE_APPEND);
file_put_contents("ceshi2.txt", "token|".$head["token"]."\n", FILE_APPEND);
?>