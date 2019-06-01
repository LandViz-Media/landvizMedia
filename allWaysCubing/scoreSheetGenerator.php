<?php
//print "hello";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=" UTF-8">
    <title>Speed Cube Score Sheet Generator</title>

    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>



    <style>
        body {
            box-sizing: border-box;
        }


        .siteTitle {
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
        }

        #scoreSheet {
            font-family: sans-serif;
            font-size: .9em;
            clear: both;
        }

        .displayName {
            width: 80px;
            float: left;
        }

        .displayName input {
            width: 85%
        }

        .fullName {
            width: 100px;
            float: left;
        }


        .fullName input {
            width: 85%
        }

        .time1 {
            width: 70px;
        }

        .newRow {
            clear: both;
            box-sizing: border-box;
            height: 30px;
            padding-left: 0px;
            padding-right: 10px;
        }

        .columns {
            float: left;
            width: 70px;
            text-align: center;
        }

        .columns input {
            width: 75%;
        }

        #rowFooter {
            clear: both;
            height: 25px;
            background-color: palegreen;

            border-top: 3px solid green;
            text-align: center;
            padding-top: 3px;
        }

        #result {
            font-style: italic;
        }

        #rowHeader {
            font-weight: 400;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            height:36px;
        }

        #rowHeader .columns {
            text-align: center;
        }

        .test {
            text-align: center;
            color: red;
        }

        #TournamentSetup {
            text-align: center;
            background-color: lightgrey;
            border: 1px solid grey;
            width: 100%;
        }

        #TournamentSetup h4 {
            margin-top: 2px;
            margin-bottom: 8px;
        }


        .setupWells {
            text-align: left;
            float: left;
            width: 31%;
            padding: 5px;
        }

        .genSheet {
            background-color: grey;
            clear: both;
        }

    </style>


</head>

