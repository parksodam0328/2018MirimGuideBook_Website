<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/util.php";
	include "php/config.php";	
	$connect = my_connect($host, $dbid, $dbpass, $dbname);

	$employ_now = addslashes($employ_now);
	mysql_query("SET NAMES utf8");

	$query = "update employment2
			  set company_name = '$company_name',
			  field = '$field',
			  website = '$website'
			  where id='$num'";
	$result = mysql_query($query, $connect);
	
	if(!$result) {
		err_msg("DB 작업중 에러가 발생했습니다.");
	}
	else {
	echo "<script>
			window.alert('내용이 성공적으로 수정되었습니다.');
		</script>";
	echo "<meta http-equiv='Refresh' content='0;url=employment2_view.php?num=$num'>";
	}

	

?>

