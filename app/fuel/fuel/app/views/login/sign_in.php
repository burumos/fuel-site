<html>
  <head>
    <title>sign_in</title>
  </head>
  <body>
    <h1>sign in page</h1>
    <div>
      <?php
      if ($messages) echo "<p>エラー</p>";
      foreach($messages as $mes) {
        echo '<p>'.$mes.'</p>';
      }
      ?>
    </div>
    <form method="post" action="/signin">
      <p>
        user name: <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>" />
      </p>
      <p>
        email: <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" />
      </p>
      <p>
        password: <input type="password" name="password" />
      </p>
      <input type="submit" name="submit" value="send" />
    </form>
  </body>
</html>
