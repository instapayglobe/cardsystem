  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Fees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>

    <div class="container-fluid">
      <?php if ($action === 'viewstudent') : $z = 0; ?>

        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Paying Student(s)</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <table id="filters" class="table table-bordered table-hover text-center text-nowrap p-0">
              <thead>
                <tr>
                  <th> Sr </th>
                  <!-- <th> Student ID </th> -->
                  <th> Name </th>
                  <th> Father Name </th>
                  <th> Course Name </th>
                  <th> D.O.B. </th>
                  <th> Contact No </th>
                  <!-- <th> Course Duration </th>
                          <th> Fee Status </th>  -->
                  <th> Pay </th>
                </tr>
              </thead>
              <?php
              if (is_array($viewStudent))
                foreach ($viewStudent as $row) {
                  echo '<tr>
        <td> ' . ++$z . '  </td>
        <td><b>' . case_name($row['name']) . '</b>
        <div class="filtr-item" data-sort="white sample">
        <a href="students/' . $row['student_photo'] . '" data-toggle="lightbox" data-title="' . case_name($row['name']) . '">
        <p class="img-fluid">(' . $row['sid'] . ')</p>
            </a></div>
        </td>
        <td> ' . case_name($row['father_name']) . ' </td>
        <td> ' . case_name($row['course']) . ' </td>
        <td> ' . formatDateCalender($row['dob'], 'd-M-y') . ' </td>
        <td> ' . $row['contact'] . '/' . $row['aphone'] . ' </td>
        <td> <a href="?pid=2&action=paystudent&id=' . $row['sid'] . '" class=" fas fa-money-bill-alt text-info" > </a> </td>
      </tr>';
                }
              ?>
              <!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif;
      if ($action == 'paystudent') : ?>
        <div class="card card-teal">
          <div class="card-header">
            <h3 class="card-title">Pay Student Fees</h3>
          </div>
          <form action="" enctype="multipart/form-data" method="post" autocomplete="on">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card card-olive">
                    <div class="card-header">
                      <h3 class="card-title">Confirm Student Details</h3>
                    </div>
                    <div class="card-body">
                      <label for="name">Student Name</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" class="form-control" id="name" placeholder="Name" value="<?php echo $feeStudent['name']; ?>" disabled>
                      </div>
                      <label for="fname">Father Name</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                        </div>
                        <input type="email" class="form-control" id="fname" placeholder="Father Name" value="<?php echo $feeStudent['father_name']; ?>" disabled>
                      </div>
                      <label for="mname">Mother Name</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                        </div>
                        <input type="email" class="form-control" id="mname" placeholder="Mother Name" value="<?php echo $feeStudent['mother_name']; ?>" disabled>
                      </div>
                      <label for="aname">Address</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="email" class="form-control" id="aname" placeholder="Address" value="<?php echo $feeStudent['village']; ?>" disabled>
                      </div>
                      <label for="cname">Contact No.</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                        </div>
                        <input type="email" class="form-control" id="cname" placeholder="Contact" value="<?php echo $feeStudent['contact']; ?>" disabled>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Fee Details</h3>
                    </div>
                    <div class="card-body">
                      <label for="name">Course Name</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-book"></i></span>
                        </div>
                        <input type="email" class="form-control" id="name" placeholder="Course Name" value="<?php echo $feeStudent['course']; ?>" disabled>
                      </div>
                      <label for="fname">Course Duration</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                        </div>
                        <input type="email" class="form-control" id="fname" placeholder="Course Duration" value="<?php echo $feeStudent['c_dur']; ?>" disabled>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="mname">Admission Date</label>
                          <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
                            </div>
                            <input type="email" class="form-control" id="mname" placeholder="Admission Date" value="<?php echo $feeStudent['adate']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <label for="aname">Completion Date</label>
                          <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                            </div>
                            <input type="email" class="form-control" id="aname" placeholder="Completion Date" value="<?php echo $feeStudent['edate']; ?>" disabled>
                          </div>
                        </div>
                      </div>
                      <label for="name">Course Fees</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                        </div>
                        <input type="email" class="form-control" id="name" placeholder="Course Name" value="<?php echo $feeStudent['c_fees']; ?>" disabled>
                      </div>
                      <label for="cname">Remark(s)</label>
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
                        </div>
                        <input name='remark' type="text" class="form-control" id="cname" placeholder="Remark(s)">
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>
              <div class="input-group input-group-sm mb-3 col-sm-6">
                <div class="input-group-prepend ">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input name="tr_password" type="password" class="form-control" id="password" placeholder="Transaction Passcode" required>
              </div>
              <div class="icheck-primary">
                <input type="checkbox" id="remember" required>
                <label for="remember">
                  I agree <a href="#"> terms and conditions.</a> I hereby declare that the information provided is true to the best of my knowledge and belief.
                </label>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button class="btn btn-success" id="submit" type="submit" name="pay_now" value="paying"> <i class="fas fa-receipt"></i> Pay Now</button>
            </div>
          </form>
          <!-- /.card-footer -->
        </div>
      <?php endif;
      if ($action === 'viewpassbook') : $z = 0; ?>

        <div class="card card-indigo">
          <div class="card-header">
            <h3 class="card-title">Account Summary</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
              <thead>
                <tr>
                  <th> Sr </th>
                  <th> Trasaction ID </th>
                  <th> Description </th>
                  <th> Credit </th>
                  <th> Debit </th>
                  <th> Date </th>
                </tr>
              </thead>
              <?php $debit = $credit = 0;
              rsort($viewPassbook);
              if (is_array($viewPassbook))
                foreach ($viewPassbook as $row) {
                  $credit += $row['amount'];
                  $debit += $row['tramount'];

                  if ($row['tramount'] > 0)
                    echo '<tr>
                  <td> ' . ++$z . '  </td>
                  <td><b>' . case_name($row['trasaction_id']) . '</b> </td>
                  <td><b>' . case_name($row['tremark']) . '</b> </td>
                  <td> --NA-- </td>
                  <td> ' . case_name($row['tramount']) . ' </td>
                  <td><b> ' . date('d-M-y H:s:i', strtotime($row['tr_date'])) . '</b> </td>
                 </tr>';

                  if ($row['amount'] > 0)
                    echo '<tr>
                   <td> ' . ++$z . '  </td>
                   <td><b>' . ($row['trans_id']) . '</b> </td>
                   <td><b>' . case_name($row['remark']) . '</b> </td>
                   <td> ' . case_name($row['amount']) . ' </td>
                   <td> --NA-- </td>
                   <td><b> ' . date('d-M-y H:s:i', strtotime($row['requested_date'])) . '</b> </td>
                  </tr>';
                }
              $total = $credit - $debit;
              $color = ($total > 0) ? 'text-success' : 'text-danger';
              echo '<tfoot>
                    <td colspan="2" ><b class="text-success"> Total Credit <i class="fas fa-rupee-sign " ></i> ' . $credit . ' </b></td>
                    <td colspan="2" ><b class="text-danger" > Total Debit <i class="fas fa-rupee-sign " ></i> ' . $debit . ' </b></td>
                    <td class="' . $color . '" ><b> Available Bal <i class="fas fa-rupee-sign " ></i> ' . $total . ' </b></td>
                   </tfoot>';
              ?>
              <!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif; ?>
    </div>
    <!-- page-wrapper ends -->
    <!-- partial -->
  </div>
  <!-- main-panel ends -->