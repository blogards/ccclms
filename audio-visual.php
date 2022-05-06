<?php
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    require_once(ROOT_PATH . '/includes/layout/sidebar.php');

    $sql = "SELECT `library-resources`.`id`, `audio-visual`.title, `library-resources`.`barcode`, grade_level, subject, duration, copyright, date_received FROM `library-resources`, `audio-visual` WHERE `library-resources`.`barcode` = `audio-visual`.`barcode` order by 1";
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
                                    <div class="col-lg-10 col-md-19 col-sm-11 col-xs-12">
                                        <h1>Audio Visual Materials</h1>
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
                                                <th data-field="id">ID</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="grade">Grade Level</th>
                                                <th data-field="subject">Subject</th>
                                                <th data-field="duration">Duration</th>
                                                <th data-field="copyright">Copyright</th>
                                                <th data-field="date_received">Date Received</th>
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
                                                <td><?php echo $row["grade_level"]; ?></td>
                                                <td><?php echo $row["subject"]; ?></td>
                                                <td><?php echo $row["duration"]; ?></td>
                                                <td><?php echo $row["copyright"]; ?></td>
                                                <td><?php echo $row["date_received"]; ?></td>
                                                <td>
                                                  <div style="display: flex;">
                                                  <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  <a href="#" data-toggle="modal" data-target="#PrimaryModalalert2" style="background: #00bbff">
                                                    <i class="fa fa-pencil-square-o update" 
                                                      data-id="<?php echo $row["id"]; ?>"
                                                      data-barcode="<?php echo $row['barcode']; ?>"
                                                      data-title="<?php echo $row["title"]; ?>"
                                                      data-grade_level="<?php echo $row["grade_level"]; ?>"
                                                      data-subject="<?php echo $row["subject"]; ?>"
                                                      data-duration="<?php echo $row["duration"]; ?>"
                                                      data-copyright="<?php echo $row["copyright"]; ?>"
                                                      data-date_received="<?php echo $row["date_received"]; ?>">
                                                    </i>
                                                  </a>
                                                  <a href="#" data-toggle="modal" data-target="#DangerModalhdbgcl" style="background: #ff0000">
                                                    <i class="fa fa-trash-o deleteAudioVisual" 
                                                      data-da_barcode="<?php echo $row["barcode"]; ?>"
                                                      data-da_title="<?php echo $row["title"]; ?>">
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
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/add-audio-visual.php">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                              <label >Title</label>
                                              <input name="title" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Grade Level</label>
                                              <input name="grade_level" type="text" class="form-control" placeholder="Edition" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Subject</label>
                                              <input name="subject" type="text" class="form-control" placeholder="Volume" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Duration</label>
                                              <input name="duration" type="text" class="form-control" placeholder="Duration" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Copyright</label>
                                              <input name="copyright" type="text" class="form-control" placeholder="Publisher" required>
                                            </div>
                                            <div class="form-group" id="data_3">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="date_received" class="form-control" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="add_audio-visual_btn">Proceed</a>
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
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/edit-audio-visual.php">
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
                                                <label >Grade Level</label>
                                                <input name="grade_level" id="grade_level" type="text" class="form-control" placeholder="Grade Level" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Subject</label>
                                                <input name="subject" id="subject" type="text" class="form-control" placeholder="Subject" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Duration</label>
                                                <input name="duration" id="duration" type="text" class="form-control" placeholder="Author" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Copyright</label>
                                                <input name="copyright" id="copyright" type="text" class="form-control" placeholder="Publisher" required>
                                            </div>
                                            <div class="form-group" id="data_3">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" id="date_received" name="date_received" class="form-control" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="editAudioVisualBtn">Update</a>
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
                                <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="import_avm_btn">Proceed</a>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Import modal section start-->

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
                                      <input type="hidden" id="da_barcode" name="da_barcode" class="form-control">
                                      <p style="font-size: 24px; font-weight: 600;">Are you sure to delete the record of <span id="da_title"></span></p><br/>
                                      <i>The process cannot be undone </i>
                                  </div>
                                  <div class="modal-footer danger-md">
                                      <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                      <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-danger" type="submit" name="deleteAudioVisualBtn" id="delete">Delete</button>
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