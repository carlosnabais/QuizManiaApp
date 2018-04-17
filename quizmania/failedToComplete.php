<!DOCTYPE html>
<html>
<head>
    <title>QuizMania</title>
    <link rel="stylesheet" type="text/css" href="newStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript" src="scripts/timer.js"></script>
</head>
<body onload="countdown()">
  <section class="hero is-fullheight gradient-background">
    <?php
      include_once 'header.php';
    ?>
    <div class="hero-body">
      <div class="container">
      <p class='title has-text-white is-size-2 has-text-centered is-spaced'>Anyone there?</p>
      <p class='subtitle has-text-white is-size-3 has-text-centered is-spaced'>
        You failed to submit your quiz.<br/><span class='icon is-large has-text-white'><i class='fas fa-lg fa-frown'></i></span>
      </p>
      <div class='field'>
        <div class='control has-text-centered'>
          <a class='button is-primary is-rounded' href='index.php'>Take me to the quizzes</a>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>
</html>
