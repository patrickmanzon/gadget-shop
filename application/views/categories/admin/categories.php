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
            <div class="col-4">
                <?=form_open("categories/add", ["id" => "edit_form"])?>
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block change-btn">Add Category</button>
                <?=form_close()?>
            </div>
            <div class="col-8">
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
                            <th>Category Name</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $cat): ?>
                            <tr>
                                <td><?=$cat->cat_name?></td>
                                <td>
                                    <a class="btn btn-primary edit_item" href="javascript:void(0)" data-input="<?=$cat->cat_name?>" data-edit="<?=base_url()?>categories/edit/<?=$cat->cat_id?>"><i class="fa fa-edit" ></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger delete_item" data-location="<?=base_url()?>categories/delete/<?=$cat->cat_id?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </div>
</div>

