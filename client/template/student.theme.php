  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Card</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Card</a></li>
              <li class="breadcrumb-item active">Card Request</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>

    <div class="container-fluid">
      <?php if ($action === "addstudent" || $action === "editStudent") : ?>
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create A Card(s) Request</h3>
              </div>
            <div class="card-body">
              <div class="row">
              <div class="col-sm-6" >
              <div class="card card-purple">
              <form action="" enctype="multipart/form-data" method="post" autocomplete="on">										
              <div class="card-header">
                <h3 class="card-title">Please Fill The Details</h3>
              </div>
              <div class="card-body">
              <label for="amount">Amount</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                  </div>
                  <select name="amount"  class="form-control" > 
                  <?php echo $card_amounts; ?>
                  </select>
                 </div>
              <label for="mname">No. of Card(s)</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span>
                  </div> 
                  <input type="number" name="nocard" class="form-control" id="deposite_by" placeholder="eg. 5,10,15,20 etc." value="<?php echo $feeStudent['mother_name']; ?>"  >
                </div>
              <label for="remark">Remark(s)</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-star"></i></span>
                  </div>
                  <input type="text" name="remark" class="form-control" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"  >
                </div>
            <div class="icheck-primary">
              <input type="checkbox" id="remember" required >
              <label for="remember">
						I agree <a href="#" > terms and conditions.</a> Deposited Amount in Benificary Account.
                </label>
            </div>
              </div>
              <div class="card-footer">
              <div class="input-group input-group-sm">
                  <button class="btn btn-success" id="submit" type="submit" name="admission" value="confirm"> <i class="fas fa-receipt"></i> Add Now</button>
                </div>
              </div>
              <!-- /.card-body -->
              </div>
          </form>
              </div>
              <div class="col-sm-6" >
              <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Instructions</h4>
                                <h6 class="card-title "><i
                                        class="mr-1 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Please Read Carefully</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr. No.</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Check the <b> Amount</b> before preeding.</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Make Sure about that the sufficient amount should be kept in your Wallet</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>The trasaction is automatically reflected after made the request. It will take upto 24hrs* depend upon working days. You will get a confirmation email and Detailed mail of your cards</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
              </div>
            </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
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
        <td class="px-2 py-4">'. $row['trans_id'] . ' </td>
        <td> <b>' . $row['amount'] . '</b>  </td>
        <td>  ' . case_name($row['cardNo']) . ' </td>
<td> ' . case_name($row['remark']) . ' </td>
<td><b> ' . date('d-M-y H:s:i',strtotime($row['requested_on'])) .' </b> </td>
<td>
' . ($row['status'] == 0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>") . '
</td>';
              } ?>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif;
      if ($action === 'viewstudent' || $action === 'editstudent') : $z = 0; ?>

        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">All Cards</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
            <thead>
                <tr>
                  <th> Sr </th>
                  <th> Generate ID </th>
                  <th> Amount </th>
                  <th>No. of Card </th>
                  <th> Remark </th>
                  <th> Requested On </th>
                  <th> Status </th>
                </tr>
              </thead>
              <?php foreach ($viewStudent as $row) {
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
                if ($action === 'viewstudent') {
                  echo '</tr>';
                } else {
                  echo '
  <td> <a href="?pid=1&action=editStudent&id=' . $row['sid'] . '" class="fas fa-edit text-info" > </a> </td>
  </tr>';
                }
              } ?>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif ?>
    </div>
    <!-- page-wrapper ends -->
    <!-- partial -->
  </div>
  <!-- main-panel ends -->