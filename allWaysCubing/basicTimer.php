<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>A Cube Timer</title>

    <script src="https://code.jquery.com/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <style>
        body {
            margin: 0px;
        }
    </style>

</head>

<body>
    <h3>Cubing Timer</h3>
    This is a timer or stopwatch. Press the spacebar or buttons to start and stop.<br><br>

    <div id="timeContainer" class="well well-sm">
        <time id="timerValue"></time>
    </div>

    <div id="timerButtons">
        <button id="start" class="btn btn-success">START</button>
        <button id="stop" class="btn btn-danger">STOP</button>
        <br><br>
        <button id="reset" class="btn btn-default">RESET</button>
        <button id="record" class="btn btn-default">RECORD</button>
    </div>

    <div id="timer">
    </div>


</body>

</html>

<script>
    /*

setInterval(updateDisplay, 1); // every millisecond call updateDisplay

function updateDisplay() {
    var value = parseInt($('#timer').find('.value').text(), 10);
    value++;
    $('#timer').find('.value').text(value);
}

updateDisplay();

*/


    $(document).ready(function() {
        console.clear();
        $("#stop").hide();

        var dStart, dStop = "";



        $("#start").click(function() {

            dStart = new Date(); // now
            //console.log(dStart);
            h = dStart.getHours();
            m = dStart.getMinutes();
            s = parseInt(dStart.getSeconds());
            ms = dStart.getMilliseconds();

            $("#timer").html("");
            $("#timer").append("Start " + h + ":" + m + ":" + s + ":" + ms);
            $("#timer").append("<br>");
            
            $("#stop").show();
            $("#start").hide();
            $("#reset").hide();
            $("#record").hide();

        })

        $("#stop").click(function() {

            dStop = new Date(); // now
            
             $("#start").show();
            $("#reset").show();
             $("#record").show();
             $("#stop").hide();
            
            //console.log(dStart);
            h = dStop.getHours();
            m = dStop.getMinutes();
            s = parseInt(dStop.getSeconds());
            ms = dStop.getMilliseconds();


            $("#timer").append("Stop " + h + ":" + m + ":" + s + ":" + ms);
            $("#timer").append("<br><br>");


            var difference = dStop - dStart;

            var secondsDifference = Math.floor(difference / 1000);
            var msecondsDifference = difference.toString().slice(-3);


            //var daysDifference = Math.floor(difference/1000/60/60/24);
            //difference -= daysDifference*1000*60*60*24

            //var hoursDifference = Math.floor(difference/1000/60/60);
            // difference -= hoursDifference*1000*60*60

            //var minutesDifference = Math.floor(difference/1000/60);
            //difference -= minutesDifference*1000*60





            //document.WRITE('difference = ' + daysDifference + ' day/s ' + hoursDifference + ' hour/s ' + minutesDifference + ' minute/s ' + secondsDifference + ' second/s ');   


            $("#timer").append("Difference in ms: " + difference + "<br><br>");



            $("#timer").append("Duration: " + secondsDifference + "." + msecondsDifference + " seconds");

        })



        $("#reset").click(function() {

            $("#timer").html("");
            
             $("#reset").hide();
             $("#record").hide();
            
        })





    });
</script>