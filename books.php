<?php
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    require_once(ROOT_PATH . '/includes/layout/sidebar.php');

    $sql = "SELECT `library-resources`.`id`, `library-resources`.title, `library-resources`.`barcode`, edition, volume, author, publisher, class, pages, remarks, date_received, year, cash_price, sof FROM `library-resources`, books WHERE `library-resources`.`barcode` = books.barcode order by 1";
    $result = mysqli_query($db, $sql);
 ?>
    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <h1>Books</h1>
                                    </div>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalertedit"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Import</a>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add New</a>
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
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="class">Class Number</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="edition">Edition</th>
                                                <th data-field="volume">Volume</th>
                                                <th data-field="Author">Author</th>
                                                <th data-field="publisher">Publisher</th>
                                                <th data-field="pages">Pages</th>
                                                <th data-field="date-receive">Date Received</th>
                                                <th data-field="year">Year</th>
                                                <th data-field="price">Cash Price</th>
                                                <th data-field="soc">Source of Fund</th>
                                                <th data-field="remarks">Remarks</th>
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
                                                <td><?php echo $row["class"]; ?></td>
                                                <td><?php echo $row["barcode"]; ?></td>
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["edition"]; ?></td>
                                                <td><?php echo $row["volume"]; ?></td>
                                                <td><?php echo $row["author"]; ?></td>
                                                <td><?php echo $row["publisher"]; ?></td>
                                                <td><?php echo $row["pages"]; ?></td>
                                                <td><?php echo $row["date_received"]; ?></td>
                                                <td><?php echo $row["year"]; ?></td>
                                                <td><?php echo $row["cash_price"]; ?></td>
                                                <td><?php echo $row["sof"]; ?></td>
                                                <td><?php echo $row["remarks"]; ?></td>
                                                <td>
                                                  <div style="display: flex;">
                                                  <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  <a href="#" data-toggle="modal" data-target="#PrimaryModalalert2" style="background: #00bbff">
                                                    <i class="fa fa-pencil-square-o editBook" 
                                                      data-barcode="<?php echo $row['barcode']; ?>"
                                                      data-title="<?php echo $row["title"]; ?>"
                                                      data-edition="<?php echo $row["edition"]; ?>"
                                                      data-volume="<?php echo $row["volume"]; ?>"
                                                      data-author="<?php echo $row["author"]; ?>"
                                                      data-publisher="<?php echo $row["publisher"]; ?>"
                                                      data-b_class="<?php echo $row["class"]; ?>"
                                                      data-pages="<?php echo $row["pages"]; ?>"
                                                      data-date_received="<?php echo $row["date_received"]; ?>"
                                                      data-year="<?php echo $row["year"]; ?>"
                                                      data-cash_price="<?php echo $row["cash_price"]; ?>"
                                                      data-sof="<?php echo $row["sof"]; ?>"
                                                      data-remarks="<?php echo $row["remarks"]; ?>">
                                                    </i>
                                                  </a>
                                                  <a href="#" data-toggle="modal" data-target="#deletemodal" style="background: #ff0000">
                                                    <i class="fa fa-trash-o deleteBook" 
                                                      data-db_barcode="<?php echo $row["barcode"]; ?>"
                                                      data-db_title="<?php echo $row["title"]; ?>">
                                                    </i>
                                                  </a>
                                                  </div>
                                                </td>
                                            </tr>
                                            <?php
                                                $i++;
                                                    }
                                                }else{
                                                    echo "<td>No result</td>";
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
                                        <div class="col-lg-6 cold-md-6 col-sm6 col-xs-12">
                                            <div class="form-group">
                                              <label >Title</label>
                                              <input name="title" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Edition</label>
                                              <input name="edition" type="text" class="form-control" placeholder="Edition">
                                            </div>
                                            <div class="form-group">
                                              <label >Volume</label>
                                              <input name="volume" type="text" class="form-control" placeholder="Volume">
                                            </div>
                                            <div class="form-group">
                                              <label >Author</label>
                                              <input name="author" type="text" class="form-control" placeholder="Author">
                                            </div>
                                            <div class="form-group">
                                              <label >Publisher</label>
                                              <input name="publisher" type="text" class="form-control" placeholder="Publisher" >
                                            </div>
                                            <div class="form-group">
                                              <label >Class</label>
                                              <input name="class" type="text" class="form-control" placeholder="Class" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm12 col-xs-12">
                                            <div class="form-group">
                                              <label >Pages</label>
                                              <input name="pages" type="number" class="form-control" placeholder="Pages" >
                                            </div>
                                            <div class="form-group" id="date">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="date_received" class="form-control" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label >Year</label>
                                              <input name="year" type="text" class="form-control" placeholder="Year">
                                            </div>
                                            <div class="form-group">
                                              <label >Cash Price</label>
                                              <input name="cash_price" type="number" class="form-control" placeholder="Cash Price">
                                            </div>
                                            <div class="form-group">
                                              <label >Source of Fund</label>
                                              <input name="sof" type="text" class="form-control" placeholder="Source of Fund">
                                            </div>
                                            <div class="form-group">
                                              <label >Remarks</label>
                                              <input name="remarks" type="text" class="form-control" placeholder="Remarks">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="add_books_btn">Add Book</a>
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Add Modal Section end -->
                    <!-- Edit Modal Section Start -->
                    <div id="PrimaryModalalert2" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Edit Book</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/edit-books.php">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" id="id" name="id" class="form-control" required>
                                          <div class="form-group">
                                            <label >Barcode ID</label>
                                            <input name="barcode" id="barcode" type="text" class="form-control" placeholder="Barcode ID" disabled>
                                          </div>
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm6 col-xs-12">
                                            <div class="form-group">
                                              <label >Title</label>
                                              <input name="title" id="title" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Edition</label>
                                              <input name="edition" id="edition" type="text" class="form-control" placeholder="Edition" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Volume</label>
                                              <input name="volume" id="volume" type="text" class="form-control" placeholder="Volume" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Author</label>
                                              <input name="author" id="author" type="text" class="form-control" placeholder="Author" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Publisher</label>
                                              <input name="publisher" id="publisher" type="text" class="form-control" placeholder="Publisher" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Class</label>
                                              <input name="class" id="class" type="text" class="form-control" placeholder="Class" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm12 col-xs-12">
                                            <div class="form-group">
                                              <label >Pages</label>
                                              <input name="pages" id="pages" type="number" class="form-control" placeholder="Pages" required>
                                            </div>
                                            <div class="form-group" id="data_3">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" id="date_received" name="date_received" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label >Year</label>
                                              <input name="year" id="year" type="text" class="form-control" placeholder="Year" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Cash Price</label>
                                              <input name="cash_price" id="cash_price" type="number" class="form-control" placeholder="Cash Price">
                                            </div>
                                            <div class="form-group">
                                              <label >Source of Fund</label>
                                              <input name="sof" type="text" id="sof" class="form-control" placeholder="Source of Fund">
                                            </div>
                                            <div class="form-group">
                                              <label >Remarks</label>
                                              <input name="remarks" id="remarks" type="text" class="form-control" placeholder="Remarks">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="edit_books_btn">Update</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- edit modal Section end -->

                    <!-- Import modal section start-->
                    <div id="PrimaryModalalertedit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-close-area modal-close-df">
                              <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                          </div>
                          <div class="modal-header header-color-modal bg-color-3">
                              <h4 class="modal-title">Import data from CSV</h4>
                              <div class="modal-close-area modal-close-df">
                                  <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                              </div>
                          </div>
                          <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/import-books.php">
                          <div class="modal-body">
                            <div class="col-lg-12 cold-md-12 col-sm12 col-xs-12">
                                <div class="form-group">
                                  <label >Select CSV File</label>
                                  <input name="file" type="file" class="form-control" required>
                                </div>
                            </div>   
                            <div class="modal-footer">
                                <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="import_books_btn">Proceed</a>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Import modal section start-->

                    <!-- Delete modal Section Start -->
                      <div id="deletemodal" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header header-color-modal bg-color-4">
                                      <h4 class="modal-title">Delete Record?</h4>
                                      <div class="modal-close-area modal-close-df">
                                          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                      </div>
                                  </div>
                                  <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="config.php">
                                  <div class="modal-body">
                                      <input type="hidden" id="db_barcode" name="db_barcode" class="form-control">
                                      <p style="font-size: 24px; font-weight: 600;">Are you sure to delete the record of the book <span id="db_title"></span></p><br/>
                                      <i>The process cannot be undone </i>
                                  </div>
                                  <div class="modal-footer danger-md">
                                      <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                      <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-danger" type="submit" name="deleteBooksBtn" id="delete">Delete</button>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    <!-- Delete modal Section end -->
                </div>
            </div>
        </div>
        <!-- Static Table End -->
<?php
    require_once(ROOT_PATH . '/includes/layout/footer.php');
?> 