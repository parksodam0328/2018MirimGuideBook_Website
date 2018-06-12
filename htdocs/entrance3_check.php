<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/config.php";	//Session 및 DB 연결설정
	include "php/util.php";		//각종 유틸리티 함수
	include "php/auth.php";

	//mysql 연결
	$connect = my_connect($host, $dbid, $dbpass, $dbname);

	$title = addslashes($title);
	$content = addslashes($content);
	mysql_query("SET NAMES utf8");

$query = "insert into entrance3(number, title, content)
values('$number','$title','$content')"; 

$result = mysql_query($query, $connect) or die(mysql_error());

if(!$result) {
	err_msg("데이터베이스 오류가 발생하였습니다.");
}
else {
	echo "<script>
			window.alert('정상적으로 값이 입력되었습니다.');
		</script>";
echo "<meta http-equiv='Refresh' content='0;url=entrance.php'>";
}

?>

