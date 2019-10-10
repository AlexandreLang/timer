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
                      url: 'getDB4.php',
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
            
            
            var seconds = 0;
            var minutes = 0;
            var hours = 0;
            
            var interval = null;

            function pad(d) {
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

            <h1>M. Vincent <span>MAGNON</span></h1>

        </div>
    </div>
</header> <!-- /header -->


<!-- main content
================================================== -->
<main>

    <div class="row">
        <div class="block-1-3 block-s-1-2 block-mob-full">
            <div class="image-part">
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