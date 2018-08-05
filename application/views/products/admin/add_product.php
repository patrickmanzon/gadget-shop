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
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <?php if($this->session->flashdata("item_added")):?>
                        <p class="alert alert-success">
                            <?=$this->session->flashdata("item_added")?>
                        </p>
                    <?php endif; ?>
                    <?=validation_errors("<div class='alert alert-danger'>", "</div>") ?>
                    <?=form_open_multipart('admin/products/add') ?>
                        <div class="form-group">
                            <label for="prod_name">Product Name:</label>
                            <input type="text" name="prod_name" class="form-control" id="prod_name">
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" id="category" class="custom-select">
                            <?php foreach($categories as $cat): ?>    
                                    <option value="<?=$cat->cat_id?>"><?=$cat->cat_name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand:</label>
                            <select name="brand" id="brand" class="custom-select">
                            <?php foreach($brands as $brand): ?>    
                                    <option value="<?=$brand->brand_id?>"><?=$brand->brand_name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stocks:</label>
                            <input type="number" name="stock" class="form-control" id="stock">
                        </div>
                        <div class="form-group">
                            <label for="prod_price">Price:</label>
                            <input type="number" name="prod_price" class="form-control" id="prod_price">
                        </div>
                        <div class="form-group">
                            <label for="prod_image">Image:</label>
                            <input type="file" name="userfile" class="form-control" id="prod_image">
                        </div>
                        <div class="form-group">
                            <label for="prod_desc">Description:</label>
                            <textarea name="prod_desc" class="form-control" id="prod_desc"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Add Product">
                    <?=form_close() ?>
                </div>
                <div class="col-2"></div>
            </div>
            <hr>
        </div>
    </div>
</div>

