  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tagline</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add-View-Delete Tagline</a></li>
              <li class="breadcrumb-item active">Tagline</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="container-fluid">
      <?php if ($action === "addTagline" || $action === "editTagline") : ?>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-olive">
                  <div class="card-header">
                    <h3 class="card-title">Tagline Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="" enctype="multipart/form-data" method="post" autocomplete="on">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tagline Subject</label>
                        <input required="" type="text" class="form-control form-control-sm" name="tsubject" value="<?php if ($action === "editTagline") {
                                                                                                                      echo $editTagline['subject'];
                                                                                                                    } else {
                                                                                                                      echo $subject;
                                                                                                                    } ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tagline Content</label>
                        <input required="" type="text" class="form-control form-control-sm" name="content" value="<?php if ($action === "editTagline") {
                                                                                                                    echo $editTagline['content'];
                                                                                                                  } else {
                                                                                                                    echo $content;
                                                                                                                  } ?>">
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="exampleInputPassword1">Add By</label>
                          <input minlength="5" required="" type="text" class="form-control form-control-sm" name="addby" id="adharnumber" value="<?php if ($action === "editTagline") {
                                                                                                                                                    echo $editTagline['addby'];
                                                                                                                                                  } else {
                                                                                                                                                    echo $addby;
                                                                                                                                                  } ?>">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>

              <div class="col-md-6">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-text-width mr-2"></i>
                      Terms and conditions
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <ol class="text-bold text-muted">
                      <li>Be Carefully add the details.</li>
                      <li>Only Tagline Content Will Display on Website</li>
                      <li>Before Preceeding Kindly check the details Carefully.</li>
                      <li>All the Other previous tagline also visible on the website</li>
                    </ol>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-sm-12">
                <!-- checkbox -->
                <div class="form-group clearfix">
                  <div class="icheck-success d-inline">
                    <input type="checkbox" required id="checkboxSuccess3" <?php if ($action === "editTagline") {
                                                                            echo "checked";
                                                                          } ?>>
                    <label for="checkboxSuccess3">
                      I agree <a href="#"> terms and conditions.</a> I hereby declare that the information provided is true to the best of my knowledge and belief.
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="addTagline" value='confirm' class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger float-right">Reset</button>
          </div>
          </form>
        </div>
      <?php endif;
      if ($action === 'viewTagline') : $z = 0; ?>

        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">All Tagline(s)</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <table id="default_order" class="table table-bordered table-hover text-center text-nowrap p-0">
              <thead>
                <tr>
                  <th> Sr </th>
                  <th> Tagline Subject</th>
                  <th> Content </th>
                  <th> Add By </th>
                  <th> Add On </th>
                  <th> Action </th>
                </tr>
              </thead>
              <?php
              if (is_array($viewTagline))
                foreach ($viewTagline as $row) {
                  echo '<tr>
        <td>
        ' . ++$z . '
        </td>
        <td> ' . case_name($row['subject']) . '  </td>
        <td><b>' . case_name($row['content']) . '</b> </td>
        <td> ' . case_name($row['addby']) . ' </td>
        <td> ' . formatDateCalender($row['created'], 'd-M-y') . ' </td>
        <td> <a href="?pid=7&action=editTagline&id=' . $row['sr'] . '" class="fas fa-edit text-info" > </a> <a href="?pid=7&action=deleteTagline&id=' . $row['sr'] . '" class="fas fa-trash text-danger ML-2" > </a> </td>
        ';
                }
              ?>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif ?>
    </div>