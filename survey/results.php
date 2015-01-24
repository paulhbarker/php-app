<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Survey Results</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/survey.css">
</head>

<body>
  <div class='container'>
    <div class='row text-center'>
      <div class='col-sm-12'>
        <h1 class='survey-title'>Results</h1>
      </div>
    </div>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='results-form'>
          <h2>Would you rather have a superpower of your choosing or have two random superpowers?</h2>
          <ul>
              <li><span><?php printTotal('q11', $data) ?></span>Superpower of my choosing</li>
              <li><span><?php printTotal('q12', $data) ?></span>Two random superpowers</li>
          </ul>
          <h2>Would you rather be able to teleport or have the ability to fly?</h2>
          <ul>
              <li><span><?php printTotal('q21', $data) ?></span>Teleportation</li>
              <li><span><?php printTotal('q22', $data) ?></span>Ability to fly</li>
          </ul>
          <h2>Would you rather have the ability to manipulate water or fire?</h2>
          <ul>
              <li><span><?php printTotal('q31', $data) ?></span>Water</li>
              <li><span><?php printTotal('q32', $data) ?></span>Fire</li>
          </ul>
          <h2>Would you rather have the ability to shapeshift or manipulate time?</h2>
          <ul>
              <li><span><?php printTotal('q41', $data) ?></span>Shapeshift</li>
              <li><span><?php printTotal('q42', $data) ?></span>Manipulate time</li>
          </ul>
          <h2>Would you rather be able to read minds or be able to see the future?</h2>
          <ul>
              <li><span><?php printTotal('q51', $data) ?></span>Read minds</li>
              <li><span><?php printTotal('q52', $data) ?></span>See the future</li>
          </ul>
          <h2>Would you rather be telepathic or psychokinetic?</h2>
          <ul>
              <li><span><?php printTotal('q61', $data) ?></span>Telepathy</li>
              <li><span><?php printTotal('q62', $data) ?></span>Psychokinesis</li>
          </ul>
          <h2>Would you rather be have super speed or super strength?</h2>
          <ul>
              <li><span><?php printTotal('q71', $data) ?></span>Super speed</li>
              <li><span><?php printTotal('q72', $data) ?></span>Super strength</li>
          </ul>
          <h2>Would you rather have supersonic vision or supersonic hearing?</h2>
          <ul>
              <li><span><?php printTotal('q81', $data) ?></span>Supersonic vision</li>
              <li><span><?php printTotal('q82', $data) ?></span>Supersonic hearing</li>
          </ul>
          <h2>Would you rather be omniscient or omnipotent?</h2>
          <ul>
              <li><span><?php printTotal('q91', $data) ?></span>Omiscient</li>
              <li><span><?php printTotal('q92', $data) ?></span>Omnipotent</li>
          </ul>
          <h2>Would you rather be the only person in the world with pokemon or the only person in the world with superpowers?</h2>
          <ul>
              <li><span><?php printTotal('q101', $data) ?></span>Only person in the world with pokemon</li>
              <li><span><?php printTotal('q102', $data) ?></span>Only person in the world with superpowers</li>
          </ul>
          <p class='survey-total'>This survey has been taken <?php printTotal('Submit', $data) ?> time(s);
        </div>
      </div>
    </div>
  </div>

</body>
</html>