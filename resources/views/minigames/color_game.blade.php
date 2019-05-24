<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Color Game</title>
    <link rel="stylesheet" type="text/css" href="colorGame.css">
    <link href="/assets/css/all.css" rel="stylesheet"/>
  </head>
  <body>
    <h1>The Great
      <br>
      <span id="colorDisplay">RGB</span>
      <br>
      Color Game
    </h1>
    <div id="stripe">
      <button id="reset">New Colors</button>
      <span id="message"></span>
      <button class="mode">Easy</button>
      <button class="mode selected">Hard</button>
      <button class="mode">Very Hard</button>
    </div>
    <div id="container">
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
      <div class="square"></div>
    </div>
    <div class="copyright-game pull-right">
        &copy; 2018 - <script>
            document.write(new Date().getFullYear())
        </script>, made with <i class="fa fa-heart heart"></i> by Syahrin Seth v1.0.2
    </div>
  <script type="text/javascript" src="colorGame.js"></script>
  </body>
</html>
