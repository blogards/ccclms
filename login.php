<?php
    if ( ! defined( 'ROOT_PATH' ) ) {
      define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
    }
    include('config.php');
    require_once(ROOT_PATH . '/includes/layout/header.php');
    
 ?>
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <?php echo display_error(); ?>
                        <div class="text-center m-b-md custom-login">
                          <img src="img/CCC-logo.png"/>
                        </div>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="" name="email" id="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>
                            
                            <button class="btn btn-success btn-block loginbtn" type="submit" name="login_btn">Login</button>
                            <button class="btn btn-success btn-block" onclick="location.href='register.php'">Register</button>
                            <br />
                            <div class="d-flex" style="display:flex;">
                              <hr style="width:50%;"/><p style="margin:0 10px;">or</p><hr style="width:50%;"/>
                            </div><br/>
                            <button class="btn btn-success btn-block loginbtn" type="submit" name="guest_btn" style="background-color: #6d6d6d; border-style: none; border: 1px solid #6d6d6d">Login as a Guest</button>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2022. All rights reserved. Hosted by <a href="https://mvsoftech.ph/" target="_blank">MVSoftech Inc</a>.</p>
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
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>