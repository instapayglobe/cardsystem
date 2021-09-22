  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Wallet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Wallet</a></li>
              <li class="breadcrumb-item active">Add Money</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
	</div>    
      <div class="container-fluid">
        <?php if($action==='viewstudent'): $z=0;?>
      
      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Paying Student(s)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive ">
                <table id="filters" class="table ">
	
                          <th> D.O.B. </th>
                          <th> Contact No </th>
                          <!-- <th> Course Duration </th>
                          <th> Fee Status </th>  -->
                          <th> Pay </th>      
                       </tr>
                      </thead>
                  <?php 
                  if(is_array($viewStudent))
                  foreach($viewStudent as $row) {
echo '<tr>
        <td> '.++$z.'  </td>
        <td><b>'.case_name($row['name']).'</b>
        <div class="filtr-item" data-sort="white sample">
        <a href="students/'.$row['student_photo'].'" data-toggle="lightbox" data-title="'.case_name($row['name']).'">
        <p class="img-fluid">('.$row['sid'].')</p>
            </a></div>
        </td>
        <td> '.case_name($row['father_name']).' </td>
        <td> '.case_name($row['course']).' </td>
        <td> '.formatDateCalender($row['dob'], 'd-M-y').' </td>
        <td> '.$row['contact'].'/'.$row['aphone'].' </td>
        <td> <a href="?pid=2&action=paystudent&id='.$row['sid'].'" class=" fas fa-money-bill-alt text-info" > </a> </td>
      </tr>'; 
} 
?> 
<!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
<?php endif; if($action=='addmoney'): ?>
      <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Amount To Wallet</h3>
              </div>
            <div class="card-body">
              <div class="row">
              <div class="col-md-6">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Make a Request</a></li>
                <li class="nav-item"><a class="nav-link" href="#giftcard" data-toggle="tab">Use Gift Card</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
					<form action="" enctype="multipart/form-data" method="post" autocomplete="on">										
              <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title">Please Fill The Details</h3>
              </div>
              <div class="card-body">
              <label for="amount">Amount</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                  </div>
                  <input type="number" name="amount" class="form-control" id="amount" placeholder="amount" value="<?php echo $amount; ?>"  >
                </div>
              <label for="reamount">Re-Enter Amount</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                  </div>
                  <input type="number" name="reamount" class="form-control" id="reamount" placeholder="Re-Amount" value="<?php echo $reamount; ?>"  >
                </div>
              <label for="mname">Deposite By</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span>
                  </div>
                  <input type="text" name="deposite_by" class="form-control" id="deposite_by" placeholder="Deposite By" value="<?php echo $feeStudent['mother_name']; ?>"  >
                </div>
              <label for="dmedium">Deposit Medium</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                  </div>
                  <input type="text" name="dmedium" class="form-control" id="dmedium" placeholder="Deposite Medium" value="<?php echo $dmedium; ?>"  >
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
                  <button class="btn btn-success" id="submit" type="submit" name="add_now" value="adding"> <i class="fas fa-receipt"></i> Add Now</button>
                </div>
              </div>
              <!-- /.card-body -->
              </div>
                </form>
              </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="giftcard">
                <form name="giftcard" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                  <label for="amount">Amount</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                  </div>
                  <input type="number" name="amount" class="form-control" id="amount" placeholder="amount" value="<?php echo $amount; ?>" required  >
                </div>
              <label for="reamount">Re-Enter Amount</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                  </div>
                  <input type="number" name="reamount" class="form-control" id="reamount" placeholder="Re-Amount" value="<?php echo $reamount; ?>" required >
                </div>
                  <div class="form-group row">
                      <label for="inputName" class="col-sm-4 col-form-label">Name on Card</label>
                      <div class="col-sm-8">
                        <input type="text" name="ncard" class="form-control" id="ncard" placeholder="Name of Card Holder" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-4 col-form-label">Card No.</label>
                      <div class="col-sm-8">
                        <input type="number" name="cardn" class="form-control" id="cardn" placeholder="XXXX XXXX XXXX XXXX" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-4 col-form-label">Expiry Date</label>
                      <div class="col-sm-8">
                        <input type="text" name="carde" class="form-control" id="carde" placeholder="MM/YY" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-4 col-form-label">CVV</label>
                      <div class="col-sm-8">
                        <input type="password" name="cardcvv" class="form-control" id="cardcvv" placeholder="Please enter CVV no." required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-4 col-form-label">Card PIN</label>
                      <div class="col-sm-8">
                        <input type="password" name="cardpin" class="form-control" id="cardpin" placeholder="Please enter your PIN." required>
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
                        <button type="submit" name="agree" value="cardPayment" class="btn btn-info">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
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
                                                <td>Once you paid the amount after that make a request</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>The trasaction is automatically reflected after made the request. It will take upto 24hrs* depend upon working days.</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Make Sure all details carefully Otherwise card and account are blocked for 30 days.</td>
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
<?php endif;  if($action==='viewwallet'): $z=0;?>
      
      <div class="card card-lime">
              <div class="card-header">
                <h3 class="card-title">Wallet Summary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive ">
                <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                      <thead>
                        <tr>
                          <th> Sr </th>
                          <!-- <th> Student ID </th> -->
                          <th> Description </th>
                          <th> Amount </th>
                          <th> Deposite By </th>
                          <th> Date </th>      
                          <th> Status</th>
                       </tr>
                      </thead>
                  <?php $debit = $credit = 0;
                  if(is_array($viewWallet))
                  foreach($viewWallet as $row) {
                    $credit+=$row['amount'];
                    $debit+=$row['amount'];
                    
                   echo '<tr>
                   <td> '.++$z.'  </td>
                   <td><b>'.case_name($row['trans_id']).'</b> </td>
                   <td> '.case_name($row['amount']).' </td>
                   <td> '.case_name($row['dby']).' </td>
                   <td><b> '.date('d-M-y H:s:i',strtotime($row['requested_date'])).'</b> </td>
                   <td> '.($row['status']==1 ? "<span class='right badge badge-success'>Approved</span>" : "<span class='right badge badge-danger'>Pending</span>").'</td>
                  </tr>';
                  
} echo '<tfoot>
<td colspan="6" class="text-success" ><b> Total Requested Bal <i class="fas fa-rupee-sign " ></i> '.$credit.' </b></td>
</tfoot>'
?> 
<!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
<?php endif; if($action==='viewInline'): $z=0;?>
      
      <div class="card card-orange">
              <div class="card-header">
                <h3 class="card-title">Pending Amount Summary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive ">
                <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                      <thead>
                        <tr>
                          <th> Sr </th>
                          <!-- <th> Student ID </th> -->
                          <th> Description </th>
                          <th> Amount </th>
                          <th> Deposite By </th>
                          <th> Date </th>      
                          <th> Status</th>
                       </tr>
                      </thead>
                  <?php $debit = $credit = 0;
                  if(is_array($viewWallet))
                  foreach($viewWallet as $row) {
                    $credit+=$row['amount'];
                    $debit+=$row['amount'];
                    
                   echo '<tr>
                   <td> '.++$z.'  </td>
                   <td><b>'.case_name($row['trans_id']).'</b> </td>
                   <td> '.case_name($row['amount']).' </td>
                   <td> '.case_name($row['dby']).' </td>
                   <td><b> '.date('d-M-y H:s:i',strtotime($row['requested_date'])).'</b> </td>
                   <td> '.($row['status']==1 ? "<span class='right badge badge-success'>Approved</span>" : "<span class='right badge badge-danger'>Pending</span>").'</td>
                  </tr>';
                  
} echo '<tfoot>
<td colspan="6" class="text-warning" ><b> Total Requested Bal <i class="fas fa-rupee-sign " ></i> '.$credit.' </b></td>
</tfoot>'
?> 
<!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
<?php endif; if($action === "paymentPage"):?>

                <div class="col-sm-8">
					<form action="" enctype="multipart/form-data" method="post" autocomplete="on">										
              <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title">Payment Receiving Page</h3>
              </div>
              <div class="card-body">
              <label for="amount">Amount</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                  </div>
                  <input type="number" name="amount" class="form-control" id="amount" placeholder="amount" value="<?php echo $amount; ?>"  >
                </div>
              <label for="reamount">Re-Enter Amount</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                  </div>
                  <input type="number" name="reamount" class="form-control" id="reamount" placeholder="Re-Amount" value="<?php echo $reamount; ?>"  >
                </div>
              <label for="mname">Deposite By</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span>
                  </div>
                  <input type="text" name="deposite_by" class="form-control" id="deposite_by" placeholder="Deposite By" value="<?php echo $feeStudent['mother_name']; ?>"  >
                </div>
              <!-- <label for="dmedium">Deposit Medium</label>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                  </div>
                  <input type="text" name="dmedium" class="form-control" id="dmedium" placeholder="Deposite Medium" value="<?php echo $dmedium; ?>"  >
              </div> -->
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
                  <button class="btn btn-success" id="submit" type="submit" name="create" value="creating"> <i class="fa fa-list"></i> Create </button>
                </div>
              </div>
              <!-- /.card-body -->
              </div>
                </form>
              </div>
              <div class="card card-orange">
              <div class="card-header">
                <h3 class="card-title">Available Payments Pages</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive ">
                <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                      <thead>
                        <tr>
                          <th> Sr </th>
                          <th> Page Link </th>
                          <th> Amount </th>
                          <th> Deposite By </th>
                          <th> Date </th>      
                          <th> Status</th>
                       </tr>
                      </thead>
                  <?php $z = $debit = $credit = 0;
                  if(is_array($viewWallet))
                  foreach($viewWallet as $row) {
                    $credit+=$row['amount'];
                    $debit+=$row['amount'];
                    
                   echo '<tr>
                   <td> '.++$z.'  </td>
                   <td><a href="'.$link.'?id='.case_name($row['refNo']).'" target="_blank" >'.$link.'?id='.urlencode(case_name($row['refNo'].'+'.getToken(12)).'+'.$_SESSION['api']).'</a> </td>
                   <td> '.case_name($row['amount']).' </td>
                   <td> '.case_name($row['dby']).' </td>
                   <td><b> '.date('d-M-y H:s:i',strtotime($row['requested_on'])).'</b> </td>
                   <td> '.($row['status']==1 ? "<span class='right badge badge-danger'>Inactive</span>" : "<span class='right badge badge-success'>Active</span>").'</td>
                  </tr>';
                  
} echo '<tfoot>
<td colspan="6" class="text-warning" ><b> Total Requested Bal <i class="fas fa-rupee-sign " ></i> '.$credit.' </b></td>
</tfoot>'
?> 
<!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
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