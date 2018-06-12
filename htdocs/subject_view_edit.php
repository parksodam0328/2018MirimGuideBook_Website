<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/util.php";
	include "php/config.php";	
	$connect = my_connect($host, $dbid, $dbpass, $dbname);

	$intro_sub = addslashes($intro_sub);
	mysql_query("SET NAMES utf8");

	$query = "update subject
			  set grade = '$grade',
				major = '$major',
				name_sub ='$name_sub',
				intro_sub = '$intro_sub',
				teacher = '$teacher',
				room = '$room'
			  where id='$num'";print_r($grade);
	$result = mysql_query($query, $connect) or die(mysql_error());
	
	if(!$result) {
		err_msg("DB 작업중 에러가 발생했습니다.");
	}
	else {
	echo "<script>
			window.alert('내용이 성공적으로 수정되었습니다.');
		</script>";
	echo "<meta http-equiv='Refresh' content='0;url=subject_view.php?num=$num'>";
	}

	

?>

