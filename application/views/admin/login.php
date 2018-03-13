
      <div class="container">
            <div class="col-md-5 col-md-offset-6 login">
                <form id="login_form" method="post">
                    <h1 class="text-center">Log in</h1>
                    <div class="alert alert-dismissible alert-light" id="loginresponse" style="display: none;"></div>
                  
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <input type="submit" name="login" id="login" class="btn btn-primary btn-block" value="Login">
                    <input type="button" data-toggle="modal" data-target="#modalSignup" class="btn btn-success btn-block" value="Sign Up">
                </form>
            </div>
      </div>

<input type="hidden" name="url" id="url" value="<?php echo base_url()?>">

<script type="text/javascript" src="<?php echo base_url()?>assets/js/admin.js"></script>