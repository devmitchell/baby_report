<?php
  function workingOdds() {
    // http://whentoexpect.com/?due=10%2F13%2F2017&type=2&token=35
    $laborProbabilities = array(
      '09/19' => 0,
      '09/20' => 1,
      '09/21' => 1,
      '09/22' => 2,
      '09/23' => 3,
      '09/24' => 4,
      '09/25' => 5,
      '09/26' => 7,
      '09/27' => 8,
      '09/28' => 10,
      '09/29' => 12,
      '09/30' => 15,
      '10/01' => 18,
      '10/02' => 21,
      '10/03' => 25,
      '10/04' => 29,
      '10/05' => 34,
      '10/06' => 40,
      '10/07' => 46,
      '10/08' => 51,
      '10/09' => 56,
      '10/10' => 60,
      '10/11' => 64,
      '10/12' => 68,
      '10/13' => 72,
      '10/14' => 75,
      '10/15' => 79,
      '10/16' => 81,
      '10/17' => 84,
      '10/18' => 86,
      '10/19' => 89,
      '10/20' => 90,
      '10/21' => 92,
      '10/22' => 93,
    );
    
    date_default_timezone_set("America/Chicago");
    $today = date("m/d");
    return 100 - $laborProbabilities[$today];
  }
  
  function redToGreenScale($wholePercent) {
    if ($wholePercent > 50) {
      $hex = sprintf('%02X', 255 - round(255 * ($wholePercent - 50) / 50, 0));
      return "#" . $hex . "FF00";
    } elseif ($wholePercent == 50) {
      return "#FFFF00";
    } else {
      $hex = sprintf('%02X', round(255 * $wholePercent / 50, 0));
      return "#FF" . $hex . "00";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      <?php
        // background-color: #00FF00;
        echo "background-color: " . redToGreenScale(workingOdds()) . ";\n";
      ?>
    }
    h1 {
      font-size: 10em;
      text-align: center;
      margin: 10px;
    }
    p {
      font-size: 2em;
      text-align: center;
    }
  </style>
</head>
<body>
  <p>What Are the Odds Devin Comes in Today?</p>
  <?php
    // <h1>50%</h1>
    echo "<h1>" . workingOdds() . "%</h1>\n";
  ?>
</body>
</html>
