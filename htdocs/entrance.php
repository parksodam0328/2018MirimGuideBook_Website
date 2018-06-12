<?
	include "php/config.php";	//Session 및 DB 연결설정
	include "php/util.php";		//각종 유틸리티 함수
	
	//mysql 연결
	$connect = my_connect($host, $dbid, $dbpass, $dbname);
?>

    <html>

    <head>
        <title>입학 관리</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="shortcut icon" href="favicon.ico">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
            rel='stylesheet' type='text/css'>
        <!-- Global CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
        <!-- Theme CSS -->
        <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">

        <style>
            @font-face {
                font-family: 'Paragon Cleaners Medium';
                src: url(ParagonCleanersMedium.TTF) format('truetype');
            }

            input[type=text],
            select,
            textarea {
                width: 80%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
            }

            label {
                padding: 8px 8px 8px 0;
                display: inline-block;
            }

            input[type=button] {
                background-color: #E88554;
                color: white;
                padding: 10px 290px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
                margin-bottom: 0px;
            }

            input[type=button]:hover {
                background-color: #E55D4A;
            }

            .container2 {
                border-radius: 5px;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ccc;
            }

            .col-25 {
                float: left;
                width: 20%;
                margin-top: 6px;
            }

            .col-75 {
                float: left;
                width: 80%;
                margin-top: 6px;
            }

            /* Clear floats after the columns */

            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

            @media screen and (max-width: 600px) {
                .col-25,
                .col-75,
                input[type=button] {
                    width: 100%;
                    margin-top: 20px;
                }
            }
        </style>
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
        <!-- ******HEADER****** -->
        <header id="header" class="header">
            <div class="container">
                <h1 class="logo">
                    <a class="scrollto" href="index.html">
                        <span class="logo-icon-wrapper">
                            <img class="logo-icon" src="assets/images/logo-icon.svg" alt="icon">
                        </span>
                        <span class="text">
                            <span class="highlight">MirimGuideBook</span>
                        </span>
                    </a>
                </h1>
                <!--//logo-->
                <nav class="main-nav navbar-right" role="navigation">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--//nav-toggle-->
                    </div>
                    <!--//navbar-header-->
                    <div id="navbar-collapse" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active nav-item">
                                <a class="scrollto" href="index.html">MirimGuideBook</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="subject.php">Subject</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#rule.php">Rule</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#club.php">Club</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#team">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#entrance.php">Entrance</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#employment.php">Employment</a>
                            </li>
                            <li class="nav-item">
                                <a class="scrollto" href="#event.php">Event</a>
                            </li>
                        </ul>
                        <!--//nav-->
                    </div>
                    <!--//navabr-collapse-->
                </nav>
                <!--//main-nav-->
            </div>
            <!--//container-->
        </header>
        <!--//header-->
        <div id="testimonials" class="testimonials-section">
            <h2 class="section-title text-center" style="text-transform: capitalize;font-family:'Paragon Cleaners Medium' !important;">
                <font color="#000">Entrance</font>
            </h2>

            <div class="item center-block">
                <center>
                    <form name="form1" method="post" action="employment_check1.php">
                        <div class="container2">
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">학과이름</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="major" placeholder="학과이름">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">학과소개</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="major_intro" placeholder="학과소개">
                                </div>
							</div>
							<div class="row">
                                <div class="col-25">
                                    <label for="lname">학과 이미지</label>
                                </div>
                                <div class="col-75">
                                    <input type="file" name="major_image" placeholder="학과소개">
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <br>
                                    <br>
                                    <a class="btn btn-cta" href="javascript:checkEntranceInput1()">
                                        <input type="button" value="확인">
                                    </a>
                                    <br>
                                    <a class="btn btn-cta" href="entrance1_list.php">
                                        <input type="button" value="목록">
                                    </a>
                                    <br>
                                    <a class="btn btn-cta" href="index.html">
                                        <input type="button" value="취소">
                                    </a>
                                    <br>
                                </center>
							</div>
						</div>
					</form>
					<br><br><br>
					<form name="form2" method="post" action="entrance2_check.php">
                        <div class="container2">
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">날짜</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="date" placeholder="날짜">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">장소</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="room" placeholder="장소">
                                </div>
							</div>
							<div class="row">
                                <div class="col-25">
                                    <label for="lname">신청방법</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="apply" placeholder="신청방법">
                                </div>
							</div>
							<div class="row">
                                <div class="col-25">
                                    <label for="lname">포스터</label>
                                </div>
                                <div class="col-75">
                                    <input type="file" name="poster" placeholder="학과소개">
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <br>
                                    <br>
                                    <a class="btn btn-cta" href="javascript:checkEntranceInput2()">
                                        <input type="button" value="확인">
                                    </a>
                                    <br>
                                    <a class="btn btn-cta" href="entrance2_list.php">
                                        <input type="button" value="목록">
                                    </a>
                                    <br>
                                    <a class="btn btn-cta" href="index.html">
                                        <input type="button" value="취소">
                                    </a>
                                    <br>
                                </center>
                            </div>
                    </form>
					
                    </div>
                    <br><br><br>
					<form name="form3" method="post" action="entrance3_check.php">
                        <div class="container2">
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">번호</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="number" placeholder="번호">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">제목</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="title" placeholder="제목">
                                </div>
							</div>
							<div class="row">
                                <div class="col-25">
                                    <label for="lname">내용</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="content" placeholder="내용">
                                </div>
							</div>
                            <div class="row">
                                <center>
                                    <br>
                                    <br>
                                    <a class="btn btn-cta" href="javascript:checkEntranceInput3()">
                                        <input type="button" value="확인">
                                    </a>
                                    <br>
                                    <a class="btn btn-cta" href="entrance3_list.php">
                                        <input type="button" value="목록">
                                    </a>
                                    <br>
                                    <a class="btn btn-cta" href="index.html">
                                        <input type="button" value="취소">
                                    </a>
                                    <br>
                                </center>
                            </div>
                    </form>
                </center>

            </div>
            <!--//container-->
        </div>
        </div>
        <!--//testimonials-->
        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <!-- This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com -->
                <i class="fa fa-love"></i>2018 ITShow MirimGuideBook 박소담, 정유경
            </div>
            <!--//container-->
        </footer>

    </body>

    </html>