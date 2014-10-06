<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
    <h1>Mailchimp multi-form poster</h1>
    <form action="spawn.php" method="POST">
      <input type="text" name="url" class="url" value="http://facebook.us6.list-manage.com/subscribe/post"> <br />
      <textarea name="emails" class="emails" placeholder="Emails"></textarea> <br />
      <input type="submit" class="btn btn-primary" value="Submit">
    </form>
  </body>
</html>