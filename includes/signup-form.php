<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('Location: ../index.php');
}

if(isset($_POST['signup'])){
	$screenName = $_POST['screenName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$birthdate = $_POST['birthdate']; // קבלת התאריך שנבחר
	$error = '';

	if(empty($screenName) or empty($password) or empty($email) or empty($birthdate)){
		$error = 'All fields are required';
	}else {
		$email = $getFromU->checkInput($email);
		$screenName = $getFromU->checkInput($screenName);
		$password = $getFromU->checkInput($password);
		$birthdate = $getFromU->checkInput($birthdate);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = 'Invalid email format';
		}else if(strlen($screenName) > 20){
			$error = 'Name must be between 6-20 characters';
		}else if(strlen($password) < 5){
			$error = 'Password is too short';
		}else if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $birthdate)) { // בדיקה שהתאריך בפורמט YYYY-MM-DD
			$error = 'Invalid birthdate format';
		}else {
			if($getFromU->checkEmail($email) === true){
				$error = 'Email is already in use';
			}else {
				$user_id = $getFromU->create('users', array(
					'email' => $email, 
					'password' => md5($password),
					'screenName' => $screenName,
					'birthdate' => $birthdate, // הכנסת תאריך הלידה
					'profileImage' => 'assets/images/defaultProfileImage.png', 
					'profileCover' => 'assets/images/defaultCoverImage.png'
				));
				$_SESSION['user_id'] = $user_id;
				header('Location: includes/signup.php?step=1');
			}
		}
	}
}
?>

<form method="post" autocomplete="off">
    <?php if(isset($error)){ ?>
        <div class="alert alert-danger" role="alert" style="width: 300px; margin:20px auto;text-align:center;">
            <?php echo $error; ?>
        </div>
    <?php } ?>    

    <div class="signup-form">
        <div class="form-group">
            <input class="form-control" type="text" name="screenName" placeholder="Full Name" />
        </div>
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email" />
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" />
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input class="form-control" type="date" name="birthdate" required />
        </div>
        <input class="new-btn m-auto mt-5" type="submit" name="signup" Value="Signup">
    </div>
</form>

<script type="text/javascript">
    setTimeout(function() {
        $('#alert').alert('close');
    }, 3500);
</script>
