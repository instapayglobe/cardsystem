<?php if ($action === 'admission_form' || $action === 'identity_card') : $z = 0; ?>
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
              <li class="breadcrumb-item active">Forms</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>

    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">All Student List For Download</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive ">
          <table id="filterTable" class="table table-bordered table-hover text-center text-nowrap ">
            <thead>
              <tr>
                <th> Sr </th>
                <th> Student ID </th>
                <th> Course Name </th>
                <th> Contact No </th> <?php if ($action === 'admission_form') {
                                        echo '<th> Form </th>';
                                      } ?><?php if ($action === 'identity_card') {
                                            echo '<th> Card </th>';
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
        <div class="d-flex no-block align-items-center p-0">
            <div class="mr-3"><img src="' . STUDENT_IMAGE . $row['student_photo'] . '" alt="user" class="rounded-circle" width="45" height="45" /> </div>
            <div class="">
                <h5 class="text-dark mb-0 font-16 font-weight-medium">' . case_name($row['name']) . '</h5>
                <span class="text-muted font-14">' . $row['father_name'] . '</span>
            </div>
        </div>
</td>
        <td>  ' . case_name($row['course']) . '<br> <b> ' . formatDateCalender($row['adate'], 'd-M-y') . ' To ' . formatDateCalender($row['edate'], 'd-M-y') . ' </b> </td>
<td> ' . $row['contact'] . '/' . $row['aphone'] . ' </td>';
              if ($action === 'admission_form') {
                echo '<td>
    <form method="POST" action="?pid=4&action=admission_form" ><input type="hidden" name="download" value="form" /> <input type="hidden"  name="student_id" value=' . $row['sid'] . ' /> <button type="submit" class="btn btn-sm btn-inverse-primary"> <i class="fas fa-download text-success" ></i> </button> </form>
    </td></tr>';
              }
              if ($action === 'identity_card') {
                echo '<td> <form method="POST" action="?pid=4&action=identity_card" ><input type="hidden" name="download" value="card" /> <input type="hidden"  name="student_id" value=' . $row['sid'] . ' /> <button type="submit" class="btn btn-sm btn-inverse-primary" value="Download"> <i class="fas fa-download text-success" ></i> </button> </form>
    </td></tr>';
              }
            }
            ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    <?php endif ?>
    </div>
  </div>