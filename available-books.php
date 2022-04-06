<?php
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    require_once(ROOT_PATH . '/includes/layout/sidebar.php');

    $sql = "select COUNT(title) as 'total', title, category FROM `library-resources` GROUP BY title, category order by 3";
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
                                        <h1>Available Library Resources</h1>
                                    </div>
                                    <a class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Assign</a>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                                          <option value="" disabled selected>Select Library Resources Category</option>
                                          <option value="">Audio Visual</option>
                                          <option value="">Books</option>
                                          <option value="">Dissertation</option>
                                          <option value="">Government Publications</option>
                                          <option value="">Journals</option>
                                          <option value="">Manuscript</option>
                                          <option value="">Narrative</option>
                                          <option value="">Thesis</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="class">Class Number</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="qty">Quantity</th>
                                                <th data-field="author">Author</th>
                                                <th data-field="type">Type</th>
                                                <th data-field="edition">Edition</th>
                                                <th data-field="publisher">Publisher</th>
                                                <th data-field="volume">Volume</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              if (mysqli_num_rows($result) > 0) {
                                              $i=0;
                                              while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["total"]; ?></td>
                                                <td><?php echo $row["category"]; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                  <div style="display: flex;">
                                                  <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  
                                                  
                                                  </div>
                                                </td>
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
                    <!-- Add Modal Section Start -->
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
                                              <label >Edition</label>
                                              <input name="edition" type="text" class="form-control" placeholder="Edition" required>
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
                    <!-- Add Modal Section end -->
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