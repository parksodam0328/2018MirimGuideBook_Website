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
		<title>위치 목록</title>
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
							<li><a href="intro.php">Introduce</a></li>
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
							<h1>Location</h1>
							<span class="image main"><img src="images/pic13.jpg" alt="" /></span>
							<center>


<?
	if($mode=='search') {
		if($address) {
			$sear_char .= ' and address like \'%'.$address.'%\'';
		}
		if($subway) {
			$sear_char .= ' and subway like \'%'.$subway.'%\'';
		}
		if($bus) {
			$sear_char .=  ' and bus like \'%'.$bus.'%\'';
		}
	}

	$query = "select * from location1 where 1 $sear_char";
	$result = mysql_query($query, $connect);
	$total = mysql_num_rows($result);
?>

<form name="mb" method="post" action="location1_list.php">
<input type="hidden" name="mode" value="search">
<div align="center">

<table width="95%" border="0" cellspacing="0" cellpadding="0">

<tr class="text">
	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>주소</b>
	</td>
	<td width="250" height="20">
<input type="text" name="address" value="<?=$address?>" size=20 class="input">
	</td>

	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>대중교통(지하철)</b>
	</td>
	<td width="250" height="20">
<input type="text" name="subway" value="<?=$subway?>" size=20 class="input">
	</td>
</tr>

<tr class="text">
	<td width="150" height="20" align="center" bgcolor="#F1F1F1">
		<b>대중교통(버스)</b>
		</td>
		<td width="250" height="20">
		<input type="text" name="bus" value="<?=$bus?>" size=20 class="input">
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
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#999999">
<tr>
	<td align="center" bgcolor="#f5f5f5" width="260"><strong>주소</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="210"><strong>대중교통(지하철)</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="210"><strong>대중교통(버스)</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="320"><strong>약도이미지</strong></td>
	<td align="center" bgcolor="#f5f5f5" width="130"><strong>삭제여부</strong></td>
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

	$query3 = "select * from location1
 			   where 1 $id
			   order by id asc limit $cline, $p_scale1";
	$result3 = mysql_query($query3, $connect);

	for($i=1; $rows3 = mysql_fetch_array($result3); $i++) {
		$bunho = $total - ($i + $cline) + 1;
?>
	<tr bgcolor="#ffffff">
		<td align="center"><a href="javascript:open_win('location1_view.php?num=<?=$rows3[id]?>','nwin','scrollbars=no, width=600, height=400')"><?=$rows3[address]?></a></td>
		<td align="center">
			<?=$rows3[subway]?></td>
		<td align="center"><?=$rows3[bus]?></td>
		<td align="center">
		<img src="/upload/location1/<?=$rows3[image_location]?>" width="200"></td>
		<td align="center" colspan="2">
<a href="location1_delete.php?m_num=<?=$rows3[id]?>&page=<?=$page?>" onclick="return confirm('삭제를 하게되면 이 위치의 모든 정보가 삭제됩니다. \n 정말 삭제하시겠습니까?')">
삭제</a>
		</td>
	</tr>
<?	} 
	mysql_free_result($result3);
?>	
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td height="40" align="center" class="text">
<?
		$url="location1_list.php?id=$id&address=$address&mode=$mode&subway=$subway&bus=$bus";
		page_avg($totalpage, $cpage, $url);
?>
	</td>
</tr>
</table>
</body>
</html>