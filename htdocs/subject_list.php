<?
header("Content-Type: text/html; charset=UTF-8");
	include "php/auth.php";	
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
		<title>과목 목록</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
		<script language="javascript">
		function open_win(theURL, winName, features) {
		window.open(theURL, winName, features);
		}
		</script>
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


<?
	if($mode=='search') {
		if($grade) {
			$sear_char .=' and grade='.$grade.'';
		}
		if($major) {
			$sear_char .=' and major like \'%'.$major.'%\'';
		}
		if($name_sub) {
			$sear_char .=' and name_sub like \'%'.$name_sub.'%\'';
		}
		if($intro_sub) {
			$sear_char .= ' and intro_sub like \'%'.$intro_sub.'%\'';
		}
		if($teacher) {
			$sear_char .= ' and teacher like \'%'.$teacher.'%\'';
		}
		if($room) {
			$sear_char .=' and room like \'%'.$room.'%\'';
		}
	}

	$query = "select * from subject where 1 $sear_char";
	$result = mysql_query($query, $connect);
	$total = mysql_num_rows($result);
?>

<form name="mb" method="post" action="subject_list.php">
<input type="hidden" name="mode" value="search">
<div align="center">

<table width="95%" border="0" cellspacing="0" cellpadding="0">

<tr class="text">
	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>학년</b>
	</td>
	<td width="250" height="20">
<input type="text" name="grade" value="<?=$grade?>" size=20 class="input">
	</td>
<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>학과</b>
	</td>
	<td width="250" height="20">
<input type="text" name="major" value="<?=$major?>" size=20 class="input">
	</td>

<tr class="text">
	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>과목</b>
	</td>
	<td width="250" height="20">
<input type="text" name="name_sub" value="<?=$name_sub?>" size=20 class="input">
	</td>
	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>과목 소개</b>
	</td>
	<td width="250" height="20">
<input type="text" name="intro_sub" value="<?=$intro_sub?>" size=20 class="input">
	</td>
</tr>
<tr class="text">
	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>담당 선생님</b>
	</td>
	<td width="250" height="20">
<input type="text" name="teacher" value="<?=$teacher?>" size=20 class="input">
	</td>
	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>실습실</b>
	</td>
	<td width="250" height="20">
<input type="text" name="room" value="<?=$room?>" size=20 class="input">
	</td>
</tr>

<tr>
	<td colspan="4">
<center><input type="submit" value="검색" class="input"> </center>
	</td>
</tr>
</table>
</div>
</form>
<table width="100%" border="0"cellspacing="0" cellpadding="0">
<tr class="text">
	<td align="right">
		전체목록 <?=number_format($total)?> 개
	</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#999999">
<tr>
	<td align="center" bgcolor="#f5f5f5" width="100"><strong>학년</strong></td>
	<td align="center" bgcolor="#f5f5f5"><strong>학과</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="150"><strong>과목</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="300"><strong>과목 소개</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="200"><strong>담당 선생님</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="160"><strong>실습실</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="160"><strong>삭제여부</strong></td>
</tr>

<?
	if(!$page) {
		$page = 1;
	}

	$p_scale = 10; //화면에 표시되는 갯수
	$cpage = intval($page);
	$totalpage=intval($total/$p_scale);

	if($totalpage*$p_scale!=$total) {
		$totalpage = $totalpage+1;
	}

	//결국 $cline와 $p_scale1 값을 구하는 공식들

	if($cpage==1) {
		$cline=0;
	}
	else {
		$cline = ($cpage*$p_scale) - $p_scale;
	}

	$limit = $cline + $p_scale;

	if($limit>=$total) {
		$limit = $total;
	}
	$p_scale1 = $limit - $cline;

	$query4 = "select * from subject
 			   where 1 $id
			   order by grade asc, major desc limit $cline, $p_scale1";
	$result4 = mysql_query($query4, $connect);

	for($i=1; $rows4 = mysql_fetch_array($result4); $i++) {
		$bunho = $total - ($i + $cline) + 1;
?>
	<tr bgcolor="#ffffff">
		<td align="center"><?=$rows4[grade]?></td>
		<td align="center"><a href="javascript:open_win('subject_view.php?num=<?=$rows4[id]?>','nwin','scrollbars=no, width=600, height=400')">
			<?=$rows4[major]?></a></td>
		<td align="center"><?=$rows4[name_sub]?></td>
		<td align="center"><?=$rows4[intro_sub]?></td>
		<td align="center"><?=$rows4[teacher]?></td>
		<td align="center"><?=$rows4[room]?></td>
		<td align="center" colspan="2">
<a href="subject_delete.php?m_num=<?=$rows4[id]?>&page=<?=$page?>" onclick="return confirm('삭제를 하게되면 이 과목의 모든 정보가 삭제됩니다. \n 정말 삭제하시겠습니까?')">
삭제</a>
		</td>
	</tr>
<?	} 
	mysql_free_result($result4);
?>	
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td height="40" align="center" class="text">
<?
		$url="subject_list.php?id=$id&grade=$grade&mode=$mode&major=$major&name_sub=$name_sub&intro_sub=$intro_sub&teacher=$teacher&room=$room";
		page_avg($totalpage, $cpage, $url);
?>
	</td>
</tr>
</table>
</body>
</html>