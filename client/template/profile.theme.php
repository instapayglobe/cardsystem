  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?pid=0">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <!-- Main content -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <!-- About Me Box -->
          <div class="card card-maroon">
            <div class="card-header">
              <h3 class="card-title">About Us</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="text-center">
                <h6>Center: <?php echo case_name($profile['cname']); ?></h6>
                <img class="profile-user-img img-fluid img-circle" src="../home/f_images/<?php echo $profile['hphoto'] ?>" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php echo case_name($profile['name']) ?></h3>

              <p class="text-muted text-center"><?php echo $profile['email'] ?></p>
              <hr>
              <strong><i class="fas fa-calendar-check mr-1"></i> Date of Enroll</strong>

              <p class="text-muted">
                <?php $date = strtotime($profile['f_date']);
                echo date("d-M-Y", $date); ?>
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted"><?php echo case_name($profile['city'] . ', ' . $profile['state']) ?></p>

              <hr>

              <strong><i class="fas fa-chess-king mr-1"></i> Center Name</strong>

              <p class="text-muted">
                <?php echo case_name($profile['cname']); ?>
              </p>

              <hr>

              <strong><i class="fas fa-address-card mr-1"></i> Address</strong>

              <p class="text-muted"><?php echo case_name($profile['address'] . ', ' . $profile['pin'] . ', ' . $profile['city'] . ', ( ' . $profile['state'] . '), ' . $profile['pin']) ?></p>

              <strong><i class="far fa-file-alt mr-1"></i> Contact Detail</strong>

              <p class="text-muted"><?php echo case_name($profile['mobile'] . ', Office: ' . $profile['cmobile'] . '<br> Mail:' . $profile['cemail']) ?></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Images/Documents</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <span class="username">
                        <a href="#" class="float-right btn-tool"><?php echo case_name($profile['cname']) ?></a>
                        <a href="#"></a>

                      </span>
                      <span class="description">Posted 4/5 photos</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <img class="img-fluid" src="../home/f_images/<?php echo $profile['inphoto'] ?>" alt="Photo">
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6">
                            <img class="img-fluid mb-3" src="../home/f_images/<?php echo $profile['inphoto'] ?>" alt="Photo">
                            <img class="img-fluid" src="../home/f_images/<?php echo $profile['exphoto'] ?>" alt="Photo">
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form name="ChangePassword" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-4 col-form-label">Current Password</label>
                      <div class="col-sm-8">
                        <input type="password" name="opassword" class="form-control" id="opassword" placeholder="Current Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-4 col-form-label">New Password</label>
                      <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="password" placeholder="New Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-4 col-form-label">Confirm Password</label>
                      <div class="col-sm-8">
                        <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-4 col-sm-8">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-10 col-sm-12">
                        <button type="submit" name="agree" value="changeMypassword" class="btn btn-info">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
          <section class="connectedSortable">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gallery</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="../home/f_images/<?php echo $profile['inphoto'] ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="../home/f_images/<?php echo $profile['exphoto'] ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="../home/f_images/<?php echo $profile['inphoto'] ?>" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- END ACCORDION & CAROUSEL-->
            <!-- /.card -->
          </section>
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>