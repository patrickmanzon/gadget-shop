<main id="wrapper">
    <div class="container">
        <div class="product-detail">
            <div class="row">
                <div class="col-lg-4">
                    <div class="prod-img">
                        <img src="<?=base_url().$product->prod_image?>" alt="" class="card-img-top">
                    </div>
                </div>
                <div class="col-lg-5">
                    
                    <h3 class="card-price">₱<?=number_format($product->prod_price)?></h3>
                    <hr>
                    <form action="javascript:void(0);" onsubmit="add_to_cart(event, <?=$product->prod_id?>, 'product')">
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" value="1" placeholder="Quantity" id="modal-qty" required>
                            </div>
                            <div class="col">
                                <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div id="specs">
                        <div id="prod-desc">
                            <?=$product->prod_desc?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="aside-info">
            
                        <div class="aside-items">
                            <h3><i class="fa fa-thumbs-up"></i> 100% Original</h3>
                            <p class="notopmargin">We guarantee you the sale of Original Brands.</p>
                        </div>

                        <div class="aside-items">
                            <h3><i class="fa fa-credit-card"></i> Payment Option</h3>
                            <p class="notopmargin">Cash on Delivery only</p>
                        </div>

                        <div class="aside-items">
                            <h3><i class="fa fa-truck"></i> Free Shipping</h3>
                            <p class="notopmargin">Free Delivery to 100+ Locations on orders above ₱1,000.</p>
                        </div>

                        <div class="aside-items">
                            <h3><i class="fa fa-undo"></i> 30-Days Returns</h3>
                            <p class="notopmargin">Return or exchange items purchased within 30 days.</p>
                        </div>

                    </div>
                </div>
            </div>
        <div>
  <!-- /.row -->
    </div>
</main>
