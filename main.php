<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mailing</title>
  <link rel="stylesheet" type="text/css" href="./styles/main.css">
</head>
<body>
<nav></nav>
<header>
  <h1>Welcome and have a nice day :)</h1>
  <img id="background" src="./imgs/background.jpg" alt="background">
  <form action="./php/files/signup.php" method="post">
    <fieldset>
      <legend>Registration</legend>
      <div>
        <label for="fullName">Your full name</label>
        <input id="fullName" type="text" name="fullName" minlength="5" required>
      </div>
      <div>
        <label for="email">Your email</label>
        <input id="email" type="email" name="email" minlength="5" required>
      </div>
      <div>
        <label for="age">Your age</label>
        <input id="age" type="number" name="age" required>
      </div>
      <div>
        <label for="fullName">Password</label>
        <input id="fullName" type="password" name="fullName" minlength="5" required>
      </div>
      <div>
        <label for="fullName">Repeat your password</label>
        <input id="fullName" type="password" name="fullName" minlength="5" required>
      </div>
      <div class="form-buttons">
        <button type="submit">Sign up</button>
        <button type="reset">Clear form</button>
      </div>
    </fieldset>
    <p>Already have an account? <a href="#">Sign in</a></p>
  </form>
</header>
</body>
</html>