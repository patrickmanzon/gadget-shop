<main id="wrapper">
    <div class="container">
    <div class="row">

        <div class="col-lg-3">
            <div class="search side-bar">
                <h4>Search<span class="badge badge-warning side-bar-clear" data-type="search">Clear</span></h4>
                <input class="form-control search-input" type="search" placeholder="SEARCH AND HIT ENTER" aria-label="Search">
            </div>
            <div class="categories side-bar">
                <h4>Select Category <span class="badge badge-warning side-bar-clear" data-type="cat">Clear</span></h4>
                <ul class="side-bar-lists">
                    <?php foreach($categories as $c => $v): ?>
                        <li><a href="<?=base_url()?>categories/products" data-id="<?=$v->cat_id?>" class="cat-link"><?=$v->cat_name?></a></li>
                    <?php endforeach; ?>              
                </ul>
            </div>
            <div class="brand side-bar">
                <h4>Select Brand <span class="badge badge-warning side-bar-clear" data-type="brand">Clear</span></h4>
                <ul class="side-bar-lists">
                    <?php foreach($brands as $b => $v): ?>
                        <li><a href="<?=base_url()?>brands/products" data-id="<?=$v->brand_id?>" class="brand-link"><?=$v->brand_name?></a></li>
                    <?php endforeach; ?>
                                      
                </ul>
            </div>
            <div class="sort side-bar">
                <h4>Sort By <span class="badge badge-warning side-bar-clear" data-type="sort">Clear</span></h4>
                <ul class="side-bar-lists">
                    <li><a href="<?=base_url()?>sort/products/name" data-sort="name" class="sort-link">Name</a></li>  
                    <li><a href="<?=base_url()?>sort/products/low" data-sort="price_low" class="sort-link">Price: Low to High</a></li>
                    <li><a href="<?=base_url()?>sort/products/high" data-sort="price_high" class="sort-link">Price: High to Low</a></li>                  
                </ul>
            </div> 
        </div>
    <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            
            <div class="row" id="shop-products">
                <div id="loading" class="text-center col-lg-12">
                    <img src="<?=base_url()?>assets/images/loading.gif" alt="">
                </div>
            </div>
            <nav aria-label="Page navigation example" id="pagination">
        
            </nav>
            
        <!-- /.row -->

        </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
    </div>
</main>
