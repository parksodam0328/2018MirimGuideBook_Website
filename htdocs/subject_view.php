<?
header("Content-Type: text/html; charset=utf-8");
	include "php/config.php";	//Session 및 DB 연결설정
	include "php/util.php";		//각종 유틸리티 함수
	
	//mysql 연결
	$connect = my_connect($host, $dbid, $dbpass, $dbname);
	mysql_query("SET NAMES utf8");
	
?>

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>과목 관리</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
		<script src="common/member.js"></script>
		<script src="common/global.js"></script>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="php_admin.php" class="logo">
									<span class="symbol"><img src="images/logo.png" alt="" /></span><span class="title">Mirim Guide Book</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="https://www.e-mirim.hs.kr/renewal/main.jsp">Introduce</a></li>
							<li><a href="subject.php">Subject</a></li>
							<li><a href="rule.php">Rule</a></li>
							<li><a href="club.php">Club</a></li>
							<li><a href="location.php">Location</a></li>
							<li><a href="entrance.php">Entrance</a></li>
							<li><a href="experience.php">Experience</a></li>
							<li><a href="employment.php">Employment</a></li>
							<li><a href="event.php">Event</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Subject</h1>
							<span class="image main"><img src="images/pic13.jpg" alt="" /></span>
							<center>
								<table>
									<tr>
										<td>
											과목 정보 수정/관리
										</td>
									</tr>
<?
	$query = "select * from subject where id=$num";
	$result = mysql_query($query, $connect) or die(mysql_error());
	$rows = mysql_fetch_array($result);
?>
<form name="primary" method="post" action="subject_view_edit.php">
<input type="hidden" name="num" value="<?=$rows[id]?>">

<tr>
<td>
<table>
<tr>
<td>
	<table>
		<tr>
<td >학년</td>
<td><input type="text" name="grade" value="<?=$rows[grade]?>"></td>
		</tr>

<tr>
<td>학과</td>

<td>
<input type="text" name="major" value="<?=$rows[major]?>">
</td>
</tr>

<tr>
<td>과목</td>

<td>
<input type="text" name="name_sub" value="<?=$rows[name_sub]?>">
</td>
</tr>

<tr>
<td>과목 소개</td>
<td><input type="text" name="intro_sub" value="<?=$rows[intro_sub]?>">
</td>
</tr>

<tr>
<td>선생님 성함</td>
<td>
<input type="text" name="teacher" value="<?=$rows[teacher]?>">
</td>
</tr>

<tr>
<td>실습실 위치</td>
<td>
<input type="text" name="room" value="<?=$rows[room]?>">
</td>
</tr>
</table>
<br>

<table width="480" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
	<td>&nbsp;</td>
	<td align="right"><input type="submit" value="수정하기"></td>
</tr>
</table>
</td>
</tr>
</form>
</table>
</body>
</html>