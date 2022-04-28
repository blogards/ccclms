<?php
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    require_once(ROOT_PATH . '/includes/layout/sidebar.php');
    $sql = "SELECT borrower_id, resources_id, reservation_date, pickup_date, transaction.status as 'status', first_name, middle_name, last_name, title, barcode
            FROM transaction, borrowers, `library-resources`
            WHERE transaction.borrower_id = borrowers.id and transaction.resources_id = `library-resources`.`barcode` and transaction.status = 'Borrowed'";
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
                                        <h1>Borrowed Library Resources</h1>
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
                                                <th data-field="author">Borrowing Date</th>
                                                <th data-field="author">Pick up Date</th>
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
                                                <td><?php echo $row["pickup_date"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                <td></td>
                                                
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
        <!-- Static Table End -->
<script type="text/javascript">
  $('.select2').select2({});
</script>


<?php
    require_once(ROOT_PATH . '/includes/layout/footer.php');
?> 