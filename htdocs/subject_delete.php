<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/auth.php";	
	include "php/config.php";	
	include "php/util.php";	
	$connect = my_connect($host, $dbid, $dbpass, $dbname);
mysql_query("SET NAMES utf8");
	$query = "select * from subject where id='$m_num'";
	$result = mysql_query($query, $connect);
	$rows = mysql_fetch_array($result);

	if($rows) {
		$query1 = "delete from subject where id='$m_num'";
		mysql_query($query1, $connect);	
	}


	echo "<script>
			window.alert('과목 정보가 삭제되었습니다.');
		</script>";
	echo "<meta http-equiv='Refresh' content='0;url=subject_list.php?page=$page'>";
?>