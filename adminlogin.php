<?php
include 'connection.php';

session_start();
if(isset($_SESSION['user'])!="")
{
  header("Location:adminpanel.php");
}
else{
  echo "";
}

if(isset($_POST['log-btn']))
{
  $user_name = mysqli_real_escape_string($connection, $_POST['uname']);
  $user_pass = md5(mysqli_real_escape_string($connection, $_POST['upass']));
  
  $user_name = trim($user_name);
  $user_pass = trim($user_pass);

  $log_query = mysqli_query($connection, "SELECT * FROM admin WHERE user_name = '$user_name' AND user_pass = '$user_pass'");
  $log_fetch = mysqli_fetch_array($log_query);
  $log_count = mysqli_num_rows($log_query);
  if($log_count == 1 && $log_fetch['user_pass'] = md5($user_pass))
  {
  	$_SESSION['user'] = $log_fetch['admin_id'];
  	$_SESSION['username'] = $log_fetch['admin_name'];
  	sleep(1);
  	header("Location: adminpanel.php");
  }
  else
  {
  	echo "Pogreška";
  }
 }

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>
<body>
 <div class="wrapper">
    <form method="post">
      <span>Korisničko ime:</span><input type="text" name="uname" />
      <span>Lozinka:</span><input type="password" name="upass" />
      <input type="submit" name="log-btn" value="Prijava" />
    </form>
 </div>
</body>
</html>