<?php
function generate_password( $length = 10,$canshu=array(0,1,2,3)) {
	// 密码字符集，可任意添加你需要的字符
    $char[0] = 'abcdefghijklmnopqrstuvwxyz';//小写字母
    $char[1] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';//大写字母
    $char[2] = '01234567890123456789002376';//阿拉伯数字
    $char[3] = '!@#$%&*()-_[]{}<>~+=,.;:/?|';//特殊字符
    $chars='';//初始化密码字符串。根据用户选择的字符集不同而不同    
    foreach( $canshu as $v ) { 
        $chars.=$char[$v];
    }
	$password = '';//初始化生成的密码
	for ( $i = 0; $i < $length; $i++ ) {
		$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
	}
	return $password;
}
if($_POST){
    // var_dump($_POST);
    $length=is_numeric($_POST['length'])?$_POST['length']:8;
    $char=explode(',',$_POST['char']);
    $char=is_array($char)?$char:array(0,1,2,3);
    echo generate_password($length,$char);
}else{
    echo '0';
}