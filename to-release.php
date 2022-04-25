<?php
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    require_once(ROOT_PATH . '/includes/layout/sidebar.php');
    $sql = "SELECT borrower_id, resources_id, reservation_date, transaction.status as 'status', first_name, middle_name, last_name, title
            FROM transaction, borrowers, `library-resources`
            WHERE transaction.borrower_id = borrowers.id and transaction.resources_id = `library-resources`.`barcode`";
    $result = mysqli_query($db, $sql);
?>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-12">
                                        <h1>To Release Library Resources</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="title">Title</th>
                                                <th data-field="qty">Borrower</th>
                                                <th data-field="author">Date Borrowed</th>
                                                <th data-field="type">Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              if (mysqli_num_rows($result) > 0) {
                                                $i=0;
                                                    while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ; ?></td>
                                                <td><?php echo $row["reservation_date"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                
                                            </tr>
                                            <?php
                                                $i++;
                                                    }
                                                }else{
                                                    echo "<tr>";
                                                    echo "<td>No result found</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- Assign Modal Section Start -->
                      <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Add New Book</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/add-books.php">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm12 col-xs-12">
                                          <?php
                                            $sql = "SELECT first_name FROM borrowers";
                                            $result = $db->query($sql);
                                          ?>
                                            <div class="form-group">
                                              <label >Borrower's Name</label>
                                              <select class="select2 form-control" data-rel="chosen" style="width: 100%;"  name="degree_id" id="selectError">
                                                <option disabled selected>-- Search student name --</option>
                                                    <?php 
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option>".$row["first_name"]."</option>";
                                                        }
                                                    ?>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                            <?php
                                                $lsql = "SELECT * FROM `library-resources` GROUP by title, category;";
                                                $results = $db->query($lsql);
                                            ?>
                                              <label >Resources Name</label>
                                              <select class="select2 form-control" data-rel="chosen" style="width: 100%;"  name="degree_id" id="selectError">
                                                <option disabled selected>-- Search Library Resources Name --</option>
                                                    <?php 
                                                        while ($row = $results->fetch_assoc()) {
                                                            echo "<option>".$row["title"]." (".$row["category"].") "."</option>";
                                                        }
                                                    ?>
                                              </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="">Proceed</a>
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Assign Modal Section end -->
                </div>
            </div>
        </div>
        <!-- Static Table End -->
<script type="text/javascript">
  $('.select2').select2({});
</script>


<?php
    require_once(ROOT_PATH . '/includes/layout/footer.php');
?> 