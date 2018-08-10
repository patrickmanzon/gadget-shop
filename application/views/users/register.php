<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark">
                        Register
                    </div>
                    <div class="card-body">
                        <?=validation_errors('<div class="alert alert-danger">', '</div>')?>
                        <form action="<?=base_url()?>users/register" method="POST">
                            <div class="form-group">
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name..">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name..">
                            </div>
                            <div class="form-group">
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact Number..">
                            </div>
                            <div class="form-group">
                               <textarea name="address" id="" rows="2" placeholder="Full Address(City/Municipality/Barangay/Street/House No).." class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address..">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        have an account already? Login <a href="<?=base_url()?>users/login">here</a>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3"></div>        
        </div>
    </div>
</div>



