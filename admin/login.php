<?php require_once("includes/header.php"); ?>

<?php

if($session->is_signed_in()){
  redirect("index.php");
}

if(isset($_POST['submit'])){
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $user_found = User::verify($username, $password);

  if($user_found){
    $session->login($user_found);
    redirect("index.php");
  } else {
    $error = "Your password or username is incorrect";
  }
} else {
  $username = NULL;
  $password = NULL;
  $error = NULL;
}

?>

<div class="col-md-4 col-md-offset-3">
  <h4 class="bg-danger"> <?php echo $error ?> </h4>
  <form action="" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">
    </div><div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
    </div>
    <div class="form-group">
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>
  </form>
</div>
