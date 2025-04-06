<?php
if(isset($_GET['step']) === true && empty($_GET['step']) === false){
include '../core/init.php';
if (isset($_SESSION['user_id']) === false) {
  header('Location: ../index.php');
}

$user_id = $_SESSION['user_id'];
$user = $getFromU->userData($user_id);
$step = $_GET['step'];

if(isset($_POST['next'])){
  $username = $getFromU->checkInput($_POST['username']);

  if (!empty($username)) {
    if(strlen($username) > 20){
      $error = "Username must be between 6-20 characters.";
    }else if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)){
      $error = 'Username must be at least 6 characters long and contain only letters and numbers.';
    } else if($getFromU->checkUsername($username) === true){
      $error = "This username is already taken!";
    }else{
      $getFromU->update('users', $user_id, array('username' => $username));
      header('Location: signup.php?step=2');
    }
  }else{
    $error = "Please enter a username to continue.";
  }
}
?>
<!doctype html>
<html>
  <head>
    <title>linktinger</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="../assets/css/style-complete.css"/>
    <link rel="stylesheet" href="../assets/css/font-awesome.css"/>
    <style>
      .btn-custom {
        background-color: #271f81;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
      }
      .btn-custom:hover {
        background-color: #1f176b;
      }
    </style>
  </head>
<body>
<div class="wrapper" >
<div class="nav-wrapper" style="background-color: #1f176b;">
  <div class="nav-container" >
    <div class="nav-second" >
      <ul>
      </ul>
    </div>
  </div>
</div>

<div class="inner-wrapper">
  <div class="main-container">
    <?php if ($_GET['step'] == '1') {?>
      <div class="step-wrapper">
        <div class="step-container">
          <form method="post" autocomplete="off">
            <h2>Choose a Username</h2>
            <h4>Pick a unique username that represents you best!</h4>
            <div class="form-group">
              <input class="form-control" type="text" name="username" placeholder="Username" style="font-size: 16px;"/>
            </div>
            <div>
              <ul>
                <li><?php if (isset($error)){echo $error;} ?></li>
              </ul>
            </div>
            <div>
              <input type="submit" name="next" value="Continue" class="btn-custom" style="background-color: #1f176b;"
			  >
            </div>
          </form>
        </div>
      </div>
    <?php } ?>

    <?php if ($_GET['step'] == '2'){?>
      <div class='lets-wrapper'>
        <div class='step-letsgo'>
          <h1>Welcome, <?php echo $user->screenName; ?>!</h1>
          <p style="font-size:22px;">Welcome to a world of content, experiences, and communities tailored just for you.</p>
          <br>
          <p style="font-size:22px;">
            Let's get started! Tell us about your interests, and we'll personalize your experience.
          </p>
          <span>
            <a href='../home.php' class='btn-custom' style="background-color: #1f176b;">Let's Go!</a>
          </span>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</div>
</body>
</html>

<?php
}
?>
