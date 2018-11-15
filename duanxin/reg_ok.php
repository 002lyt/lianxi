<?php 
$username = $_GET['username'];
$password = $_GET['password'];
$phone = $_GET['phone'];
$code = $_GET['code'];

$redis=new Redis;
$redis->connect('127.0.0.1',6379);
$old_code=$redis->set('code',$code);
if ($code = $old_code) {
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=test","root","root");
	$sql = "insert into (username,password,sttaus) values ('$username','$password','$phone','1')";
	if ($pdo->exec($sql)) {
		echo "成功";
	}

}else
{
	echo "<script>alert('验正码错误');history.go(-1)</script>;
}


 ?>