
<?php
    session_start();
    include('database_connectivity.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  <link rel="stylesheet" href="css/admin_project.php">
  <link rel="stylesheet" href="./src/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include 'admin_header.php' ?>
    <div class="content-wrapper">

      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner"> 
                  <h3>150</h3>

                  <p>Projects</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="admin_project.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>



            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="admin_user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Freelaners</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="admin_freelancer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

            </div>
          </div>

        </div>

      </section>
    </div>

    <?php include ('admin_footer.php'); ?>
  </div>

  <!-- jQuery -->
  <script src="./src/js/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="./src/js/bootstrap.bundle.min.js"></script>
  <script src="./src/js/adminlte.min.js"></script>
</body>

</html>