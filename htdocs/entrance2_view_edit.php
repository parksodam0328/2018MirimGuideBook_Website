<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/util.php";
	include "php/config.php";	
	$connect = my_connect($host, $dbid, $dbpass, $dbname);

	$date = addslashes($date);
	$room = addslashes($room);
	$apply = addslashes($apply);
	mysql_query("SET NAMES utf8");

	$query = "update entrance2
			  set date = '$date',
			  room = '$room'
			   apply = '$apply'
			  where id='$num'";
	$result = mysql_query($query, $connect);
	
	if(!$result) {
		err_msg("DB 작업중 에러가 발생했습니다.");
	}
	else {
	echo "<script>
			window.alert('내용이 성공적으로 수정되었습니다.');
		</script>";
	echo "<meta http-equiv='Refresh' content='0;url=entrance2_view.php?num=$num'>";
	}

	

?>
