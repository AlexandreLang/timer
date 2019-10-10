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

            var seconds = 0;
            var minutes = 0;
            var hours = 0;
            
            var interval = null;

            $('.input-wrapper').slideUp(350);
            setTimeout(function(){
                $('#timer').fadeIn(350);
                $('#resume-timer').fadeIn(350)

            }, 350);

            $('button#stop-timer').on('click', function() {
                pauseClock()
            });

            $('button#reset-timer').on('click', function() {
                restartClock()
            });

            $('button#resume-timer').on('click', function() {

                cronometer();
            });

            function pad(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }

            function restartClock() {
                clear(interval);
                hasStarted = false;
                hasEnded = false;

                seconds = 0;
                minutes = 0;
                hours = 0;

                $(s).text('00');
                $(m).text('00');
                $(h).text('00');
                
                saveToDB(seconds,minutes,hours);

                $(timer).find('span').removeClass('red')
            }

            function pauseClock() {
                clear(interval);
                $('#resume-timer').fadeIn();
                $('#reset-timer').fadeIn();
            }

            function cronometer() {
                $('#stop-timer').fadeIn();
                $('#reset-timer').fadeOut();
                $('#resume-timer').fadeOut();
                hasStarted = true;
                interval = setInterval(() => {
                    if (seconds < 59) {
                    seconds++;
                    saveToDB(seconds,minutes,hours);
                    refreshClock();
                }
            else if (seconds == 59) {
                    minutes++;
                 
                    seconds = 0;
                    refreshClock();
                }

                if (minutes == 60) {
                    hours++;
                    minutes = 0;
                    seconds = 0;
                    refreshClock();
                }

            }, 1000);
            }

            function refreshClock() {
                $(s).text(pad(seconds));
                $(m).text(pad(minutes));
                if (hours < 0) {
                    $(s).text('00');
                    $(m).text('00');
                    $(h).text('00');
                } else {
                    $(h).text(pad(hours))
                }

                if (hours == 0 && minutes == 0 && seconds == 0 && hasStarted == true) {
                    hasEnded = true
                    alert('The Timer has Ended !')
                }
            }

            function clear(intervalID) {
                clearInterval(intervalID)
            }
            
            function saveToDB(sec,min,h) {
                    $.ajax({
                      url: 'saveToDB.php',
                      type: 'POST',
                      data: { sec : sec,min :min,h:h },
                      success: function(output){
                      
                      }
                    });
            }
        })
        </script>"; ?>

    <?php echo "<script type='text/javascript'>
        $(document).ready(function(){
            const timer2 = $('#timer2');  ////////////
            const s2 = $(timer2).find('.seconds2');
            const m2 = $(timer2).find('.minutes2');
            const h2 = $(timer2).find('.hours2');

            var seconds2 = 0;
            var minutes2 = 0;
            var hours2 = 0;
            
            var interval2 = null;

            $('.input-wrapper').slideUp(350); 
            setTimeout(function(){
                $('#timer2').fadeIn(350);
                $('#resume-timer2').fadeIn(350)

            }, 350);

            $('button#stop-timer2').on('click', function() {
                pauseClock2()
            });

            $('button#reset-timer2').on('click', function() {
                restartClock2()
            });

            $('button#resume-timer2').on('click', function() {

                cronometer2();
            });

            function pad2(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }

            function restartClock2() {
                clear2(interval2);
                hasStarted2 = false;
                hasEnded2 = false;

                seconds2 = 0;
                minutes2 = 0;
                hours2 = 0;

                $(s2).text('00');
                $(m2).text('00');
                $(h2).text('00');
                
                saveToDB2(seconds2,minutes2,hours2);

                $(timer2).find('span').removeClass('red')
            }

            function pauseClock2() {
                clear2(interval2);
                $('#resume-timer2').fadeIn();
                $('#reset-timer2').fadeIn();
            }

            function cronometer2() {
                $('#stop-timer2').fadeIn();
                $('#reset-timer2').fadeOut();
                $('#resume-timer2').fadeOut();
                hasStarted2 = true;
                interval2 = setInterval(() => {
                    if (seconds2 < 59) {
                    seconds2++;
                    saveToDB2(seconds2,minutes2,hours2);
                    refreshClock2();
                }
            else if (seconds2 == 59) {
                    minutes2++;
                 
                    seconds2 = 0;
                    refreshClock2();
                }

                if (minutes2 == 60) {
                    hours2++;
                    minutes2 = 0;
                    seconds2 = 0;
                    refreshClock2();
                }

            }, 1000);
            }

            function refreshClock2() {
                $(s2).text(pad2(seconds2));
                $(m2).text(pad2(minutes2));
                if (hours2 < 0) {
                    $(s2).text('00');
                    $(m2).text('00');
                    $(h2).text('00');
                } else {
                    $(h2).text(pad2(hours2))
                }

                if (hours2 == 0 && minutes2 == 0 && seconds2 == 0 && hasStarted2 == true) {
                    hasEnded2 = true
                    alert('The Timer has Ended !')
                }
            }

            function clear2(intervalID2) {
                clearInterval(intervalID2)
            }
            
            function saveToDB2(sec,min,h) {
                    $.ajax({
                      url: 'saveToDB2.php',
                      type: 'POST',
                      data: { sec : sec,min :min,h:h },
                      success: function(output){
                      
                      }
                    });                    
            }
        })
        </script>"; ?>


    <?php echo "<script type='text/javascript'>
        $(document).ready(function(){
            const timer3 = $('#timer3');  ////////////
            const s3 = $(timer3).find('.seconds3');
            const m3 = $(timer3).find('.minutes3');
            const h3 = $(timer3).find('.hours3');

            var seconds3 = 0;
            var minutes3 = 0;
            var hours3 = 0;
            
            var interval3 = null;

            $('.input-wrapper').slideUp(350); 
            setTimeout(function(){
                $('#timer3').fadeIn(350);
                $('#resume-timer3').fadeIn(350)

            }, 350);

            $('button#stop-timer3').on('click', function() {
                pauseClock3()
            });

            $('button#reset-timer3').on('click', function() {
                restartClock3()
            });

            $('button#resume-timer3').on('click', function() {

                cronometer3();
            });

            function pad3(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }

            function restartClock3() {
                clear3(interval3);
                hasStarted3 = false;
                hasEnded3 = false;

                seconds3 = 0;
                minutes3 = 0;
                hours3 = 0;

                $(s3).text('00');
                $(m3).text('00');
                $(h3).text('00');
                
                saveToDB3(seconds3,minutes3,hours3);

                $(timer3).find('span').removeClass('red')
            }

            function pauseClock3() {
                clear3(interval3);
                $('#resume-timer3').fadeIn();
                $('#reset-timer3').fadeIn();
            }

            function cronometer3() {
                $('#stop-timer3').fadeIn();
                $('#reset-timer3').fadeOut();
                $('#resume-timer3').fadeOut();
                hasStarted3 = true;
                interval3 = setInterval(() => {
                    if (seconds3 < 59) {
                    seconds3++;
                    saveToDB3(seconds3,minutes3,hours3);
                    refreshClock3();
                }
            else if (seconds3 == 59) {
                    minutes3++;
                 
                    seconds3 = 0;
                    refreshClock3();
                }

                if (minutes3 == 60) {
                    hours3++;
                    minutes3 = 0;
                    seconds3 = 0;
                    refreshClock3();
                }

            }, 1000);
            }

            function refreshClock3() {
                $(s3).text(pad3(seconds3));
                $(m3).text(pad3(minutes3));
                if (hours3 < 0) {
                    $(s3).text('00');
                    $(m3).text('00');
                    $(h3).text('00');
                } else {
                    $(h3).text(pad3(hours3))
                }

                if (hours3 == 0 && minutes3 == 0 && seconds3 == 0 && hasStarted3 == true) {
                    hasEnded3 = true
                    alert('The Timer has Ended !')
                }
            }

            function clear3(intervalID3) {
                clearInterval(intervalID3)
            }
            
            function saveToDB3(sec,min,h) {
                    $.ajax({
                      url: 'saveToDB3.php',
                      type: 'POST',
                      data: { sec : sec,min :min,h:h },
                      success: function(output){
                      
                      }
                    });                    
            }
        })
        </script>"; ?>

    <?php echo "<script type='text/javascript'>
        $(document).ready(function(){
            const timer4 = $('#timer4');  ////////////
            const s4 = $(timer4).find('.seconds4');
            const m4 = $(timer4).find('.minutes4');
            const h4 = $(timer4).find('.hours4');

            var seconds4 = 0;
            var minutes4 = 0;
            var hours4 = 0;
            
            var interval4 = null;

            $('.input-wrapper').slideUp(350); 
            setTimeout(function(){
                $('#timer4').fadeIn(350);
                $('#resume-timer4').fadeIn(350)

            }, 350);

            $('button#stop-timer4').on('click', function() {
                pauseClock4()
            });

            $('button#reset-timer4').on('click', function() {
                restartClock4()
            });

            $('button#resume-timer4').on('click', function() {

                cronometer4();
            });

            function pad4(d) {
                return (d < 10) ? '0' + d.toString() : d.toString()
            }

            function restartClock4() {
                clear4(interval4);
                hasStarted4 = false;
                hasEnded4 = false;

                seconds4 = 0;
                minutes4 = 0;
                hours4 = 0;

                $(s4).text('00');
                $(m4).text('00');
                $(h4).text('00');
                
                saveToDB4(seconds4,minutes4,hours4);

                $(timer4).find('span').removeClass('red')
            }

            function pauseClock4() {
                clear4(interval4);
                $('#resume-timer4').fadeIn();
                $('#reset-timer4').fadeIn();
            }

            function cronometer4() {
                $('#stop-timer4').fadeIn();
                $('#reset-timer4').fadeOut();
                $('#resume-timer4').fadeOut();
                hasStarted4 = true;
                interval4 = setInterval(() => {
                    if (seconds4 < 59) {
                    seconds4++;
                    saveToDB4(seconds4,minutes4,hours4);
                    refreshClock4();
                }
            else if (seconds4 == 59) {
                    minutes4++;
                 
                    seconds4 = 0;
                    refreshClock4();
                }

                if (minutes4 == 60) {
                    hours4++;
                    minutes4 = 0;
                    seconds4 = 0;
                    refreshClock4();
                }

            }, 1000);
            }

            function refreshClock4() {
                $(s4).text(pad4(seconds4));
                $(m4).text(pad4(minutes4));
                if (hours4 < 0) {
                    $(s4).text('00');
                    $(m4).text('00');
                    $(h4).text('00');
                } else {
                    $(h4).text(pad4(hours4))
                }

                if (hours4 == 0 && minutes4 == 0 && seconds4 == 0 && hasStarted4 == true) {
                    hasEnded4 = true
                    alert('The Timer has Ended !')
                }
            }

            function clear4(intervalID4) {
                clearInterval(intervalID4)
            }
            
            function saveToDB4(sec,min,h) {
                    $.ajax({
                      url: 'saveToDB4.php',
                      type: 'POST',
                      data: { sec : sec,min :min,h:h },
                      success: function(output){
                      
                      }
                    });                    
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

            <h1>Débat avec les candidats à la direction <span>(Admin)</span></h1>
            <p>Ne jamais raffraichir cette page une fois les timers lancés</p>
        </div>
    </div>
</header> <!-- /header -->


<!-- main content
================================================== -->
<main>

    <div class="row">
        <div class="block-1-3 block-s-1-2 block-mob-full">
            <div class="image-part">
                <div class="demo-title">
                    <h3>Mme Marie-Christine BAIETTO</h3>
                </div>
                <section class="clock">
                    <div class="container">
                        <div class="row">
                            <div id="timer" class="col-12">
                                <div class="clock-wrapper">
                                    <span class="hours">00</span>
                                    <span class="dots">:</span>
                                    <span class="minutes">00</span>
                                    <span class="dots">:</span>
                                    <span class="seconds">00</span>
                                </div>
                            </div>
                            <div class="buttons-wrapper">
                                <button class="btn" id="resume-timer">Resume Timer</button>
                                <button class="btn" id="stop-timer">Stop Timer</button>
                                <button class="btn" id="reset-timer">Reset Timer</button>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="demo-title">
                    <h3>M. Frédéric FOTIADU</h3>
                </div>

                <section class="clock">
                    <div class="container">
                        <div class="row">
                            <div id="timer2" class="col-12">
                                <div class="clock-wrapper">
                                    <span class="hours2">00</span>
                                    <span class="dots">:</span>
                                    <span class="minutes2">00</span>
                                    <span class="dots">:</span>
                                    <span class="seconds2">00</span>
                                </div>
                            </div>
                            <div class="buttons-wrapper">
                                <button class="btn" id="resume-timer2">Resume Timer</button>
                                <button class="btn" id="stop-timer2">Stop Timer</button>
                                <button class="btn" id="reset-timer2">Reset Timer</button>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="demo-title">
                    <h3>M. Philippe JAMET</h3>
                </div>
                <section class="clock">
                    <div class="container">
                        <div class="row">
                            <div id="timer3" class="col-12">
                                <div class="clock-wrapper">
                                    <span class="hours3">00</span>
                                    <span class="dots">:</span>
                                    <span class="minutes3">00</span>
                                    <span class="dots">:</span>
                                    <span class="seconds3">00</span>
                                </div>
                            </div>
                            <div class="buttons-wrapper">
                                <button class="btn" id="resume-timer3">Resume Timer</button>
                                <button class="btn" id="stop-timer3">Stop Timer</button>
                                <button class="btn" id="reset-timer3">Reset Timer</button>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="demo-title">
                    <h3>M. Vincent MAGNON</h3>
                </div>
                <section class="clock">
                    <div class="container">
                        <div class="row">
                            <div id="timer4" class="col-12">
                                <div class="clock-wrapper">
                                    <span class="hours4">00</span>
                                    <span class="dots">:</span>
                                    <span class="minutes4">00</span>
                                    <span class="dots">:</span>
                                    <span class="seconds4">00</span>
                                </div>
                            </div>
                            <div class="buttons-wrapper">
                                <button class="btn" id="resume-timer4">Resume Timer</button>
                                <button class="btn" id="stop-timer4">Stop Timer</button>
                                <button class="btn" id="reset-timer4">Reset Timer</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main> <!-- /main -->

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script
================================================== -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>