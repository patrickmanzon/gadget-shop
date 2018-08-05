
    <div class="modal" tabindex="-1" role="dialog" id="product-preview">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-prod-name">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div id="modal-image-modal"></div>
                        <hr>
                        <div class="alert alert-light" role="alert">
                            <p>Stocks: <span id="modal-image-stocks"></span></p>
                            <p>Brand: <span id="modal-image-brand"></span></p>
                            <p>Category: <span id="modal-image-category"></span></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <h3 class="card-price">₱ <span id="prod-price-modal"></span></h3>
                        <hr>
                        <form action="javascript:void(0);" id="form-modal-cart">
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control" value="1" placeholder="Quantity" id="modal-qty" required>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
                                </div>
                            </div>
                        <?=form_close()?>
                        <hr>
                        <div id="prod-desc-modal"></div>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>

<!-- JQuery -->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<!-- Amaran JS -->
<script src="<?=base_url()?>assets/js/jquery.amaran.min.js"></script>
<!-- Main Functions -->
<script src="<?=base_url()?>assets/js/main-functions.js"></script>
<!-- Main Javascript -->
<script src="<?=base_url()?>assets/js/main.js"></script>

</body>
</html>