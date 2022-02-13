<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Admin
        <small>Subheading</small>
      </h1>
        
      <?php
        $user = new User;
        $user->username = "xBraadz";
        $user->password = "twitch";
        $user->first_name = "Brad";
        $user->last_name = "Pestell";

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