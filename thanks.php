<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>
<!-- テスト -->
	<body>
	<?php
	$dsn = 'mysql:dbname=phpkiso;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh -> query('SET NAMES utf8');

		$nickname=$_POST['nickname'];
		$email=$_POST['email'];
		$goiken=$_POST['goiken'];

		$nickname= htmlspecialchars($nickname);
		$email= htmlspecialchars($email);
		$goiken= htmlspecialchars($goiken);

		echo $nickname;
		echo '様！';
		print 'ご意見ありがとうございました。<br/>';
		echo '頂いたご意見『';
		echo $goiken;
		echo '』<br/>';
		echo $email;
		echo 'にメールを送りましたのでご確認ください。';

//		$mail_sub='アンケート受け付けました。';

//		echo '<a href="index.html">ホーム画面に戻る</a>';

$sql='INSERT INTO `survey`(`nickname`, `email`, `goiken`) VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
//echo '<br />';
var_dump($sql);
//INSERT文を実行
$stmt=$dbh->prepare($sql);
$stmt->execute();

//データベースから切断
$dbh=null;

	?>
	</body>
</html>