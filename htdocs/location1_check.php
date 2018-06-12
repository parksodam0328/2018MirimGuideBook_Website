<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/auth.php";
	include "php/config.php";	//Session 및 DB 연결설정
	include "php/util.php";		//각종 유틸리티 함수
	
	$address = addslashes($address);
	$subway = addslashes($subway);
	$bus = addslashes($bus);
	$connect = my_connect($host, $dbid, $dbpass, $dbname);
	mysql_query("SET NAMES utf8");
	

 $img_dir = $_SERVER['DOCUMENT_ROOT']."/upload/location1";           //저장 디렉토리
 $img_tmp = $_FILES['image_location']['tmp_name'];             //임시 파일명
 $img_type = $_FILES['image_location']['type'];             //저장가능 이미지 타입
 $img_name = $_FILES['image_location']['name'];             //파일명(ex : xxxx.jpg)

 $filename = explode(".",$img_name);              //파일명 및 확장자를 분리한 배열
 $extension = strtolower($filename[sizeof($filename)-1]);

//타임 및 난수를 이용해서 기존 파일명 대신 사용할려고 함
 srand((double)microtime() * 1000000);             //난수만들기(seed 초기화)
 $random = sprintf('%03d',rand(1,999));             //난수만들기
 $up_filename = time()."_".$random.".".strtolower($extension);  //DB저장 파일명       
 $save_name = $img_dir."/".$up_filename;             //copy시 전체경로 및 파일명

 //파일 확장자로 올릴 수 있는 파일 체크함
 if($extension == "jpg" || $extension == "gif" || $extension == "jpeg" || $extension == "png") {}
 else{
  err_msg("이미지 파일만 올릴 수 있습니다.");
 }

 if(copy($img_tmp, $save_name)) {     //파일 업로드
	unlink($img_tmp);        //임시파일삭제
 } 
 else {
  unlink($img_tmp);
//    err_msg("파일 저장시 오류가 발생하였습니다.");
 }
$query = "insert into location1(address, subway, bus, image_type, image_location)
values('$address','$subway','$bus','$extension','$up_filename')"; 

$result = mysql_query($query, $connect) or die(mysql_error());

if(!$result) {
	err_msg("데이터베이스 오류가 발생하였습니다.");
}
else {
	echo "<script>
			window.alert('정상적으로 값이 입력되었습니다.');
		</script>";
echo "<meta http-equiv='Refresh' content='0;url=location.php'>";
}

?>

