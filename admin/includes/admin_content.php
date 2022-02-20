<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Admin
        <small>Subheading</small>
      </h1>
        
      <?php
        $user = User::find_user_by_id(8);
        $user->username = "sdoashfao";
        $user->password = "2412341";
        $user->first_name = "Henry";
        $user->last_name = "Cavill";

        $user->update();
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