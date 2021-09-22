  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Downloads </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Downloads</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="container-fluid">
      <?php if (($action === "certificate" || $action === "marksheet") && $enroll == "") : ?>
        <div class="card card-olive">
          <div class="card-header">
            <h3 class="card-title"> Download The Certificate For Student of </h3>
          </div>
          <form role="form" action="" enctype="multipart/form-data" method="post" autocomplete="on">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="form-group input-group-sm col-sm-6">
                      <label for="exampleInputPassword1">Select Center</label>
                      <div class="input-group input-group-sm">
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fa fa-university"></i></div>
                        </div>
                        <select id="listBox" required="" class="form-control form-control-sm custom-select" name="center"><?php if ($action === "editStudent") {
                                                                                                                            echo "<option value=" . $editStudent['state'] . " >" . $editStudent['state'] . "</option>";
                                                                                                                          } else {
                                                                                                                            echo $district;
                                                                                                                          } ?>
                          <option value=""> Select Center </option>
                          <?php echo $fr_options; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group  col-sm-3">
                      <label for="exampleInputPassword1">Date of Admission From</label>
                      <div class="input-group date" id="calendarDate2" data-target-input="nearest">
                        <input type="text" id="dob" placeholder="dd/mm/yyyy" name="dof" class="form-control form-control-sm datetimepicker-input" data-toggle="datetimepicker" data-target="#calendarDate2" value="<?php if ($action === "editStudent") {
                                                                                                                                                                                                                      echo $editStudent['dob'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                      echo $a_date;
                                                                                                                                                                                                                    } ?>" />
                        <div class="input-group-append" data-target="#calendarDate2">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group  col-sm-3">
                      <label for="exampleInputPassword1">To</label>
                      <div class="input-group date" id="calendarDate1" data-target-input="nearest">
                        <input type="text" id="dob" placeholder="dd/mm/yyyy" name="dot" class="form-control form-control-sm datetimepicker-input" data-toggle="datetimepicker" data-target="#calendarDate1" value="<?php if ($action === "editStudent") {
                                                                                                                                                                                                                      echo $editStudent['dob'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                      echo $a_date;
                                                                                                                                                                                                                    } ?>" />
                        <div class="input-group-append" data-target="#calendarDate1">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              <div class="col-sm-12">
                <!-- checkbox -->
                <div class="form-group clearfix">
                  <div class="icheck-success d-inline">
                    <input type="checkbox" required id="checkboxSuccess3" <?php if ($action === "editStudent") {
                                                                            echo "checked";
                                                                          } ?>>
                    <label for="checkboxSuccess3">
                      I agree <a href="#"> terms and conditions.</a> I hereby declare that the information provided is true to the best of my knowledge and belief.
                    </label>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" name="download" value='confirm' class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger float-right">Reset</button>
            </div>
        </div>
        </form>
      <?php endif;
      if ($download === 'confirm') : $z = 0; ?>

        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">List of Students for Downloads</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <?php if (is_array($viewStudent)) if (count($viewStudent) > 0) { ?>
              <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                <thead>
                  <tr>
                    <th> Sr </th>
                    <th> Student ID </th>
                    <th> Course Info </th>
                    <th> Father Name </th>
                    <th> D.O.B. </th>
                    <th> Contact No </th>
                    <th> Fee Status </th> <?php if ($action === 'marksheet') {
                                            echo '<th> Download Marksheet </th>';
                                          } else if ($action === 'certificate') {
                                            echo '<th> Download Certificate </th>';
                                          } ?>
                  </tr>
                </thead>
                <?php
                foreach ($viewStudent as $row) {
                  echo '<tr>
        <td>
        ' . ++$z . '
        </td>
        <td class="px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-3"><img
                                                                src="' . STUDENT_IMAGE . $row['student_photo'] . '"
                                                                alt="user" class="rounded-circle" width="45"
                                                                height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">' . case_name($row['name']) . '</h5>
                                                            <span class="text-muted font-14">' . $row['sid'] . '</span>
                                                        </div>
                                                    </div>
        </td>
        <td>  ' . case_name($row['course']) . '<br> <b> ' . formatDateCalender($row['adate'], 'd-M-y') . ' To ' . formatDateCalender($row['edate'], 'd-M-y') . ' </b></td>
<td> ' . case_name($row['father_name']) . ' </td>
<td> ' . formatDateCalender($row['dob'], 'd-M-y') . ' </td>
<td> ' . $row['contact'] . '/' . $row['aphone'] . ' </td>
<td>
' . ($row['status'] == 0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>") . '
</td>';
                  if ($action === 'marksheet') {
                    echo '
  <td><form method="POST" action="?pid=4&action=certificate&sync=marksheet" target= "_blank"> <input type="hidden"  name="student_id" value=' . $row['sid'] . ' /> <button type="submit" class="btn btn-sm btn-info" value="View"> <i class="fas fa-download" ></i> Download</button> </form> </td>
  </tr>';
                  }
                  if ($action === 'certificate') {
                    echo '
<td><form method="POST" action="?pid=4&action=certificate&sync=certificate" target= "_blank"> <input type="hidden"  name="student_id" value=' . $row['sid'] . ' /> <button type="submit" class="btn btn-sm btn-dark" value="View"> <i class="fas fa-download" ></i> Download</button> </form> </td>
  </tr>';
                  }
                }
                ?>
              </table>
            <?php } else {
              echo '<h3> No Student Found For the Center </h3>';
            } ?>
          </div>
          <!-- /.card-body -->
        </div>
        <?php endif;
      if ($enroll === 'entermarks') : $z = $id = 0;
        if (is_array($subdetails)) {
          if (count($subdetails) > 0) { ?>
            <form method="POST" action="" method='POST' enctype="multipart/form-data">
              <input type="hidden" name="estudent_id" value='<?php echo $subdetails[0]['sid'] ?>.' />
              <input type="hidden" name="course_id" value='<?php echo $subdetails[0]['course_id'] ?>' />
              <input type="hidden" name="subject_no" value='<?php echo $subdetails[0]['sub_number'] ?>' />
              <div class="row">
                <div class="col-md-12">
                  <!-- Widget: user widget style 1 -->
                  <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                      <h3 class="widget-user-username"><?php echo case_name($subdetails[0]['name']) ?></h3>
                      <h5 class="widget-user-desc">Studnet Id <?php echo ($subdetails[0]['sid']) ?></h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="<?php echo STUDENT_IMAGE . $subdetails[0]['student_photo'] ?>" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-3 border-right">
                          <div class="description-block">
                            <h5 class="description-header"><?php echo $subdetails[0]['dob'] ?></h5>
                            <span class="description-text">D.O.B</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 border-right">
                          <div class="description-block">
                            <h5 class="description-header"><?php echo case_name($subdetails[0]['father_name']) ?></h5>
                            <span class="description-text">Father Name</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 border-right">
                          <div class="description-block">
                            <h5 class="description-header"><?php echo $subdetails[0]['contact'] ?></h5>
                            <span class="description-text">Contact</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3">
                          <div class="description-block">
                            <h5 class="description-header"><?php echo $subdetails[0]['sponsor'] ?></h5>
                            <span class="description-text">Center ID</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <b class="text-muted text-center"> <?php echo case_name($subdetails[0]['course']) ?></b>

                  </div>
                  <!-- /.widget-user -->
                </div>
                <div class="col-md-12">
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Please Fill The marks Carefully</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="table-responsive ">
                      <div class="card-body">
                        <?php if (is_array($subdetails)) if (count($subdetails) > 0) {
                        ?>
                          <table class="table table-sm table-bordered table-hover text-center text-nowrap p-0">
                            <thead>
                              <th> Sr </th>
                              <th> Subject Code </th>
                              <th> Subject Name </th>
                              <th> Max. Marks </th>
                              <th> Pass Marks </th>
                              <th> Ob. T Marks </th>
                              <th> Ob. P Marks </th>
                              <th> Total </th>
                            </thead>
                            <?php
                            foreach ($subdetails as $sub_row) {
                              if ($action === 'updatemarks') {
                                $mvalue = 'value=' . $marksdetails['sub' . $z];
                                $tvalue = 'value=' . $tdetails['sub' . $z];
                                $pvalue = 'value=' . $pdetails['sub' . $z];
                              } else {
                                $mvalue = $tvalue = $pvalue = '';
                              }
                              echo '<tr> 
        <td> ' . (++$id) . ' </td>
        <td> ' . $sub_row['sub_code'] . ' </td>
        <td class="text-bold" > ' . case_name($sub_row['sub_name']) . ' </td>
        <td> 100 </td>
        <td> 50 </td>
        <td> <input type="number" ' . $tvalue . ' class="border-0 text-center text-bold" id="total_tMark' . $z . '" min="00" max="99" name="tsub' . $z . '" required /> </td>
        <td> <input type="number" ' . $pvalue . ' class="border-0 text-center text-bold" id="total_pMark' . $z . ' " min="00" max="99" name="psub' . $z . '" onchange="get_total(this.value,' . $z . ')" /> </td>
        <td> <input type="number" ' . $mvalue . ' class="border-0 text-center text-bold" id="gtotal' . $z . '" min="00" max="99" name="sub' . $z . '" readonly="" required /> </td>
        </tr>';
                              $z++;
                            }
                            ?>
                          </table>
                        <?php } else {
                          echo '<h3> No Student Found For Marks Upload Or Already Uploaded Marks </h3>';
                        } ?>
                      </div>
                    </div>
                    <div class="card-footer">
                      <input type="submit" name="upload_marks" class="btn btn-sm btn-success" value="Upload Marks" />
                      <input type="reset" name="reset" class="btn btn-sm btn-danger float-right" value="Reset" />
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>
            </form>
        <?php }
        } else if ($action === 'addmarks') {
          $msg = 10;
          echo ' <div class="card card-widget widget-user">
<div class="widget-user-header bg-info">
  <h3 class="widget-user-username"> No Student Found For Marks Upload Or Already Uploaded Marks </h3> 
  </div>
  </div>';
        } else if ($action === 'updatemarks') {
          echo ' <div class="card card-widget widget-user">
    <div class="widget-user-header bg-danger">
      <h3 class="widget-user-username"> No Marks are Found For the Student </h3> 
      </div>
      </div>';
        }
      endif;
      if ($action === "affliation") : ?>
        <div class="card card-indigo">
          <div class="card-header">
            <h3 class="card-title">Download Affliattion letter </h3>
          </div>
          <!-- /.card-header -->
          <div class="table-responsive ">
            <div class="card-body">
              <?php if (is_array($viewAffliationn)) if (count($viewAffliationn) > 0) {
              ?>
                <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                  <thead>
                    <tr>
                      <th> Sr </th>
                      <th> Frachisee </th>
                      <th> Institute Name </th>
                      <th> Address </th>
                      <th> Contact No </th>
                      <th> Valid From </th>
                      <th> Download Letter </th>
                    </tr>
                  </thead>
                  <?php foreach ($viewAffliationn as $row) {
                    echo '<tr>
        <td>
        ' . ++$z . '
        </td>
        <td class="px-2 py-4">
        <div class="d-flex no-block align-items-center">
            <div class="mr-3"><img
                    src="' . CLIENT_IMAGE . $row['hphoto'] . '"
                    alt="user" class="rounded-circle" width="45"
                    height="45" /></div>
            <div class="">
                <h5 class="text-dark mb-0 font-16 font-weight-medium">' . case_name($row['name']) . '</h5>
                <span class="text-muted font-14">' . $row['fname'] . '</span>
            </div>
        </div>
</td>
        <td> <b>' . case_name($row['cname']) . '<br> (' . $row['fid'] . ')' . '</b>  </td>
<td> ' . case_name($row['address'] . ',<br> ' . $row['city'] . ', ' . $row['state'] . ', ' . $row['pin']) . ' </td>
<td> ' . $row['mobile'] . '<br>' . $row['cmobile'] . '(C) </td>
<form role="form" action="?pid=4&action=affliation&sync=letter" enctype="multipart/form-data" method="post" autocomplete="on" target="_blank">
<td class="input-group">
<input type="date" required="" placeholder="dd/mm/yyyy"  name="valid" class="form-control form-control-sm datetimepicker-input" />
</td>
<input type="hidden"  name="franchisee" value=' . $row['fid'] . ' /> 
<td>
' . ($row['status'] == 0 ? "<label class='badge badge-danger'>Pending</label>" : "<button type='submit' class='btn btn-sm btn-success' value='View'> <i class='fas fa-print' ></i> Download</button>") . '
</td>
</form>
';
                  }
                  ?>
                </table>
              <?php } else {
                echo '<h3> No Student Found For Marks Upload Or Already Uploaded Marks </h3>';
              } ?>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif; ?>

    </div>
    <!-- page-wrapper ends -->
  </div>
  <!-- main-panel ends -->
  <script>
    function get_total(x, y) {

      r = parseInt(x) + parseInt($("#total_tMark" + y).val());
      if (r > 96) {
        alert("Invalid marks");
        $("#gtotal" + y).val(0);
        $("#total_tMark" + y).val(0);
        preventDefault();
      } else {
        $("#gtotal" + y).val(r);
      }
    }
  </script>