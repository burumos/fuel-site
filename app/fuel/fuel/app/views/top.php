<html>
  <head>
    <title>TOP</title>
  </head>
  <body>
    <h1>TOP</h1>
    <?php if (isset($message)) { ?>
      <div><?php echo $message; ?></div>
    <?php } ?>
    <?php if (isset($username)) { ?>
      <div>
        username: <?php echo $username ?>
      </div>
      <div>
        <a href="<?php echo Router::get('logout'); ?>">LOGOUT</a>
      </div>
      <?php if (isset($session)) var_dump($session); ?>
    <?php } else { ?>
      <div>
        <a href="<?php echo Router::get('login'); ?>">LOGIN</a>
      </div>
      <div>
        <a href="<?php echo Router::get('signin'); ?>">SIGNIN</a>
      </div>
    <?php } ?>
  </body>
</html>
