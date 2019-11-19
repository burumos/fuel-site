<html>
  <head>
    <title>TOP</title>
  </head>
  <body>
    <h1>TOP</h1>
    <?php if (isset($username)) { ?>
      <div>
        username: <?php echo $username ?>
      </div>
      <div>
        <a href="/logout">LOGOUT</a>
      </div>
    <?php } else { ?>
      <div>
        <a href="/login">LOGIN</a>
      </div>
      <div>
        <a href="/signin">SIGNIN</a>
      </div>
    <?php } ?>
  </body>
</html>
