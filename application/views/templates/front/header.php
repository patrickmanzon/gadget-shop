<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">    
    <!-- font-awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <!-- Amaran CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/amaran.min.css">    
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">    
    <title>GADGET</title>

</head>
<body class="animated fadeIn">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">GADGET</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url();?>shop">Home</span></a>
                    </li>
                </ul>
                
                <ul class="navbar-nav ml-auto">
                    <!-- <div class="form-inline">
                        <input class="form-control search-input" type="search" placeholder="SEARCH AND HIT ENTER" aria-label="Search">
                    </div> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>cart"><i class="fa fa-shopping-cart"></i> <span class="badge badge-danger total-cart-items">0</span></a>
                    </li>
                    <?php if(!$this->session->userdata("user_id")): ?>
                    <li class="nav-item">
                        <a href="<?=base_url()?>users/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url()?>users/register" class="btn btn-outline-success my-2 my-sm-0">Register</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Orders</a>
                            <a class="dropdown-item" href="#">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url()?>users/logout" class="nav-link">Logout</a>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>    
        </div>
    </nav>
