  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Marks Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Marks</a></li>
              <li class="breadcrumb-item active">Add Marks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="container-fluid">
      <?php if (($action === "addmarks" || $action === "updatemarks" || $action === "viewmarks") && $enroll == "") : ?>
        <div class="card card-olive">
          <div class="card-header">
            <h3 class="card-title"> <?php echo $action === 'addmarks' ? "Add" : ($action === 'updatemarks' ? "Update" : "View") ?> Marks</h3>
          </div>
          <form role="form" action="" enctype="multipart/form-data" method="post" autocomplete="on">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="form-group input-group-sm col-sm-6">
                      <label for="exampleInputPassword1">Select Center</label>
                      <div class="input-group input-group-sm ">
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fa fa-university"></i></div>
                        </div>
                        <select id="inlineFormCustomSelect" required="" class="form-control form-control-sm custom-select" name="center"><?php if ($action === "editStudent") {
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
              <button type="submit" name="addmarks" value='confirm' class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger float-right">Reset</button>
            </div>
        </div>
        </form>
      <?php endif;
      if ($addmarks === 'confirm') : $z = 0; ?>

        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">All Eligible Student For Marks Upload</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <?php if (is_array($viewStudent)) if (count($viewStudent) > 0) { ?>
              <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                <thead>
                  <tr>
                    <th> Sr </th>
                    <th> Student ID </th>
                    <th> Name </th>
                    <th> Course Name </th>
                    <th> Father Name </th>
                    <th> D.O.B. </th>
                    <th> Contact No </th>
                    <th> Course Duration </th>
                    <th> Fee Status </th> <?php if ($action === 'addmarks') {
                                            echo '<th> Upload Marks </th>';
                                          } else if ($action === 'updatemarks') {
                                            echo '<th> Update Marks </th>';
                                          } else if ($action === 'viewmarks') {
                                            echo '<th> View Marks </th>';
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
        <td> <b>' . case_name($row['name']) . '</b>  </td>
        <td>  ' . case_name($row['course']) . ' </td>
<td> ' . case_name($row['father_name']) . ' </td>
<td> ' . formatDateCalender($row['dob'], 'd-M-y') . ' </td>
<td> ' . $row['contact'] . '/' . $row['aphone'] . ' </td>
<td><b> ' . formatDateCalender($row['adate'], 'd-M-y') . ' To ' . formatDateCalender($row['edate'], 'd-M-y') . ' </b> </td>
<td>
' . ($row['status'] == 0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>") . '
</td>';
                  if ($action === 'addmarks') {
                    echo '
  <td> <a href="?pid=1&action=addmarks&enroll=entermarks&id=' . $row['sid'] . '" class="fas fa-list-ol text-info" > </a> </td>
  </tr>';
                  } else if ($action === 'updatemarks') {
                    echo '
  <td> <a href="?pid=1&action=updatemarks&enroll=entermarks&id=' . $row['sid'] . '" class="fas fa-list-ol text-info" > </a> </td>
  </tr>';
                  } else if ($action === 'viewmarks') {
                    echo '
  <td> <a href="?pid=1&action=viewmarks&enroll=entermarks&id=' . $row['sid'] . '" class="fas fa-list-ol text-info" > </a> </td>
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
              <div class="col-md-12">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo ($action === 'updatemarks' || $action === 'addmarks') ? 'Please Fill The Marks Carefully' : 'Details Of Marks' ?></h3>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <!-- Column -->
                      <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                          <div class="p-2 bg-primary text-center">
                            <h1 class="font-light text-white"><?php echo case_name($subdetails[0]['name']) ?></h1>
                            <h6 class="text-white">S/D/W/o <?php echo case_name($subdetails[0]['father_name']) ?></h6>
                          </div>
                        </div>
                      </div>
                      <!-- Column -->
                      <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                          <div class="p-2 bg-cyan text-center">
                            <h1 class="font-light text-white"><?php echo $subdetails[0]['contact'] ?></h1>
                            <h6 class="text-white">D.O.B. <?php echo $subdetails[0]['dob'] ?></h6>
                          </div>
                        </div>
                      </div>
                      <!-- Column -->
                      <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                          <div class="p-3 bg-success text-center">
                            <h6 class="font-light text-white"><?php echo case_name($subdetails[0]['course']) ?></h6>
                            <h6 class="text-white">Center ID: <?php echo $subdetails[0]['sponsor'] ?></h6>
                          </div>
                        </div>
                      </div>
                      <!-- Column -->
                      <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                          <div class="bg-gray p-2" style="background: lightblue url('<?php echo STUDENT_IMAGE . $subdetails[0]['student_photo'] ?>') no-repeat center;  background-size: auto 100px;">
                            <h1 class="font-light text-white">&nbsp;</h1>
                            <h6 class="text-black text-left "><?php echo ($subdetails[0]['sid']) ?></h6>
                          </div>
                        </div>
                      </div>
                      <!-- Column -->
                    </div>
                    <!-- /.card-header -->
                    <div class="table-responsive ">
                      <div class="card-body">
                        <?php if (is_array($subdetails)){ if ((count($subdetails) > 0) && (is_array($tdetails) || $action !== 'viewmarks' )) { ?>
                          <table class="table table-sm table-bordered table-hover text-center text-nowrap p-0">
                            <thead>
                              <th> Sr </th>
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
                              } else if ($action === 'viewmarks') {
                                $mvalue = 'readonly value=' . $marksdetails['sub' . $z];
                                $tvalue = 'readonly value=' . $tdetails['sub' . $z];
                                $pvalue = 'readonly value=' . $pdetails['sub' . $z];
                              } else {
                                $mvalue = $tvalue = $pvalue = '';
                              }
                              echo '<tr> 
        <td> ' . (++$id) . ' </td>
        <td class="text-bold" > ' . case_name($sub_row['sub_name']) . '( ' . $sub_row['sub_code'] . ') </td>
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
                        <?php }
                        else {
                          echo '<h3> No Marks Uploaded for The student </h3>';
                        } 
                      }else {
                          echo '<h3> No Student Found For Marks Upload Or Already Uploaded Marks </h3>';
                        } ?>
                      </div>
                    </div> <?php if ($action != 'viewmarks') { ?>
                      <div class="card-footer">
                        <input type="submit" name="upload_marks" class="btn btn-sm btn-success" value="Upload Marks" />
                        <input type="reset" name="reset" class="btn btn-sm btn-danger float-right" value="Reset" />
                      </div> <?php } ?>
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
      endif; ?>

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