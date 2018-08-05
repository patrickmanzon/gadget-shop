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
                    <?=form_open_multipart('admin/products/edit/'.$prod->prod_id) ?>
                        <div class="form-group">
                            <label for="prod_name">Product Name:</label>
                            <input type="text" name="prod_name" class="form-control" id="prod_name" value="<?=$prod->prod_name?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" id="category" class="custom-select">
                            <option value="<?=$category->cat_id?>"><?=$category->cat_name?></option>
                            <?php foreach($categories as $cat): ?> 
                                <?php if($cat->cat_id !== $category->cat_id): ?>   
                                    <option value="<?=$cat->cat_id?>"><?=$cat->cat_name?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand:</label>
                            <select name="brand" id="brand" class="custom-select">
                            <option value="<?=$brand->brand_id?>"><?=$brand->brand_name?></option>                        
                            <?php foreach($brands as $brnd): ?>   
                                <?php if($brand->brand_id !== $brnd->brand_id): ?> 
                                    <option value="<?=$brnd->brand_id?>"><?=$brnd->brand_name?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stocks:</label>
                            <input type="number" name="stock" class="form-control" id="stock" value="<?=$prod->prod_stock?>">
                        </div>
                        <div class="form-group">
                            <label for="prod_price">Price:</label>
                            <input type="number" name="prod_price" class="form-control" id="prod_price" value="<?=$prod->prod_price?>">
                        </div>
                        <div class="form-group">
                            <label for="prod_image">Image:</label>
                            <input type="file" name="userfile" class="form-control" id="prod_image">
                        </div>
                        <div class="form-group">
                            <label for="prod_desc">Description:</label>
                            <textarea name="prod_desc" class="form-control" id="prod_desc"><?=$prod->prod_desc?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Edit Product">
                    <?=form_close() ?>
                </div>
                <div class="col-2"></div>
            </div>
            <hr>
        </div>
    </div>
</div>

