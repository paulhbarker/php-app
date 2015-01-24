<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Survey</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/survey.css">
</head>

<body>
  <div class='container'>
    <div class='row text-center'>
      <div class='col-sm-12'>
        <h1 class='survey-title'>Survey</h1>
      </div>
    </div>
    <div class='row'>
      <div class='col-sm-12'>
        <form class='survey-form ac-fill' id='myform' action='index.php' method="post">
          <div class='text-center'>
            <button class='btn btn-default' type='submit' name='action' value='results'>See Results</button>
          </div>
          <h2>Would you rather have a superpower of your choosing or have two random superpowers?</h2>
          <ul>
              <li><input id="q11" name="q1" value="q11" type="radio"><label for="q11">Superpower of my choosing</label></li>
              <li><input id="q12" name="q1" value="q12" type="radio"><label for="q12">Two random superpowers</label></li>
          </ul>
          <h2>Would you rather be able to teleport or have the ability to fly?</h2>
          <ul>
              <li><input id="q21" name="q2" value="q21" type="radio"><label for="q21">Teleportation</label></li>
              <li><input id="q22" name="q2" value="q22" type="radio"><label for="q22">Ability to fly</label></li>
          </ul>
          <h2>Would you rather have the ability to manipulate water or fire?</h2>
          <ul>
              <li><input id="q31" name="q3" value="q31" type="radio"><label for="q31">Water</label></li>
              <li><input id="q32" name="q3" value="q32" type="radio"><label for="q32">Fire</label></li>
          </ul>
          <h2>Would you rather have the ability to shapeshift or manipulate time?</h2>
          <ul>
              <li><input id="q41" name="q4" value="q41" type="radio"><label for="q41">Shapeshift</label></li>
              <li><input id="q42" name="q4" value="q42" type="radio"><label for="q42">Manipulate time</label></li>
          </ul>
          <h2>Would you rather be able to read minds or be able to see the future?</h2>
          <ul>
              <li><input id="q51" name="q5" value="q51" type="radio"><label for="q51">Read minds</label></li>
              <li><input id="q52" name="q5" value="q52" type="radio"><label for="q52">See the future</label></li>
          </ul>
          <h2>Would you rather be telepathic or psychokinetic?</h2>
          <ul>
              <li><input id="q61" name="q6" value="q61" type="radio"><label for="q61">Telepathy</label></li>
              <li><input id="q62" name="q6" value="q62" type="radio"><label for="q62">Psychokinesis</label></li>
          </ul>
          <h2>Would you rather be have super speed or super strength?</h2>
          <ul>
              <li><input id="q71" name="q7" value="q71" type="radio"><label for="q71">Super speed</label></li>
              <li><input id="q72" name="q7" value="q72" type="radio"><label for="q72">Super strength</label></li>
          </ul>
          <h2>Would you rather have supersonic vision or supersonic hearing?</h2>
          <ul>
              <li><input id="q81" name="q8" value="q81" type="radio"><label for="q81">Supersonic vision</label></li>
              <li><input id="q82" name="q8" value="q82" type="radio"><label for="q82">Supersonic hearing</label></li>
          </ul>
          <h2>Would you rather be omniscient or omnipotent?</h2>
          <ul>
              <li><input id="q91" name="q9" value="q91" type="radio"><label for="q91">Omiscient</label></li>
              <li><input id="q92" name="q9" value="q92" type="radio"><label for="q92">Omnipotent</label></li>
          </ul>
          <h2>Would you rather be the only person in the world with pokemon or the only person in the world with superpowers?</h2>
          <ul>
              <li><input id="q101" name="q10" value="q101" type="radio"><label for="q101">Only person in the world with pokemon</label></li>
              <li><input id="q102" name="q10" value="q102" type="radio"><label for="q102">Only person in the world with superpowers</label></li>
          </ul>
          <div class='text-center'>
            <input class='btn btn-default btn-lg' type='submit' name='action' value='Submit'>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>