<?
	include "php/auth.php";
	include "php/config.php";	//Session 및 DB 연결설정
	include "php/util.php";		//각종 유틸리티 함수
	
	//mysql 연결
	$connect = my_connect($host, $dbid, $dbpass, $dbname);
	
?>

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>미림가이드북 관리자 페이지</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
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
										<li><a href="#menu">Mirim Guide Book</a></li>
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
							<header>
								<h1>미림가이드북 관리자 페이지<br/></h1>
								
							</header>
							<section class="tiles">
								<article class="style1">
									<span class="image">
										<img src="images/school.png" alt="" />
									</span>
									<a href="https://www.e-mirim.hs.kr/renewal/main.jsp">
										<h2>Mirim Guide Book</h2>
										<div class="content">
											
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="images/subject.png" alt="" />
									</span>
									<a href="subject.php">
										<h2>Subject</h2>
										<div class="content">
											<p>과목</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="images/rule.png" alt="" />
									</span>
									<a href="rule.php">
										<h2>Rule</h2>
										<div class="content">
											<p>규정</p>
										</div>
									</a>
								</article>
								<article class="style4">
									<span class="image">
										<img src="images/club.png" alt="" />
									</span>
									<a href="club.php">
										<h2>Club</h2>
										<div class="content">
											<p>동아리</p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/location.png" alt="" />
									</span>
									<a href="location.php">
										<h2>Location</h2>
										<div class="content">
											<p>위치</p>
										</div>
									</a>
								</article>
								<article class="style6">
									<span class="image">
										<img src="images/entrance.png" alt="" />
									</span>
									<a href="entrance.php">
										<h2>Entrance</h2>
										<div class="content">
											<p>입학</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="images/experience.png" alt="" />
									</span>
									<a href="experience.php">
										<h2>Experience</h2>
										<div class="content">
											<p>체험</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="images/employment.png" alt="" />
									</span>
									<a href="employment.php">
										<h2>Employment</h2>
										<div class="content">
											<p>취업</p>
										</div>
									</a>
								</article>
								<article class="style1">
									<span class="image">
										<img src="images/event.png" alt="" />
									</span>
									<a href="event.php">
										<h2>Event</h2>
										<div class="content">
											<p>행사</p>
										</div>
									</a>
								</article>
							</section>
						</div>
					</div>

				<!-- Footer -->
				<center>
					<footer id="footer">
						<div class="inner">
							<ul class="copyright">
								<li> 미림가이드북</li><li>뉴미디어솔루션과 2학년 5반 박소담, 정유경</li>
							</ul>
						</div>
					</footer>
				</center>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>