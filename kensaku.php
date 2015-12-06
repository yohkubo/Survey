<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>survey_検索</title>
	</head>
	<body>

	<?php
		$code=$_POST['code'];

		$dsn = 'mysql:dbname=phpkiso;host=localhost';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->query('SET NAMES utf8');

		//SQL文作成
		$sql = 'SELECT*FROM `survey` WHERE code=?';

		//SQL文実行
		$stmt = $dbh -> prepare ($sql);
		$data[]=$code;
		$stmt ->execute($data);

		//実行結果として得られたデータを表示
		while(1){
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);

			if($rec==false)
			{
				break;
			}
			echo $rec['code'];
			echo $rec['nickname'];
			echo $rec['email'];
			echo $rec['goiken'];
			echo '<br />';

		}
		//DB接続を解除
		$dbh = null;
	?>

	</body>
</html>