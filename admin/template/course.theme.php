  <script>
    function course_subject(n, c_dur) {

      for (var i = 1; i <= n; i++) {
        cod += '<div class="col-sm-8"><label for="course_fee' + i + '">Subject Name ' + i + '</label> <div class="input-group input-group-sm mb-3"><input type="text" name="s_name' + i + '" required="" class="form-control"  placeholder="Enter Subject Name"></div></div></div><div class="col-sm-4"><label for="course_fee' + i + '">Subject Code ' + i + '</label> <div class="input-group input-group-sm mb-3"> <input type="text" name="s_code' + i + '" required="" class="form-control"  placeholder="Subject Code"> <input type="hidden" name="sub_num" value =' + n + ' > <input type="hidden" name="c_dur" value ="' + c_dur + '" ></div></div></div>';
      }
      alert(n);
      $('#course_id').html(cod);
    };
  </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Course</a></li>
              <li class="breadcrumb-item active">Add Courses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="container-fluid">
      <?php if ($action == 'addcourse') : //array_print($editCourse); 
      ?>
        <div class="card card-indigo">
          <div class="card-header">
            <h3 class="card-title">Add Course</h3>
          </div>
          <form action="" enctype="multipart/form-data" method="post" autocomplete="on">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card card-indigo">
                    <div class="card-header">
                      <h3 class="card-title">Kindly Fill The Details</h3>
                    </div>
                    <div class="card-body">
                      <label for="amount">Course Name</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-sun"></i></span>
                        </div>
                        <input type="text" name="course" class="form-control" value="<?php echo $editCourse['c_name'] != '' ? $editCourse['c_name'] : $course; ?>" id="amount" placeholder="Course Name" value="<?php echo $course; ?>">
                      </div>
                      <label for="reamount">Re-Enter The Course Name</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-sun"></i></span>
                        </div>
                        <input type="text" name="recourse" class="form-control" id="recourse" placeholder="Re-Eneter the Name of Course" value="<?php echo $editCourse['c_name'] != '' ? $editCourse['c_name'] : $course; ?>">
                      </div>
                      <label for="mname">Course Code</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-snowflake"></i></span>
                        </div>
                        <input type="text" <?php echo $edit != "" ? "disabled" : ''; ?> name="course_code" class="form-control" id="course_code" placeholder="Course code e.g. SDE111" value="<?php echo $editCourse['c_code'] != '' ? $editCourse['c_code'] : $course_code; ?>">
                      </div>
                      <label for="mname">Course Duration</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-thumbs-up"></i></span>
                        </div>
                        <select name="course_duration" class="form-control">
                          <option value=''>Select Duration</option>
                          <option <?php echo $editCourse['c_dur'] == '1 Month' ? 'Selected' : ''; ?> value='1 Month'>1 Month</option>
                          <option <?php echo $editCourse['c_dur'] == '2 Month' ? 'Selected' : ''; ?> value='2 Month'>2 Months</option>
                          <option <?php echo $editCourse['c_dur'] == '3 Month' ? 'Selected' : ''; ?> value='3 Month'>3 Months</option>
                          <option <?php echo $editCourse['c_dur'] == '6 Month' ? 'Selected' : ''; ?> value='6 Month'>6 Months</option>
                          <option <?php echo $editCourse['c_dur'] == '1 Year' ? 'Selected' : ''; ?> value='1 Year'>1 Year</option>
                          <option <?php echo $editCourse['c_dur'] == '2 Year' ? 'Selected' : ''; ?> value='2 Year'>2 Years</option>
                          <option <?php echo $editCourse['c_dur'] == '3 Year' ? 'Selected' : ''; ?> value='3 Year'>3 Years</option>
                          <option <?php echo $editCourse['c_dur'] == '4 Year' ? 'Selected' : ''; ?> value='4 Year'>4 Years</option>
                        </select>
                      </div>
                      <label for="course_fee">Course Fees</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                        </div>
                        <input type="text" name="course_fee" class="form-control" id="course_fee" placeholder="Course fee for Client" value="<?php echo $editCourse['c_fees'] != '' ? $editCourse['c_fees'] : $course_fee; ?>">
                      </div>
                      <label for="no_subject">No.(s) of Subject</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-list"></i></span>
                        </div>
                        <input type="number" name="no_subject" class="form-control" id="no_subject" placeholder="No.(s) of subject" value="<?php echo $editCourse['c_subject_no'] != '' ? $editCourse['c_subject_no'] : $remark; ?>">
                      </div>
                      <div class="icheck-primary">
                        <input type="checkbox" id="remember" required>
                        <label for="remember">
                          I agree <a href="#"> terms and conditions.</a> For adding course to Our Dictionary.
                        </label>
                      </div>

                    </div>
                    <div class="card-footer">
                      <div class="input-group input-group-sm">
                        <?php if ($edit != '') { ?>
                          <button class="btn btn-info" id="submit" type="submit" name="add_course" value="update"> <i class="fas fa-receipt"></i> Update Course</button>
                        <?php } else { ?>
                          <button class="btn btn-success" id="submit" type="submit" name="add_course" value="adding"> <i class="fas fa-receipt"></i> Add Course</button>
                        <?php } ?>
                        <button class="btn btn-danger float-right ml-2" id="reset" type="reset" name="reset" value="reset"> <i class="fas fa-trash"></i> Reset </button>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
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
                        <li>Course Name Can not change after the updating.</li>
                        <li>Can Not Edit The Course Details.</li>
                        <li>Can Not Delete the Course.</li>
                        <li>Before Preceeding Kindly check the details Carefully.</li>
                      </ol>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </form>
          <!-- /.card-footer +91 94668-59500 Phool Kumar -->
        </div>
      <?php endif;
      if ($action == 'viewcourse') : $z = 0; ?>
            <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">All Card Generate Request</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
              <thead>
                <tr>
                  <th> Sr </th>
                  <th> Request By </th>
                  <th> Generate ID </th>
                  <th> Amount </th>
                  <th>No. of Card </th>
                  <th> Remark </th>
                  <th> Requested On </th>
                  <th> Status </th>
                </tr>
              </thead>
              <?php foreach ($viewCardsR as $row) { 
                echo '<tr>
        <td>
        ' . ++$z . '
        </td>
        <td>'. $row['client']. '<br>('.$row['clientMail'].') </td>
        <td>'. $row['trans_id'] . ' </td>
        <td> <b>' . $row['amount'] . '</b>  </td>
        <td>  ' . case_name($row['cardNo']) . ' </td>
<td> ' . case_name($row['remark']) . ' </td>
<td><b> ' . date('d-M-y H:s:i',strtotime($row['requested_on'])) .' </b> </td>
<td>
' . (($row['status'] == "0") ? "<form method='post' action='?pid=5&action=viewcourse' ><input type='hidden' name='cid' value=" . $row['wallet_id'] . " /><input type='hidden' name='trid' value=" . $row['trans_id'] . " /> <input type='submit' name='Approve' value='Approve' class='btn btn-success btn-sm' /> </form>" : "transfered") . '
</td>';
              } ?>
            </table>
          </div>
      <?php endif;
      if ($action == 'newsubject') : //array_print($subject_list); 
      ?>
        <div class="card card-indigo">
          <form action="?pid=5&action=newsubject" role="form" enctype="multipart/form-data" method="post" autocomplete="on">
            <div class="card-header">
              <h3 class="card-title">Add Subject For
                <div class="float-right"><select onchange="$('form').submit()" id="SelectCourse" name="course" class="form-control form-control-sm border-0 custom-select">
                    <option value="<?php echo $course != '' ? $course : ''; ?>">Select Subject</option> <?php echo $options; ?>
                  </select> </div>
              </h3>
            </div>
            <div class="card-body">
              <div class="row" id="course_id">
                <?php if (is_array($subject_list)) {
                  $i = 1;
                  foreach ($subject_list as $slist) {
                    $cod .= '<div class="col-sm-8"><label for="course_fee' . $i . '">Subject Name ' . $i . '</label> <div class="input-group input-group-sm mb-3"><input type="text" name="s_name' . $i . '" required="" class="form-control" placeholder="Enter Subject Name" value="' . $slist['sub_name'] . '"></div></div><div class="col-sm-4"><label for="course_fee' . $i . '">Subject Code ' . $i . '</label> <div class="input-group input-group-sm mb-3"> <input type="text" name="s_code' . $i . '" readonly required="" class="form-control"  placeholder="Subject Code" value="' . $slist['sub_code'] . '"> <input type="hidden" name="sub_num" value =' . $slist['sub_number'] . ' > <input type="hidden" name="c_dur" value ="' . $slist['c_dur'] . '" ></div></div>';
                    $i++;
                  }
                } else {
                  for ($i = 1; $i <= $subject4List['c_subject_no']; $i++) {
                    $cod .= '<div class="col-sm-8"><label for="course_fee' . $i . '">Subject Name ' . $i . '</label> <div class="input-group input-group-sm mb-3"><input type="text" name="s_name' . $i . '" required="" class="form-control" placeholder="Enter Subject Name" ></div></div><div class="col-sm-4"><label for="course_fee' . $i . '">Subject Code ' . $i . '</label> <div class="input-group input-group-sm mb-3"> <input type="text" name="s_code' . $i . '" required="" class="form-control"  placeholder="Subject Code"> <input type="hidden" name="sub_num" value =' . $subject4List['c_subject_no'] . ' > <input type="hidden" name="c_dur" value ="' . $subject4List['c_dur'] . '" ></div></div>';
                  }
                }
                echo $cod; ?>
              </div>
            </div>
            <div class="card-footer">
              <div class="input-group input-group-sm">
                <?php if (is_array($subject_list)) { ?>
                  <button class="btn btn-info" type="submit" name="add_subject" value="updating"> <i class="fas fa-receipt"></i> Update Subject</button>
                <?php } else { ?>
                  <button class="btn btn-success" type="submit" name="add_subject" value="adding"> <i class="fas fa-receipt"></i> Add Subject</button>
                <?php } ?>
                <button class="btn btn-danger float-right ml-2" id="reset" type="reset" name="reset" value="reset"> <i class="fas fa-trash"></i> Reset </button>
              </div>
            </div>
          </form>
        <?php endif;
      if ($action == 'viewsubject') : $z = 0; ?>

          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">All Available Card(s)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <div class="table-responsive p-0 m-0">
                <table id="filterTable" class="table table-sm table-bordered table-hover text-center text-nowrap p-0">
                  <thead>
                    <tr>
                      <th> Sr </th>
                      <th> Ref No. </th>
                      <th> Card No. </th>
                      <th> Card Exp </th>
                      <th> CVV </th>
                      <th> Card PIN </th>
                      <th> Name On Card </th>
                      <th> Card Value </th>
                      <th> Card Holder </th>
                      <th> Generate Date </th>
                    </tr>
                  </thead>
                  <?php //array_print($viewCourse);
                  if (is_array($viewSubject))
                    foreach ($viewSubject as $row) {
                      echo '<tr>
        <td> ' . ++$z . '  </td>
        <td><b>' . ($row['refernce']) . '</b></td>
        <td><b>' . ($row['cardno']) . '</b></td>
        <td> ' . ($row['cardExpire']) . ' </td>
        <td> ' . ($row['cardCvv']) . ' </td>
        <td> ' . $row['cardPin'] . ' </td>
        <td> ' . $row['client'] . ' </td>
        <td> ' . $row['cardValue'] . ' </td>
        <td> ' . $row['nameOncard'] . ' </td>
        <td> ' . date('d-M-y h:i:s a', strtotime($row['created'])) . ' </td>
      </tr>';
                    }
                  ?>
                  <!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        <?php endif; ?>
        </div>
    </div>