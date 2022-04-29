<?php
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    require_once(ROOT_PATH . '/includes/layout/sidebar.php');
    $sql = "SELECT borrower_id, resources_id, reservation_date, transaction.status as 'status', first_name, middle_name, last_name, title, barcode
            FROM transaction, borrowers, `library-resources`
            WHERE transaction.borrower_id = borrowers.id and transaction.resources_id = `library-resources`.`barcode` and transaction.status = 'For Pickup'";
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
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="qty">Borrower</th>
                                                <th data-field="author">Date Borrow</th>
                                                <th data-field="type">Status</th>
                                                <th data-field="">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              if (mysqli_num_rows($result) > 0) {
                                                $i=0;
                                                    while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["barcode"]; ?></td>
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ; ?></td>
                                                <td><?php echo $row["reservation_date"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                <?php $barcode = $row['barcode']; ?>
                                                <td>
                                                    <button type="submit" class="media" style="background: #567ee2; padding: 5px 10px; border-radius: 3px; outilne: none; border: none; color: white;">
                                                    <a href="#" data-toggle="modal" data-target="#deletemodal">Release</a></button>
                                                </td>
                                                </form>
                                                
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
                </div>
            </div>
        </div>
        <!-- Delete modal Section Start -->
        <div id="deletemodal" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header header-color-modal bg-color-4">
                                      
                                      <div class="modal-close-area modal-close-df">
                                          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                      </div>
                                  </div>
                                  <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/to-release.php">
                                  <div class="modal-body">
                                      <input type="hidden" id="db_barcode" name="barcode" class="form-control" value="<?php echo $barcode ?>">
                                      <p style="font-size: 24px; font-weight: 600;">Click release to proceed</span></p><br/>
                                      <i>The process cannot be undone </i>
                                  </div>
                                  <div class="modal-footer danger-md">
                                      <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                      <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-danger" type="submit" name="btn_release" id="delete">Release</button>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    <!-- Delete modal Section end -->
        <!-- Static Table End -->
<script type="text/javascript">
  $('.select2').select2({});
</script>


<?php
    require_once(ROOT_PATH . '/includes/layout/footer.php');
?> 