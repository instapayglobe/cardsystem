  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Payments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="container-fluid">
      <?php if ($action === "approve") : //array_print($viewClient); 
      ?>
        <?php $z = 0; ?>

        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">All Pending Payments of Clients</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <?php if (is_array($payments)) {
                if (count($payments) > 0) { ?>
                  <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                    <thead>
                      <tr>
                        <th> Sr </th>
                        <th> User ID </th>
                        <th> Amount </th>
                        <th> Deposite Details </th>
                        <th> Trasaction ID </th>
                        <th> Action </th>
                        <th> Request Date </th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($payments as $row) {
                      echo '<tr>
        <td>
        ' . ++$z . '
        </td>
        <td>
        ' . $row['user'] . '<br>(<b>' . case_name($row["name"]) . ')</b>
        </td>
        <td>
        <i class="fa fa-rupee-sign text-sm "></i> ' . $row['amount'] . '
        </td>
        <td>
        ' . $row['dmedium'] . '('. $row['dby'] .')
        </td>
        <td>
        ' . case_name($row['trans_id']) . '
        </td>
        <td>
        ' . (($row['status'] == "0") ? "<form method='post' action='?pid=6&action=approve' ><input type='hidden' name='cid' value=" . $row['user'] . " /><input type='hidden' name='trid' value=" . $row['sr'] . " /><input type='hidden' name='amount' value=" . $row['amount'] . " /> <input type='submit' name='Approve' value='Approve' class='btn btn-success btn-sm' /> </form>" : "transfered") . '
        </td>
<td>
' . date("d-M-Y H:s:i", strtotime($row['requested_date'])) . '
</td>';
                    }
                    ?>
                  </table>
            </div>
        <?php }
              } else {
                echo '<h3> No Client Found For the Approving Funds </h3>';
              } ?>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif; ?>
      <?php if ($action === "viewwallets") :  ?>
        <?php $z = 0; ?>

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">All Client's Wallets</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <?php if (is_array($wallets)) {
                if (count($wallets) > 0) { ?>
                  <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                    <thead>
                      <tr>
                        <th> Sr </th>
                        <th> User ID </th>
                        <th> Amount </th>
                        <th> Wallet Password </th>
                        <th> Last Updates </th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($wallets as $row) {
                      echo '<tr>
        <td>
        ' . ++$z . '
        </td>
        <td>
        ' . $row['wallet_id'] . '<br>(<b>' . case_name($row["cname"]) . ')</b>
        </td>
        <td>
        <i class="fa fa-rupee-sign text-sm "></i> ' . $row['balance'] . '
        </td>
        <td>
        ' . case_name($row['wall_password']) . '
        </td>
<td>
' . date("d-M-Y", strtotime($row['created'])) . '
</td>';
                    }
                    ?>
                  </table>
            </div>
        <?php }
              } else {
                echo '<h3> No Wallets Found </h3>';
              } ?>
          </div>
          <!-- /.card-body -->
        </div>
      <?php endif; ?>
      <?php if ($action === "direct") : ?>
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title"> Transfer The Advance Amounts To ..... </h3>
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
                        <select id="listBox" required="" class="form-control form-control-sm custom-select" name="center"><?php echo $center;  ?>
                          <option value=""> Select Center </option>
                          <?php echo $fr_options; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group  col-sm-3">
                      <label for="exampleInputPassword1">Amount</label>
                      <div class="input-group">
                        <input type="text" id="amount" name="amount" class="form-control form-control-sm" value="<?php echo $editStudent['dob'];   ?>" />
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group  col-sm-3">
                      <label for="exampleInputPassword1">Re-amount</label>
                      <div class="input-group date" id="calendarDate1" data-target-input="nearest">
                        <input type="text" id="reamount" name="reamount" class="form-control form-control-sm" value="<?php echo $editStudent['dob'];  ?>" />
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group  col-sm-12">
                      <label for="exampleInputPassword1">Remark</label>
                      <div class="input-group date" id="calendarDate1" data-target-input="nearest">
                        <input type="text" id="remark" name="remark" class="form-control form-control-sm" value="<?php echo $editStudent['dob'];  ?>" />
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fas fa-file"></i></div>
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
              <button type="submit" name="advance" value='confirm' class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger float-right">Reset</button>
            </div>
        </div>
        </form>
      <?php endif;
      if ($action === 'transactions') : $z = 0; ?>
        <form role="form" method="post" action="" name="transactions">
          <div class="card">
            <!-- /.card-header -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Account Summary <div class="card-title float-right ">
                    <select onchange="$('form').submit()" name="center" class="form-control form-control-sm custom-select" data-placeholder="Select centre">
                      <option value="<?php echo $client != '' ? $client : ''; ?>">Select Client</option> <?php echo $fr_options; ?>
                    </select> </h3>
              </div>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
              <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap p-0">
                <thead>
                  <tr>
                    <th> Sr </th>
                    <!-- <th> Student ID </th> -->
                    <th> Transaction Id </th>
                    <th> Description </th>
                    <th> Amount </th>
                    <th> Date </th>
                  </tr>
                </thead>
                <?php $debit = $credit = 0;
                if (is_array($viewPassbook)) {
                  rsort($viewPassbook);
                  foreach ($viewPassbook as $row) {
                    $credit += $row['amount'];
                    $debit += $row['amount'];

                    if ($row['amount'] > 0)
                      echo '<tr>
                   <td> ' . ++$z . '  </td>
                   <td><b>' . ($row['trans_id']) . '</b> </td>
                   <td><b>' . case_name($row['remark']) . '</b> </td>
                   <td> ' . $row['amount'] . ' </td>
                   <td> --NA-- </td>
                   <td><b> ' . date('d-M-y H:s:i', strtotime($row['requested_date'])) . '</b> </td>
                  </tr>';
                  }
                }
                $total = $credit + $debit;
                $color = ($total > 0) ? 'text-success' : 'text-danger';
                echo '<tfoot>
                    <td class="' . $color . '" ><b> Available Bal <i class="fas fa-rupee-sign " ></i> ' . $credit . ' </b></td>
                   </tfoot>';
                ?>
                <!-- <td><b> '.formatDateCalender($row['adate'], 'd-M-y').' To '.formatDateCalender($row['edate'], 'd-M-y').' </b> </td> 
        <td> '.($row['status']==0 ? "<label class='badge badge-danger'>Pending</label>" : "<label class='badge badge-success'>Completed</label>").' </td> -->
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" name="permissions" value="assigning" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger float-right">Reset</button>
            </div>
          </div>
    </div>
    </form>
  <?php endif; ?>
  </div>
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