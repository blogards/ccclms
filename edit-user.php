<?php
    /** Absolute path to the system directory. */
    if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
    }
    include_once(ABSPATH . '/includes/logic/edit-user-details.php');
    require_once(ABSPATH . '/includes/layout/header.php');
    require_once(ABSPATH . '/includes/layout/sidebar.php');
    echo display_error(); 
 ?>
    <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <!-- ROW Start -->
                            <div class="row">
                                <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/update-user-details.php">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <div class="cold-lg-5 col-md-5 col-sm-5">
                                                        <input type="hidden" id="id_u" name="id" class="form-control" value="<?php echo $user_id ?>" required>
                                                        <label >Profile Image</label>
                                                        <div class="form-group card-image pic-holder">
                                                            <input type="hidden" name="oldpic" value="<?php echo $profile_pic ?>"/>
                                                            <img id="profilePic" class="pic" src="img/profile/<?php echo $profile_pic ?>"/>
                                                            <label for="newProfilePhoto" id="uploadBtn" class="upload-file-block">
                                                            <div class="text-center">
                                                                <i class="fa fa-camera fa-2x"></i> Update <br /> Profile Picture
                                                            </div>
                                                            </label>
                                                            <Input class="ProfileInput" type="file" name="profileimg" id="newProfilePhoto"/>
                                                        </div>
                                                    </div>
                                                    
                                                <div class="cold-lg-7 col-md-7 col-sm-7">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>User Type</label>
                                                        <select name="user_type" style="color: #9b9b9b;" class="form-control">
                                                            <option value="none" selected="" disabled="">Select User Type</option>
                                                            <option <?php if($user_type == 'Admin'){echo("selected");}?> value="Admin">Admin</option>
                                                            <option <?php if($user_type == 'User'){echo("selected");}?> value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    
                                                
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <?php echo display_error(); ?>
                                                    <div class="form-group">
                                                        <label >First Name</label>
                                                        <input name="firstname" type="text" class="form-control" placeholder="First Name" value="<?php echo $firstname ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Middle Name</label>
                                                        <input name="middlename" type="text" class="form-control" placeholder="Middle Name" value="<?php echo $middlename ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input name="lastname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $lastname ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contact Number</label>
                                                        <input name="contact" type="text" class="form-control" placeholder="Mobile no." value="<?php echo $contact ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group" id='datetimepicker1'>
                                                    <label>Course</label>
                                                    <input name="course" id="course" type="text" class="form-control" placeholder="Course" value="<?php echo $course ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Year Level</label>   
                                                        <select name="year_level" style="color: #9b9b9b;" class="form-control">
                                                            <option value="none" selected="" disabled="">Select Year Level</option>
                                                            <option <?php if($year_level == '1st Year'){echo("selected");}?> value="1st Year">1st Year</option>
                                                            <option <?php if($year_level == '2nd Year'){echo("selected");}?> value="2nd Year">2nd Year</option>
                                                            <option <?php if($year_level == '3rd Year'){echo("selected");}?> value="3rd Year">3rd Year</option>
                                                            <option <?php if($year_level == '4th Year'){echo("selected");}?> value="4th Year">4th Year</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input name="street" type="text" class="form-control" placeholder="Street" value="<?php echo $street ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Barangay</label>
                                                    <input name="barangay" type="text" class="form-control" placeholder="Barangay" value="<?php echo $barangay ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>City/Municipality</label>
                                                    <input name="city" type="text" class="form-control" placeholder="City" value="<?php echo $city ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Province</label>
                                                    <input name="province" type="text" class="form-control" placeholder="Province" value="<?php echo $province ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input name="postal_code" type="text" class="form-control" placeholder="Postal Code" value="<?php echo $postal_code ?>">
                                                </div>
                                                <button type="submit" name="submit" id="submit" value="UPDATE" class="btn btn-primary waves-effect waves-light">Update</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                            <!-- ROW end --> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>

    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- profile pic JS
		============================================ -->
    <script src="js/profile-pic.js"></script>
</body>

</html>