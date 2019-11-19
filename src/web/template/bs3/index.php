<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>
		<?php echo $OJ_NAME?>
	</title>
	<?php include("template/$OJ_TEMPLATE/css.php");?>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<div class="container">
		<?php include("template/$OJ_TEMPLATE/nav.php");?>
		<!-- Main component for a primary marketing message or call to action -->
<!-- 		<div class="jumbotron">
			<p>
				<center> Recent submission :
					<?php echo $speed?> .
					<div id=submission style="width:80%;height:300px"></div>
				</center>
			</p>
			<?php echo $view_news?>
		</div> -->
<div class="jumbotron" style="margin-top:20px;">
    <h1 align="center">Welcome to UPC Online Judge on Loongson!</h1>
<div id="timer" style="text-align: center; font-size: 24px; font-family: SimSun-ExtB;"><strong>C/Python语言程序设计课程平台（2019-2020学年第一学期）<br></strong></div>

<!-- <script type="text/javascript">
    var endTime = getNextEndTime();
    countDown();

    function countDown() {
        var now = new Date();
        if(now > endTime) {
            setTimerText("倒计时结束!");
            return;
        }

        var sec = parseInt((endTime.getTime() - now.getTime()) / 1000);

        var day = parseInt(sec / 60/ 60/ 24);
        sec -= day * 60 * 60 * 24;
        var hour = parseInt(sec / 60 / 60);
        sec -= hour * 60 * 60;
        var min = parseInt(sec / 60);
        sec -= min * 60;


        setTimerText("距离山东省第" + getCNSession(endTime) + "届ACM大学生程序设计竞赛还有:<br />" + day + "天" + hour  + "小时" + min + "分钟" + sec + "秒");
        setTimeout("countDown()", 1000);
    }

    function setTimerText(text) {
        document.getElementById("timer").innerHTML = "<strong>" + text + "</strong>";
    }

    function getNextEndTime() {
        var nowDate = new Date();
        var nowYear = new Date().getFullYear();
        if(nowDate > getEndTime(nowYear)) {
            return getEndTime(nowYear + 1);
        }

        return getEndTime(nowYear)
    }

    function getEndTime(year) {
        var endTime;
        for (var d = 1; d <= 7; d++) {
            endTime = new Date(year, 4, d + 7, 9, 0, 0, 0);
            if(endTime.getDay() == 0) {
                break;
            }
        }

        return endTime;
    }
    
    function getCNSession(date) {
        var arr = ["零", "一", "二", "三", "四", "五", "六", "七", "八", "九", "十"];

        var num = date.getFullYear() - 2009;

        if (parseInt(num / 10) == 0) {
            return arr[num % 10];
        }

        if(num % 10 == 0) {
            if(num == 10) {
                return "十";
            } else {
                return arr[parseInt(num / 10)] + "十";
            }
        }

        if(parseInt(num / 10) == 1) {
            return "十" + arr[num % 10];
        }

        return arr[parseInt(num / 10)] + "十" + arr[num % 10];
    }
</script> -->

<br>
<div id="frontnews" style="text-align: center;">
    <p style="text-align: center; font-family: SimSun-ExtB; font-size: x-large; font-weight: bold;">如果您对国产龙芯CPU技术感兴趣<br>联系我们：liurf@lemote.com</p>
    <h4>欢迎访问 中国石油大学（华东）基于自主龙芯平台的在线评测系统！</h4>
    <h4>用户访问地址：<a href="http://112.25.158.4:8000/">http://112.25.158.4:8000/</a></h4>
    <h4>建议使用Chrome或Firefox等开源浏览器！</h4><br>
<!--     <h4><strong>Links:</strong></h4>
    <h4><a href="/page/problemsources">Problem by Source</a></h4>
    <h4><a href="http://115.28.79.206:8010/">入门OnlineJudge</a></h4>
    <h4><a href="http://www.ischool.sdnu.edu.cn/" target="_blank">山东师范大学信息科学与工程学院</a></h4> -->
</div>
<?php echo $view_news?>
</div>
	</div>
	<!-- /container -->


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include("template/$OJ_TEMPLATE/js.php");?>
	<script language="javascript" type="text/javascript" src="<?php echo $OJ_CDN_URL?>include/jquery.flot.js"></script>
	<script type="text/javascript">
		$( function () {
			var d1 = <?php echo json_encode($chart_data_all)?>;
			var d2 = <?php echo json_encode($chart_data_ac)?>;
			$.plot( $( "#submission" ), [ {
				label: "<?php echo $MSG_SUBMIT?>",
				data: d1,
				lines: {
					show: true
				}
			}, {
				label: "<?php echo $MSG_AC?>",
				data: d2,
				bars: {
					show: true
				}
			} ], {
				grid: {
					backgroundColor: {
						colors: [ "#fff", "#eee" ]
					}
				},
				xaxis: {
					mode: "time" //,
						//max:(new Date()).getTime(),
						//min:(new Date()).getTime()-100*24*3600*1000
				}
			} );
		} );
		//alert((new Date()).getTime());
	</script>
</body>
</html>
