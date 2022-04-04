<?php
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    require_once(ROOT_PATH . '/includes/layout/sidebar.php');

    $sql = "SELECT `library-resources`.`id`, `library-resources`.title, `library-resources`.`barcode`, author, course, `year` FROM `library-resources`, `manuscript` WHERE `library-resources`.`barcode` = `manuscript`.`barcode` order by 1";
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
                                    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-12">
                                        <h1>Manuscript/Narrative</h1>
                                    </div>
                                    <a class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add New</a>
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
                                                <th data-field="id">ID</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="author">Author</th>
                                                <th data-field="course">Course</th>
                                                <th data-field="year">Year</th>
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
                                                <td><?php echo $row["barcode"]; ?></td>
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["author"]; ?></td>
                                                <td><?php echo $row["course"]; ?></td>
                                                <td><?php echo $row["year"]; ?></td>
                                                <td>
                                                  <div style="display: flex;">
                                                  <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  <a href="#" data-toggle="modal" data-target="#PrimaryModalalert2" style="background: #00bbff">
                                                    <i class="fa fa-pencil-square-o editManuscript" 
                                                      data-id="<?php echo $row["id"]; ?>"
                                                      data-barcode="<?php echo $row['barcode']; ?>"
                                                      data-title="<?php echo $row["title"]; ?>"
                                                      data-author="<?php echo $row["author"]; ?>"
                                                      data-course="<?php echo $row["course"]; ?>"
                                                      data-year="<?php echo $row["year"]; ?>">
                                                    </i>
                                                  </a>
                                                  <a href="#" data-toggle="modal" data-target="#DangerModalhdbgcl" style="background: #ff0000">
                                                    <i class="fa fa-trash-o deleteManuscript" 
                                                      data-dm_barcode="<?php echo $row["barcode"]; ?>"
                                                      data-dm_title="<?php echo $row["title"]; ?>">
                                                    </i>
                                                  </a>
                                                  </div>
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
                    <!-- Add Modal Section Start -->
                      <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Add New Audio Visual Material</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/add-manuscript.php">
                                      <div class="modal-body">
                                            <div class="form-group">
                                              <label >Title</label>
                                              <input name="title" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Author/s</label>
                                              <input name="author" type="text" class="form-control" placeholder="Author" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Course</label>
                                              <input name="course" type="text" class="form-control" placeholder="Course" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Year</label>
                                              <input name="year" type="number" class="form-control" placeholder="Year" required>
                                            </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="addManuscriptBtn">Proceed</a>
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
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/edit-manuscript.php">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" id="id" name="id" class="form-control" required>
                                          <div class="form-group">
                                            <label >Barcode ID</label>
                                            <input name="barcode" id="barcode" type="text" class="form-control" placeholder="Barcode ID" disabled>
                                          </div>
                                            <div class="form-group">
                                                <label >Title</label>
                                                <input name="title" id="title" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Author/s</label>
                                                <input name="author" id="author" type="text" class="form-control" placeholder="Author" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Course</label>
                                                <input name="course" id="course" type="text" class="form-control" placeholder="Course" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Year</label>
                                                <input name="year" id="year" type="text" class="form-control" placeholder="Year" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                            <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="editManuscriptBtn">Update</a>
                                        </div>
                                    </form>
                                  </div>
                              </div>
                           </div>
                        </div>
                    <!-- edit modal Section end -->
                    <!-- Delete modal Section Start -->
                      <div id="DangerModalhdbgcl" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
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
                                      <input type="hidden" id="dm_barcode" name="dm_barcode" class="form-control">
                                      <p style="font-size: 24px; font-weight: 600;">Are you sure to delete the record of <span id="dm_title"></span></p><br/>
                                      <i>The process cannot be undone </i>
                                  </div>
                                  <div class="modal-footer danger-md">
                                      <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                      <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-danger" type="submit" name="deleteManuscriptBtn" id="delete">Delete</button>
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
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Hosted by MVSoftech Inc.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
    ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
    ============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- ajax JS
		============================================ -->
    <script src="js/ajax.js"></script>
    <!-- pdf JS
		============================================ -->
    <script src="js/pdf/jquery.media.js"></script>
    <script src="js/pdf/pdf-active.js"></script>

</body>

</html>