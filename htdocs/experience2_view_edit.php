<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/util.php";
	include "php/config.php";	
	$connect = my_connect($host, $dbid, $dbpass, $dbname);

	$coding = addslashes($coding);
	$result = addslashes($result);
	mysql_query("SET NAMES utf8");

	$query = "update experience2 set
			coding='$coding',
			result ='$e_result2'
			  where id='$num'";
	$result = mysql_query($query, $connect);
	
	if(!$result) {
		err_msg("DB 작업중 에러가 발생했습니다.");
	}
	else {
	echo "<script>
			window.alert('내용이 성공적으로 수정되었습니다.');
		</script>";
	echo "<meta http-equiv='Refresh' content='0;url=experience2_view.php?num=$num'>";
	}

	

?>

