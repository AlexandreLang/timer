$(document).ready(function(){
    const timer = $('#timer');
    const s = $(timer).find('.seconds');
    const m = $(timer).find('.minutes');
    const h = $(timer).find('.hours');

    var seconds = 0;
    var minutes = 0;
    var hours = 0;

    var interval = null;

    $('.input-wrapper').slideUp(350)
    setTimeout(function(){
        $('#timer').fadeIn(350)
        $('#resume-timer').fadeIn(350)

    }, 350)

    $('button#stop-timer').on('click', function() {
        pauseClock()
    })

    $('button#reset-timer').on('click', function() {
        restartClock()
    })

    $('button#resume-timer').on('click', function() {

        cronometer();
    })

    function pad(d) {
        return (d < 10) ? '0' + d.toString() : d.toString()
    }

    function restartClock() {
        clear(interval)
        hasStarted = false
        hasEnded = false

        seconds = 0
        minutes = 0
        hours = 0

        $(s).text('00')
        $(m).text('00')
        $(h).text('00')

        $(timer).find('span').removeClass('red')
    }

    function pauseClock() {
      clear(interval)
      $('#resume-timer').fadeIn()
      $('#reset-timer').fadeIn()
    }

    function cronometer() {
        console.log("2");
        $('#stop-timer').fadeIn();
        $('#reset-timer').fadeOut();
        $('#resume-timer').fadeOut();
        hasStarted = true
        interval = setInterval(() => {
            if (seconds < 59) {
                seconds++
                refreshClock()
            }
            else if (seconds == 59) {
                minutes++
                seconds = 0
                refreshClock()
            }

            if (minutes == 60) {
                hours++
                minutes = 0
                seconds = 0
                refreshClock()
            }

        }, 1000)
    }

    function refreshClock() {
        $(s).text(pad(seconds))
        $(m).text(pad(minutes))
        if (hours < 0) {
            $(s).text('00')
            $(m).text('00')
            $(h).text('00')
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
})
