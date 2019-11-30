<html>
  <head>
    <title>NICO</title>
  </head>
  <body>
    <h1>NICO</h1>
    <div><a href="<?php echo Router::get('top'); ?>">TOP</a></div>

    <div id="root"></div>
    <script id="script" type="text/javascript" src="js/nico/index.js" data-mylists='<?php echo json_encode($mylists); ?>'></script>
  </body>
</html>
