<?php
    include('config.php');
    require_once(ABSPATH . 'includes/layout/header.php');
    require_once(ABSPATH . 'includes/layout/sidebar.php');

    $sql = "SELECT DISTINCT USERS.id, first_name, middle_name, last_name, email, contact, user_type, street, barangay, city, province, postal_code, status, profile_img 
    FROM USERS, BORROWERS WHERE borrowers.id = users.id and status = 'Approved' order by id";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
      
 ?>
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>List of Users</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                          <option value="">Export Basic</option>
                                          <option value="all">Export All</option>
                                          <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 school-year" id="toolbar">
                                        <select class="form-control dt-tb">
                                          <option value="">Export Basic</option>
                                          <option value="all">Export All</option>
                                          <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                <th data-field="name">Name</th>
                                                <th data-field="email">Email</th>
                                                <th data-field="contact">Phone</th>
                                                <th data-field="complete">User Type</th>
                                                <th data-field="task">Address</th>
                                                <th data-field="date">Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              $i=0;
                                              while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["first_name"]; echo " "; echo $row["middle_name"]; echo " "; echo $row["last_name"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td><?php echo $row["contact"]; ?></td>
                                                <td><?php echo $row["user_type"]; ?></td>
                                                <td><?php echo $row["street"]; echo " "; echo $row['barangay']; echo ", "; echo $row['city']; echo " "; echo $row['province']; echo " "; echo $row['postal_code']; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                <td>
                                                    <a href="add-user.php?id=<?php echo $row["id"]; ?>" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="edit-user.php?id=<?php echo $row["id"]; ?>" class="edit" style="background: #00bbff"><i class="fa fa-pencil-square-o update"></i></a>
                                                    <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row['id']; ?>" data-toggle="modal" style="background: #ff0000">
                                                        <i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" title="Delete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                $i++;
                                                    }
                                                }else{
                                                    echo "No result found";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
<?php
    require_once(ROOT_PATH . '/includes/layout/footer.php');
?> 