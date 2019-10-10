<?php
$expiration_timestamp = 1364586060; #in reality, fetch from database

require_once 'dbconfig.php';

$dsn= "mysql:host=$host;dbname=$db";

try{
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);

    $result = $conn->prepare("SELECT * FROM counter ORDER BY id ASC");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
        $id = $row['id'];
        switch ($id) {
            case 1:
                $sec1 = $row['sec1'];
                $min1 = $row['min1'];
                $h1 = $row['h1'];
                break;
            case 2:
                $sec2 = $row['sec1'];
                $min2 = $row['min1'];
                $h2 = $row['h1'];
                break;
            case 3:
                $sec3 = $row['sec1'];
                $min3 = $row['min1'];
                $h3 = $row['h1'];
                break;
            case 4:
                $sec4 = $row['sec1'];
                $min4 = $row['min1'];
                $h4 = $row['h1'];
                break;
        }
    }
}catch (PDOException $e){
    // report error message
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Timer - ETIC INSA Technologies</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/demo.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <?php echo "<script type='text/javascript'>
        $(document).ready(function(){
            const timer = $('#timer');
            const s = $(timer).find('.seconds');
            const m = $(timer).find('.minutes');
            const h = $(timer).find('.hours');

            var t=setInterval(refreshTimer,500);
            
            function refreshTimer() {
                    $.ajax({
                      url: 'getDB1.php',
                      type: 'GET',
                      success: function(output){
                           var res = output.split(' ');
                           $(s).text(pad(res[0]));
                            $(m).text(pad(res[1]));
                            $(h).text(pad(res[2]));
                      }
                    });
                    
                  
            }
            
            $('.input-wrapper').slideUp(350);
            setTimeout(function(){
                $('#timer').fadeIn(350);
                $('#resume-timer').fadeIn(350)

            }, 350);

            function pad(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }
        })
        </script>"; ?>


    <?php echo "<script type='text/javascript'>
        $(document).ready(function(){
            const timer2 = $('#timer2');
            const s2 = $(timer2).find('.seconds2');
            const m2 = $(timer2).find('.minutes2');
            const h2 = $(timer2).find('.hours2');

            var t=setInterval(refreshTimer2,500);
            
            function refreshTimer2() {
                    $.ajax({
                      url: 'getDB2.php',
                      type: 'GET',
                      success: function(output){
                           var res2 = output.split(' ');
                           $(s2).text(pad2(res2[0]));
                            $(m2).text(pad2(res2[1]));
                            $(h2).text(pad2(res2[2]));
                      }
                    });
            }
            
            $('.input-wrapper').slideUp(350);
            setTimeout(function(){
                $('#timer2').fadeIn(350);

            }, 350);

            function pad2(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }
        })
        </script>"; ?>

    <?php echo "<script type='text/javascript'>
        $(document).ready(function(){
            const timer3 = $('#timer3');
            const s3 = $(timer3).find('.seconds3');
            const m3 = $(timer3).find('.minutes3');
            const h3 = $(timer3).find('.hours3');

            var t=setInterval(refreshTimer3,500);
            
            function refreshTimer3() {
                    $.ajax({
                      url: 'getDB3.php',
                      type: 'GET',
                      success: function(output){
                           var res3 = output.split(' ');
                           $(s3).text(pad3(res3[0]));
                            $(m3).text(pad3(res3[1]));
                            $(h3).text(pad3(res3[2]));
                      }
                    });
            }
            
            $('.input-wrapper').slideUp(350);
            setTimeout(function(){
                $('#timer3').fadeIn(350);

            }, 350);

            function pad3(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }
        })
        </script>"; ?>

    <?php echo "<script type='text/javascript'>
        $(document).ready(function(){
            const timer4 = $('#timer4');
            const s4 = $(timer4).find('.seconds4');
            const m4 = $(timer4).find('.minutes4');
            const h4 = $(timer4).find('.hours4');

            var t=setInterval(refreshTimer4,500);
            
            function refreshTimer4() {
                    $.ajax({
                      url: 'getDB4.php',
                      type: 'GET',
                      success: function(output){
                           var res4 = output.split(' ');
                           $(s4).text(pad4(res4[0]));
                 
                            $(m4).text(pad4(res4[1]));
                            $(h4).text(pad4(res4[2]));
                      }
                    });
            }
            
            $('.input-wrapper').slideUp(350);
            setTimeout(function(){
                $('#timer4').fadeIn(350);

            }, 350);

            function pad4(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }
        })
        </script>"; ?>
    
    <!-- favicons
     ================================================== -->
    <link rel="icon" type="image/png" href="favicon.ico">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<!-- header
================================================== -->
<header>
    <div class="row">
        <div class="col-twelve">
            <h1>Débat avec les candidats à la direction</h1>
        </div>
    </div>
</header> <!-- /header -->


<!-- main content
================================================== -->

<div class="section">
    <section class="clock">
        <div class="container">
            <div class="row">
                <div class="demo-title">
                    <h3>Mme Marie-Christine BAIETTO</h3>
                </div>
                <div id="timer" class="col-12">
                    <div class="clock-wrapper">
                        <span class="hours">00</span>
                        <span class="dots">:</span>
                        <span class="minutes">00</span>
                        <span class="dots">:</span>
                        <span class="seconds">00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><div class="section">
    <section class="clock">
        <div class="container">
            <div class="row">
                <div class="demo-title">
                    <h3>M. Frédéric FOTIADU</h3>
                </div>
                <div id="timer2" class="col-12">
                    <div class="clock-wrapper">
                        <span class="hours2">00</span>
                        <span class="dots">:</span>
                        <span class="minutes2">00</span>
                        <span class="dots">:</span>
                        <span class="seconds2">00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><div class="section">
    <section class="clock">
        <div class="container">
            <div class="row">
                <div class="demo-title">
                    <h3>M. Philippe JAMET</h3>
                </div>
                <div id="timer3" class="col-12">
                    <div class="clock-wrapper">
                        <span class="hours3">00</span>
                        <span class="dots">:</span>
                        <span class="minutes3">00</span>
                        <span class="dots">:</span>
                        <span class="seconds3">00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><div class="section">
    <section class="clock">
        <div class="container">
            <div class="row">
                <div class="demo-title">
                    <h3>M. Vincent MAGNON</h3>
                </div>
                <div id="timer4" class="col-12">
                    <div class="clock-wrapper">
                        <span class="hours4">00</span>
                        <span class="dots">:</span>
                        <span class="minutes4">00</span>
                        <span class="dots">:</span>
                        <span class="seconds4">00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<div id="preloader">
    <div id="loader"></div>
</div>

<footer>
    <section class="footerSection">
        <article class="footerArticle">
            <p>Made with <span style="color: #e25555;">&#9829;</span> by</p>
            <img src="horizontal.png" width="50%">
        </article>
    </section>
</footer>

<!-- Java Script
================================================== -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>