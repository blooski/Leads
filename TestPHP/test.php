<?php
  // testing sessions
  // check to see if files are being created
  // in the session.save_path folder
  session_start();
?>
<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <p>
      The browser you're using is 
      <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
    </p>
    <p>
      <!-- test the browscap setup -->
      Your browser's capabilities are: <br/>
      <pre>
        <?php print_r(get_browser(null, true)); ?>
      </pre>
    </p>
    <?php phpinfo(); ?>
  </body>
</html>

 