<body>
    <h2 class="siteTitle">CWF Tournament Score Sheet Generator</h2>
    <h5 class="siteTitle">by <a href="https://www.AllWaysCubing.com" target="_blank">AllWays Cubing</a> &copy;2019</h5>

    <br><br>
    <div id="TournamentSetup">
        <h4>Tournament Setup</h4>
        <div class="setupWells">
            Title: <input type="text" name="tournamentTitle" value="End of School"> <br>
            Date: <input type="text" name="tournamentDate" value="5/31/19"> <br>
            Location: <input type="text" name="tournamentLocation" value="Ogden, Iowa 50212">
        </div>

        <div class="setupWells">
            Event Type: <select id="dropDownEvents" name="eventType"> </select><br>
            Event Round: <select name="eventRound">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="Quarter">Quarter</option>
                <option value="Quarter">Semi</option>
                <option value="Quarter">Final</option>
            </select> <br>
            Event Participants: <input type="text" id="eventParticipants" name="eventParticipants" size=3 value="3">
            <br>
        </div>
        <div class="setupWells">
            Top Avg 3: <br>
            Best solve: <br>
             Top Avg 5: <br>
        </div>

        <div class="genSheet">
            <input type="submit" value="Submit" id="genSheetBTN">
        </div>
    </div>

    <br><br><br>

    <div id="scoreSheet">
        <div id="rowHeader">&nbsp;
            <div class="displayName"><br>dName</div>
            <div class="fullName"><br>Name</div>
            <div class="columns"><br>Time 1</div>
            <div class="columns"><br>Time 2</div>
            <div class="columns"><br>Time 3</div>
            <div class="columns"><br>Time 4</div>
            <div class="columns"><br>Time 5</div>
            <div class="columns">Current<br>Average</div>
            <div class="columns">Average<br>of 3</div>
        </div>


    </div>




    <div id="rowFooter">
        <em>version 0.01 - updated May 30, 2019</em>
    </div>

    </div>

    <br><br>
    <div id="result">---</div>
    <input type="submit" value="Submit" id="testBTN">





    <script>
        $(document).ready(function() {

            var eventNames = new Array(
                ['333', "3×3 Cube"],
                ['333x1', "3×3 Cube one-side"],
                ['222', '2×2 Cube'],
                ['444', '4×4 Cube'],
                ['555', '5×5 Cube'],
                ['666', '6×6 Cube'],
                ['777', '7×7 Cube'],
                ['333bf', '3×3 Blindfolded'],
                ['333oh', '3×3 One-Handed'],
                ['333ft', '3×3 With Feet'],
                ['minx', 'Megaminx'],
                ['pyram', 'Pyraminx'],
                ['skewb', 'Skewb'],
                ['clock', 'Clock'],
                ['sq1', 'Square-1'],
                ['444bf', '4×4 Blindfolded'],
                ['555bf', '5×5 Blindfolded'])

            for (i = 0; i < eventNames.length; i++) {
                $("#dropDownEvents").append("<option>" + eventNames[i][1] + "</option>");
            }

            //turn of autocomplete
            $('input').attr('autocomplete', 'off');


            var eventParticipants = 0;
            $("#genSheetBTN").click(function() {
                var eventParticipants = $("#eventParticipants").val();
                for (i = 0; i < eventParticipants; i++) {
                    $("#scoreSheet").append('<div id="row1" class="newRow">' +
                        '<div class="displayName"><input type="text" name="uID" value="display"></div>' +
                        '<div class="fullName"><input type="text" name="uName" value="lname, fname"></div>' +
                        '<div class="time1 columns"><input type="text" name="utime1" placeholder="0:00.00"></div>' +
                        '<div class="time2 columns"><input type="text" name="utime2" placeholder="0:00.00"></div>' +
                        '<div class="time3 columns"><input type="text" name="utime3" placeholder="0:00.00"></div>' +
                        '<div class="time4 columns"><input type="text" name="utime4" placeholder="0:00.00"></div>' +
                        '<div class="time5 columns"><input type="text" name="utime5" placeholder="0:00.00"></div>' +
                        '<div class="timeAvg columns"></div>' +
                        '<div class="timeAvg3 columns"></div>' +
                        '</div>');
                }
            }); //end adding rows to table


            /*
            
            <div id="row1" class="newRow">
            <div class="displayName"><input type="text" name="uID" value="SRS123"></div>
            <div class="fullName"><input type="text" name="uName" value="Seeger, Sage"></div>
            <div class="time1 columns"><input type="text" name="utime1" placeholder="0:00.00"></div>
            <div class="time2 columns"><input type="text" name="utime2" placeholder="0:00.00"></div>
            <div class="time3 columns"><input type="text" name="utime3" placeholder="0:00.00"></div>
            <div class="time4 columns"><input type="text" name="utime4" placeholder="0:00.00"></div>
            <div class="time5 columns"><input type="text" name="utime5" placeholder="0:00.00"></div>
            <div class="timeAvg columns" id="utimeAvg"></div>
            <div class="timeAvg3 columns" id="utimeAvg3"></div>
        </div>
            
            
            */

            //calculate averages etc.
            $("#testBTN").click(function() {
                eventParticipants = $("#eventParticipants").val();
                eventParticipants = parseInt(eventParticipants) + 2;
                for (i = 2; i < eventParticipants; i++) {

                    console.log(eventParticipants);

                    //var i = 2;
                    displayName = $("#scoreSheet div:nth-child(" + i + ") div:nth-child(1) input ").val();
                    fullName = $("#scoreSheet div:nth-child(" + i + ") div:nth-child(2) input ").val();
                    time1 = String($("#scoreSheet div:nth-child(" + i + ") div:nth-child(3) input ").val());
                    time2 = String($("#scoreSheet div:nth-child(" + i + ") div:nth-child(4) input ").val());
                    time3 = String($("#scoreSheet div:nth-child(" + i + ") div:nth-child(5) input ").val());
                    time4 = String($("#scoreSheet div:nth-child(" + i + ") div:nth-child(6) input ").val());
                    time5 = String($("#scoreSheet div:nth-child(" + i + ") div:nth-child(7) input").val());

                    time1Array = time1.split(":");
                    time2Array = time2.split(":");
                    time3Array = time3.split(":");
                    time4Array = time4.split(":");
                    time5Array = time5.split(":");

                    time1s = (parseInt(time1Array[0]) * 60) + parseFloat(time1Array[1]);
                    time2s = (parseInt(time2Array[0]) * 60) + parseFloat(time2Array[1]);
                    time3s = (parseInt(time3Array[0]) * 60) + parseFloat(time3Array[1]);
                    time4s = (parseInt(time4Array[0]) * 60) + parseFloat(time4Array[1]);
                    time5s = (parseInt(time5Array[0]) * 60) + parseFloat(time5Array[1]);

                    timeArray = []; //resets timeArray for second row.
                    attempts = 0;
                    totalTimeSec = 0;
                    if (time1s > 0) {
                        totalTimeSec += time1s;
                        attempts = attempts + 1;
                        timeArray.push(time1s);
                    }
                    if (time2s > 0) {
                        totalTimeSec += time2s;
                        attempts = attempts + 1;
                        timeArray.push(time2s);
                    }
                    if (time3s > 0) {
                        totalTimeSec += time3s;
                        attempts = attempts + 1;
                        timeArray.push(time3s);
                    }
                    if (time4s > 0) {
                        totalTimeSec += time4s;
                        attempts = attempts + 1;
                        timeArray.push(time4s);
                    }
                    if (time5s > 0) {
                        totalTimeSec += time5s;
                        attempts = attempts + 1;
                        timeArray.push(time5s);
                    }

                    //console.log("attempts: "+attempts);
                    console.log("timeArray: " + timeArray);

                    totalAvgTime = totalTimeSec / attempts; //in seconds

                    totalAvgTimeMin = parseInt(totalAvgTime / 60); //just the minutes without seconds
                    totalAvgTimeSec = parseFloat(totalAvgTime % 60).toFixed(2); //just the seconds without minutes


                    if (totalAvgTimeSec < 10) {
                        totalAvgTimeSec = "0" + totalAvgTimeSec;
                    }

                    $("#scoreSheet div:nth-child(" + i + ") div:nth-child(8)").html(totalAvgTimeMin + ":" + totalAvgTimeSec);
                    //$("#utimeAvg").html(totalAvgTimeMin + ":" + totalAvgTimeSec);


                    
                    //reset background colors for min/max
                    for (j = 0; j < 9; j++) {
                       $("#scoreSheet div:nth-child(" + i + ") div:nth-child(" + j + ")").css('background','white')
                    }

                    max = Math.max.apply(null, timeArray);
                    min = Math.min.apply(null, timeArray);

                    aMax = timeArray.indexOf(Math.max.apply(null, timeArray));
                    aMin = timeArray.indexOf(Math.min.apply(null, timeArray));
                     // console.log("Min index:" + aMin + " and Max index: " + aMax);
                    aMin =  aMin + 3;
                    aMax =  aMax + 3;
                    $("#scoreSheet div:nth-child(" + i + ") div:nth-child(" + aMin + ")").css('background','#FF0000')
                    $("#scoreSheet div:nth-child(" + i + ") div:nth-child(" + aMax + ")").css('background','#FF0000')
                  





                    if (attempts == 5) {
                        totalAvg3Time = (totalTimeSec - max - min) / 3;

                        totalAvg3TimeMin = parseInt(totalAvg3Time / 60); //just the minutes without seconds
                        totalAvg3TimeSec = parseFloat(totalAvg3Time % 60).toFixed(2); //just the seconds without minutes

                        if (totalAvg3TimeSec < 10) {
                            totalAvg3TimeSec = "0" + totalAvg3TimeSec;
                        }

                        $("#scoreSheet div:nth-child(" + i + ") div:nth-child(9)").html(totalAvg3TimeMin + ":" + totalAvg3TimeSec);
                    }

                    //$("#result").html("Min: " + min + "<br>Max: " + max);


                } //end if loop updating scores
            })





        });

    </script>



</body>

</html>
