<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Admin
        <small>Subheading</small>
      </h1>
        
      <?php
        // if ($user = User::find_user_by_id(7)){
        //   $user->delete();
        // } else {
        //   echo "No User Found";
        // }
        // $user = new User();

        // $user->username = "BRAD";
        // $user->save();
        // $user = User::find_user_by_id(7);
        // $user->last_name = "Pestell";

        // $user->update();

        $user = new User();
        $user->username = "ASCWNYC";
        $user->password = "testinggg";
        $user->first_name = "Alex";
        $user->last_name = "Williams";

        $user->create();
      ?>

      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-file"></i> Blank Page
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->