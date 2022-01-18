<?php 
include 'data.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="css/jquery.simplegauge.css" type="text/css" rel="stylesheet">
    <script src="assets/demo/jquery.min.js"></script>
        <script src="assets/demo/jquery.js"></script>
<script src="https://code.jquery.com/jquery-latest.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/demo/jquery.simplegauge.js" type="text/javascript"></script>
<style>
@font-face {
    font-family: 'Digital Dream Skew Narrow';
    src: URL('assets/digital-dream.skew-narrow.ttf') format('truetype');
}

#demoGauge2 { width:  20em; height: 20em; }
</style>

</head>
<body>
<div id="demoGauge2"></div>

<script>
$(document).ready(function() {
  $('#demoGauge2').simpleGauge({
    value:  <?php echo $d1 ;?>,
    min:    0,
    max:    7,

    type:   'analog digital', // enable one or the other, or both
    container: {
      scale:  100,            // scale of gauge, in percent
      style:  'background: #ddd; background: linear-gradient(335deg, #ddd 0%, #fff 30%, #fff 50%, #bbb 100%); border-radius: 1000px; border: 5px solid #bbb;'
    },
    title: {
      text:   'RPM x 1000',
      style:  'color: #555; font-size: 20px; padding: 10px;'
    },
    digital: {
      text:   '{value.3}', // value with number of decimals
      style:  'color: auto; font-size: 35px;'
    },
    analog: {
      minAngle:   -150,
      maxAngle:   150
    },
    labels: {
      text:   '{value}',
      count:  7,
      scale:  73,
      style:  'font-size: 20px;'
    },
    ticks: {
      count:  14,
      scale1: 84,
      scale2: 93,
      style:  'width: 2px; color: #999;'
    },
    subTicks: {
      count:  5,
      scale1: 93,
      scale2: 96,
      style:  'width: 1px; color: #bbb;'
    },
    bars: {
      scale1: 88,
      scale2: 94,
      style:  '',
      colors: [
        [ 0,   '#666666', 91, 92 ],
        [ 1.0, '#378618', 0, 0 ],
        [ 5.0, '#ffa500', 0, 0 ],
        [ 6.5, '#dd2222', 0, 0 ]
      ]
    },
    pointer: {
      scale: 95,
      //shape: '2,100 -2,100 ...', // x,y coordinates for custom shape
      style: 'color: #ee0; opacity: 0.5; filter: drop-shadow(-3px 3px 2px rgba(0, 0, 0, .7));'
    }
  });
});
</script>


<!-- animation demo -->
<button id="runAnimation">Start Animation</button>
<script>
$(document).ready(function() {
  let runAnimation = false;
  let gaugeTimerId;
  let gaugeTimerCount;
  $(document).on('click', '#runAnimation', function() {
    runAnimation = runAnimation ? false : true;
    if(gaugeTimerId) {
      clearTimeout(gaugeTimerId);
    }
    if(runAnimation) {
      $('#runAnimation').text('Stop Animation');
      gaugeTimerCount = 0;
      gaugeTimerId = setInterval(function() {
        let value = 100 * $('#demoGauge2').simpleGauge('getValue');
        if(gaugeTimerCount > 0) {
          value -= Math.random() * 5;
          gaugeTimerCount--;
        } else if(gaugeTimerCount < 0) {
          value += Math.random() * 5;
          gaugeTimerCount++;
        } else {
          gaugeTimerCount = Math.round((Math.random() - 0.5) * 100);
        }
        if (value < 50) {
          value = 50;
          gaugeTimerCount = 0;
        } else if (value > 700) {
          value = 700;
          gaugeTimerCount = 0;
        }
        $('#demoGauge2').simpleGauge('setValue', value / 100);
      }, 250);
    } else {
      $('#runAnimation').text('Start Animation');
    }
  });
});
</script>
    
</body>
</html>