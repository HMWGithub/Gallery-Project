<?php include("includes/header.php"); ?>
<?php require_once("admin/includes/init.php"); ?>

<?php
  if(empty($_GET['id'])){
    redirect('index.php');
  }

  $photo = Photo::find_by_id($_GET['id']);

  if(isset($_POST['submit'])) {
    $author = trim($_POST['author']);
    $body   = trim($_POST['body']);

    $new_comment = Comment::create_comment($photo->id, $author, $body);

    if(($new_comment) && $new_comment->save()){
      redirect("photo.php?id={$photo->id}");
    } else {
      $message = "Unable to post comment";
    }
  } else {
    $author = '';
    $body   = '';
  }

  $comments = Comment::find_comments($photo->id);
?>

<div class="col-lg-8">
  <!-- Image Title -->
  <h1><?php echo $photo->title; ?></h1>

  <!-- Image Author -->
  <p class="lead">
    by <a href="#">Start Bootstrap</a>
  </p>

  <hr>

  <!-- Image Upload Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

  <hr>

  <!-- Image Photo -->
  <img class="img-responsive" src="\admin\<?php echo $photo->picture_path(); ?>" alt="">

  <hr>

  <!-- Image Description -->
  <p class="lead"><?php echo $photo->description; ?></p>

  <hr>

  <!-- Leave a comment -->
  <div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="post">
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control">
      </div>
      <div class="form-group">  
        <label for="body">Comment</label>
        <textarea name="body" class="form-control" rows="3"></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <hr>

  <!-- Comments -->
  <?php foreach($comments as $comment){?>
    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="https://via.placeholder.com/64x64&text=image" alt="">
      </a>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $comment->author; ?>
          <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        <?php echo $comment->body; ?>
      </div>
    </div>
  <?php } ?>
  </div>

  <!-- Navigation sidebar -->
  <div class="col-md-4">
    <?php include("includes/sidebar.php"); ?>
  </div>
</div>  

<?php include("includes/footer.php"); ?>