<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark">
                        Login
                    </div>
                    <div class="card-body">
                        <?php if($this->session->flashdata("user_registered")):?>
                            <div class="alert alert-success"><?=$this->session->flashdata("user_registered")?></div>
                        <?php endif; ?>
                        <?=validation_errors('<div class="alert alert-danger">', '</div>')?>
                        <form action="<?=base_url()?>users/login" method="POST">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address.." required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <div class="card-footer">
                       Don't have an account? Register <a href="<?=base_url()?>users/register">here</a>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3"></div>        
        </div>
    </div>
</div>



