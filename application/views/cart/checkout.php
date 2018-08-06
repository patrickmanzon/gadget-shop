<main id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="cart-body">
                    <h2>Cart Summary</h2>
                    <table class="table table-sm">
                        <thead>
                            <tr>     
                                <th></th>                          
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($carts as $c): ?>
                            <tr>
                                <td><img src="<?=base_url().$c["image"]?>" width="50px"></td>
                                <td><?=$c["name"]?></td>
                                <td>₱<?=number_format($c["price"])?></td>
                                <td><?=$c["quantity"]?></td>
                                <td>₱<?=number_format($c["price"] * $c["quantity"]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>                               
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Cart Totals</h2>
                <table class="table table-sm checkout-tb">
                    <tbody>
                        <tr>
                            <td><h4 class="cart-header"><strong>Cart Subtotal</strong></h4></td>
                            <td><h4><strong>₱<?=number_format($cart_total)?></strong></h4></td>                            
                        </tr>
                        <tr>
                            <td><h4 class="cart-header"><strong>Shipping</strong></h4></td>
                            <td><h4>Free</h4></td>                            
                        </tr>
                        <tr>
                            <td><h4 class="cart-header"><strong>Total</strong></h4></td>                        
                            <td><h4 class="card-price">₱<strong><?=number_format($cart_total)?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mode-of-payment">
                    <h4>Payment Method</h4>
                    <ul class="payment-lists">
                        <li class="payment-list">
                            <h5><i class="fa fa-truck"></i> Cash on Delivery for now</h5>
                        </li>
                    </ul>
                </div>
                <div class="button-payment">
                    <?php if($this->session->userdata("user_id")): ?>
                        <button class="btn btn-success float-right">Checkout</button>
                    <?php else: ?>
                        <bbutton class="btn btn-info float-right">Login to Checkout</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
  <!-- /.row -->
    </div>
</main>
