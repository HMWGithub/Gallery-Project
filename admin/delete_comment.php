<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
  if(empty($_GET['id'])) {
    redirect('comments.php');
  }
  
  $comment = Comment::find_by_id($_GET['id']);
  
  if($comment){
    $session->message("The comment from '{$comment->author}' has been deleted");
    $comment->delete();
  }     

  redirect('comments.php');
?>