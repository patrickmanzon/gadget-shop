<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><?=$title?></li>
        </ol>
        <div class="row">
        <div class="col-12">
            <?php 
            if($this->session->flashdata()):
                foreach($this->session->flashdata() as $message):
                    echo '<p class="alert alert-success">'.$message.'</p>';
                endforeach;
            endif; 
            ?>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>                        
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $prod): ?>
                        <tr>
                            <td><?=$prod->prod_name?></td>
                            <td><?=$prod->cat_name?></td>
                            <td><?=$prod->brand_name?></td>
                            <td><?=$prod->prod_stock?></td>
                            <td><?=$prod->prod_price?></td>
                            <td>
                                <a href="<?=base_url();?>admin/products/edit/<?=$prod->prod_id?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger delete_item" data-location="<?=base_url()?>products/delete/<?=$prod->prod_id?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
        </div>
    </div>
</div>

