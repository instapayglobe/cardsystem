  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Client</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Client(s)</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="container-fluid">

      <?php if (($action === "editclient") && ($id !== "")) : $z = 0; ?>
        <div class="card card-indigo">
          <div class="card-header ">
            <h3 class="card-title">Edit Client Data</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-olive">
                  <div class="card-header">
                    <h3 class="card-title">Center Head Detail</h3>
                  </div>
                  <form id="myForm" method="POST" action="" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Center Head Name</label>
                        <input required="" name="name" type="text" value="<?php if ($action === "editclient") {
                                                                            echo $editClient['name'];
                                                                          } else {
                                                                            echo $name;
                                                                          } ?>" class="form-control form-control-sm" placeholder="Center Head Name">
                      </div>
                      <div class="form-group">
                        <label>Center Head Father's Name</label>
                        <input required="" name="fname" type="text" value="<?php if ($action === "editclient") {
                                                                              echo $editClient['fname'];
                                                                            } else {
                                                                              echo $fname;
                                                                            } ?>" class="form-control form-control-sm" placeholder="Center Head Father's Name">
                      </div>
                      <div class="form-group">
                        <label>Center Head Mother's Name</label>
                        <input required="" name="mname" type="text" value="<?php if ($action === "editclient") {
                                                                              echo $editClient['mname'];
                                                                            } else {
                                                                              echo $mname;
                                                                            } ?>" class="form-control form-control-sm" placeholder="Center Head Mother's Name">
                      </div>
                      <div class="form-group">
                        <label>Center Head Address</label>
                        <input required="" name="address" type="text" value="<?php if ($action === "editclient") {
                                                                                echo $editClient['address'];
                                                                              } else {
                                                                                echo $address;
                                                                              } ?>" class="form-control form-control-sm" placeholder="Center Head's Address">
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label>PIN Code</label>
                          <input required="" name="pin_code" pattern="[0-9]{6}" maxlength="6" type="text" value="<?php if ($action === "editclient") {
                                                                                                                    echo $editClient['pin'];
                                                                                                                  } else {
                                                                                                                    echo $pin;
                                                                                                                  } ?>" class="form-control form-control-sm" placeholder="PIN Code">
                        </div>

                        <div class="form-group col-sm-6">
                          <label>City/Village</label>
                          <input required="" name="city" type="text" value="<?php if ($action === "editclient") {
                                                                              echo $editClient['city'];
                                                                            } else {
                                                                              echo $city;
                                                                            } ?>" class="form-control form-control-sm" placeholder="City/Village">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group  col-sm-6">
                          <label>State</label>
                          <select required="" id="listBox1" onchange='selct_district(this.value ,"secondlist1" )' name="state" type="text" class="form-control form-control-sm" placeholder="State">
                            <option value="<?php if ($action === "editclient") {
                                              echo $editClient['state'];
                                            } else {
                                              echo $state;
                                            } ?>"> <?php if ($action === "editclient") {
                                                      echo $editClient['state'];
                                                    } else {
                                                      echo $state;
                                                    } ?></option>
                          </select>
                        </div>
                        <div class="form-group  col-sm-6">
                          <label>District</label>
                          <select required="" id='secondlist1' name="district" type="text" class="form-control form-control-sm" placeholder="District">
                            <option value="<?php if ($action === "editclient") {
                                              echo $editClient['district'];
                                            } else {
                                              echo $district;
                                            } ?>"> <?php if ($action === "editclient") {
                                                      echo $editClient['district'];
                                                    } else {
                                                      echo $district;
                                                    } ?></option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Email ID </label>
                        <input required="" name="email" value="<?php if ($action === "editclient") {
                                                                  echo $editClient['email'];
                                                                } else {
                                                                  echo $email;
                                                                } ?>" class="form-control form-control-sm" type="email" placeholder="example@mail.com">
                      </div>
                      <div class="row">
                        <div class="form-group  col-sm-6">
                          <label>Contact No. </label>
                          <input required="" name="mobile" pattern="[0-9]{10}" maxlength="10" value="<?php if ($action === "editclient") {
                                                                                                        echo $editClient['mobile'];
                                                                                                      } else {
                                                                                                        echo $mobile;
                                                                                                      } ?>" class="form-control form-control-sm" type="text" placeholder="">
                        </div>
                        <div class="form-group  col-sm-6">
                          <label>Aadhaar Number </label>
                          <input required="" name="aadhaar" type="text" pattern="[0-9]{12}" maxlength="12" value="<?php if ($action === "editclient") {
                                                                                                                    echo $editClient['adhar'];
                                                                                                                  } else {
                                                                                                                    echo $aadhaar;
                                                                                                                  } ?>" class="form-control form-control-sm" placeholder="435189734797">
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Center Details</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">
                    <div class="form-group">
                      <label>Center Name</label>
                      <input required="" name="c_name" type="text" value="<?php if ($action === "editclient") {
                                                                            echo $editClient['cname'];
                                                                          } else {
                                                                            echo $c_name;
                                                                          } ?>" class="form-control form-control-sm" placeholder="Center Name">
                    </div>
                    <div class="form-group">
                      <label>Center Address</label>
                      <textarea required="" name="c_address" type="text" class="form-control form-control-sm" placeholder="Centre Address"> <?php if ($action === "editclient") {
                                                                                                                                              echo $editClient['caddress'];
                                                                                                                                            } else {
                                                                                                                                              echo $c_address;
                                                                                                                                            } ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Landmark </label>
                      <input required="" name="c_land_mark" type="text" value="<?php if ($action === "editclient") {
                                                                                  echo $editClient['landmark'];
                                                                                } else {
                                                                                  echo $c_land_mark;
                                                                                } ?>" class="form-control form-control-sm" placeholder="Nearest Landmark">
                    </div>
                    <div class="form-group">
                      <label>City/Village</label>
                      <input required="" name="c_city" type="text" value="<?php if ($action === "editclient") {
                                                                            echo $editClient['ccity'];
                                                                          } else {
                                                                            echo $c_city;
                                                                          } ?>" class="form-control form-control-sm" placeholder="City/Village">
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label>State</label>
                        <select required="" id="listBox" onchange='selct_district(this.value, "secondlist")' name="c_state" type="text" class="form-control form-control-sm" placeholder="State">
                          <option value="<?php if ($action === "editclient") {
                                            echo $editClient['cstate'];
                                          } else {
                                            echo $c_state;
                                          } ?>"> <?php if ($action === "editclient") {
                                                    echo $editClient['cstate'];
                                                  } else {
                                                    echo $c_state;
                                                  } ?></option>
                        </select>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>District</label>
                        <select required="" id='secondlist' name="c_district" type="text" class="form-control form-control-sm" placeholder="District">
                          <option value="<?php if ($action === "editclient") {
                                            echo $editClient['cdistrict'];
                                          } else {
                                            echo $c_district;
                                          } ?>"> <?php if ($action === "editclient") {
                                                    echo $editClient['cdistrict'];
                                                  } else {
                                                    echo $c_district;
                                                  } ?></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email ID </label>
                      <input required="" name="c_email" type="email" value="<?php if ($action === "editclient") {
                                                                              echo $editClient['cemail'];
                                                                            } else {
                                                                              echo $c_email;
                                                                            } ?>" class="form-control form-control-sm" placeholder="example@mail.com">
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label>Contact No. </label>
                        <input required="" name="c_mobile" pattern="[0-9]{10}" maxlength="10" type="text" value="<?php if ($action === "editclient") {
                                                                                                                    echo $editClient['cmobile'];
                                                                                                                  } else {
                                                                                                                    echo $c_mobile;
                                                                                                                  } ?>" class="form-control form-control-sm" placeholder="">
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Pin Code</label>
                        <input required="" name="c_pin_code" pattern="[0-9]{6}" maxlength="6" type="text" value="<?php if ($action === "editclient") {
                                                                                                                    echo $editClient['cpin'];
                                                                                                                  } else {
                                                                                                                    echo $c_pin_code;
                                                                                                                  } ?>" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Attachments</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="custom-file-sm custom-file col-sm-9">
                    <input hidden="true" name="h_photo" value="<?php echo $editClient['hphoto']; ?>">
                    <input type="file" name="hphoto" class="custom-file-input" data-multiple-caption="{count} files selected" multiple onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" <?php if ($action === "addstudent") {
                                                                                                                                                                                                                                      printf('required=""');
                                                                                                                                                                                                                                    } ?> />
                    <label class="custom-file-label" for="customFile">Center Head Photo</label>
                  </div>
                  <div class="col-sm-3 ">
                    <img id="image" class=" ml-3 img-circle elevation-2" alt="Adhar image" src="<?php if ($action === "editclient") {
                                                                                                  echo CLIENT_IMAGE . $editClient['hphoto'];
                                                                                                } else {
                                                                                                  echo "https://eskilldevelopment.com/images/team/user-01.png";
                                                                                                } ?>" width="107" height="107" onerror="this.style.display='none'" />
                  </div>
                </div>
                <div class="row">
                  <div class="custom-file-sm custom-file col-sm-9">
                    <input hidden="true" name="in_photo" value="<?php echo $editClient['inphoto']; ?>">
                    <input type="file" name="inphoto" class="custom-file-input" data-multiple-caption="{count} files selected" multiple onchange="document.getElementById('inphoto').src = window.URL.createObjectURL(this.files[0])" <?php if ($action === "addstudent") {
                                                                                                                                                                                                                                        printf('required=""');
                                                                                                                                                                                                                                      } ?> />
                    <label class="custom-file-label" for="customFile">Center Interior Photo</label>
                  </div>
                  <div class="col-sm-3 ">
                    <img id="inphoto" alt="Signature image" src="<?php if ($action === "editclient") {
                                                                    echo CLIENT_IMAGE . $editClient['inphoto'];
                                                                  } else {
                                                                    echo "https://eskilldevelopment.com/images/services/interior-design.jpg";
                                                                  } ?>" width="180" height="107" class="m-3" />
                  </div>
                </div>
                <div class="row">
                  <div class="custom-file-sm custom-file col-sm-9">
                    <input hidden="true" name="ex_photo" value="<?php echo $editClient['exphoto']; ?>">
                    <input type="file" name="exphoto" class="custom-file-input" data-multiple-caption="{count} files selected" multiple onchange="document.getElementById('exphoto').src = window.URL.createObjectURL(this.files[0])" <?php if ($action === "addstudent") {
                                                                                                                                                                                                                                        printf('required=""');
                                                                                                                                                                                                                                      } ?> />
                    <label class="custom-file-label" for="customFile">Center Exterior Photo</label>
                  </div>
                  <div class="col-sm-3 ">
                    <img id="exphoto" class="ml-3" alt="Qualification image" src="<?php if ($action === "editclient") {
                                                                                    echo CLIENT_IMAGE . $editClient['exphoto'];
                                                                                  } else {
                                                                                    echo "https://eskilldevelopment.com/images/services/exterior-design.jpg";
                                                                                  } ?>" width="180" height="107" />
                  </div>
                </div>
              </div>
            </div>
            <button name="upload_marks" class="btn btn-primary" value="confirm" type="submit">Submit <i class="fa fa-arrow-circle-right"></i></button>
            <button name="reset" class="btn btn-danger float-right" type="reset">Reset <i class="fa fa-trash"></i></button>
          </div>

          </form>
        </div>
      <?php endif;
      if (($action === "viewclient" || $action === "approveclient") && $id == "") :   $z = 0; ?>

        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">All Approved Clients</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <?php if (is_array($viewClient)) {
              if (count($viewClient) > 0) { ?>
                <table id="filterTable" class="table table-bordered table-hover text-center text-wrap p-0">
                  <thead>
                    <tr>
                      <th> Sr </th>
                      <th> Client ID </th>
                      <th> Name </th>
                      <th> Conatact </th>
                      <th> Email Password </th>
                      <th> D.O.C. Applied </th>
                      <th> <?php echo ($action === 'approveclient') ? 'Approve Center' : 'Client Status'; ?> </th>
                    </tr>
                  </thead>
                  <?php 
                  foreach ($viewClient as $row) { $image = file_exists(!CLIENT_IMAGE . $row['cphoto']) ? CLIENT_IMAGE . $row['hphoto']  : USER_IMAGE;
                    echo '<tr>
        <td>
        ' . ++$z . '
        </td>
        <td class="px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-3"><img
                                                                src="' . $image .'"
                                                                alt="user" class="rounded-circle" width="45"
                                                                height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">' . case_name($row['name']) . '</h5>
                                                            <span class="text-muted font-14">' . $row['cid'] . '</span>
                                                        </div>
                                                    </div>
        </td>
        <td>  ' . case_name($row['name']) . ' </td>
<td> ' . date('d-M-y h:i:s a', strtotime($row['entry_date'])) . ' </td>
<td> <b>'. $row['contact'] . ' </b></td>
<td> ' . $row['email'] . '<br><b>' . $row['passcode'] . '</b></td>
<td>
' . ($row['status'] == 0 ? "<a href='?pid=2&action=approveclient&id=" . $row['cid'] . "' target='_self' class='btn btn-sm btn-info' >Approve </a>" : "<label class='badge badge-success'>Approved </label> <a href='?pid=2&action=editclient&id=" . $row['cid'] . "' target='_self' class='fas fa-edit text-info ml-2' > </a>") . '
</td>';
                  }
                  ?>
                </table>
          </div>
        </div>

    <?php }
            } else {
              echo '<h3> No Client Found For the Approving </h3>';
            } ?>
    <!-- /.card-body -->
    </div>
  <?php endif;
      if ($action === 'assignpermission') : //array_print($fr_options);
  ?>

    <form role="form" method="post" action="" name="permission_assign">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Assign Permission For </h3>
          <h3 class="card-title float-right select2-danger">
            <select onchange="$('form').submit()" name="client" class="form-control form-control-sm select2" multiple="multiple" data-placeholder="Select centre">
              <option value="<?php echo $client != '' ? $client : ''; ?>">Select Client</option> <?php echo $fr_options; ?>
            </select>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!-- form start -->
          <div class="row">
            <!-- left column -->
            <div class="col-md-3">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Student Section</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='addstudent' <?php echo in_array('p_1', $per_array) ? 'checked' : ''; ?> value='p_1' class="custom-control-input" id="studentsection3">
                      <label class="custom-control-label" for="studentsection3">Add Students</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='viewstudent' <?php echo in_array('p_2', $per_array) ? 'checked' : ''; ?> value='p_2' class="custom-control-input" id="studentsection2">
                      <label class="custom-control-label" for="studentsection2">View Students</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='editstudent' <?php echo in_array('p_3', $per_array) ? 'checked' : ''; ?> value='p_3' class="custom-control-input" id="studentsection1">
                      <label class="custom-control-label" for="studentsection1">Edit Students</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-3">
              <!-- general form elements -->
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Trasactions Section</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='payfee' <?php echo in_array('p_4', $per_array) ? 'checked' : ''; ?> value='p_4' class="custom-control-input" id="trasactionsection3">
                      <label class="custom-control-label" for="trasactionsection3">Pay Fee</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='viewpassbook' <?php echo in_array('p_5', $per_array) ? 'checked' : ''; ?> value='p_5' class="custom-control-input" id="trasactionsection2">
                      <label class="custom-control-label" for="trasactionsection2">View Passbook</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='createissue' <?php echo in_array('p_6', $per_array) ? 'checked' : ''; ?> value='p_6' class="custom-control-input" id="trasactionsection1">
                      <label class="custom-control-label" for="trasactionsection1">Create Issue</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-3">
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Wallet Section</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='addmoney' <?php echo in_array('p_7', $per_array) ? 'checked' : ''; ?> value='p_7' class="custom-control-input" id="walletsection3">
                      <label class="custom-control-label" for="walletsection3">Add Money</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='viewwallet' <?php echo in_array('p_8', $per_array) ? 'checked' : ''; ?> value='p_8' class="custom-control-input" id="walletsection2">
                      <label class="custom-control-label" for="walletsection2">View Wallet</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='inline' <?php echo in_array('p_9', $per_array) ? 'checked' : ''; ?> value='p_9' class="custom-control-input" id="walletsection1">
                      <label class="custom-control-label" for="walletsection1">Inline</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-3">
              <!-- general form elements -->
              <div class="card card-olive">
                <div class="card-header">
                  <h3 class="card-title">Download Section</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='addmission' <?php echo in_array('p_10', $per_array) ? 'checked' : ''; ?> value='p_10' class="custom-control-input" id="downloadsection3">
                      <label class="custom-control-label" for="downloadsection3">Addmission Form</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='identitycard' <?php echo in_array('p_11', $per_array) ? 'checked' : ''; ?> value='p_11' class="custom-control-input" id="downloadsection2">
                      <label class="custom-control-label" for="downloadsection2">Identity Card</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                      <input type="checkbox" name='syllabus' <?php echo in_array('p_12', $per_array) ? 'checked' : ''; ?> value='p_12' class="custom-control-input" id="downloadsection1">
                      <label class="custom-control-label" for="downloadsection1">Syllabus</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" name="permissions" value="assigning" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger float-right">Reset</button>
        </div>
      </div>
    </form> <?php endif; ?>


  <!-- page-wrapper ends -->
  </div>
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