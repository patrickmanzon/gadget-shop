function base_url(){
    return "http://localhost:81/gadget-shop/";
}

function number(x){
    return x.toLocaleString('us');
  }
// function letry(){
//     loadCart();
// }
// function removeClear(obj){
//     obj.hide();
// }

function cartitems(){
    $(".total-cart-items").load(base_url() + "carts/total_items");
}
function loadCart(){
    $.ajax({
        url: base_url() + 'carts/ajaxContent',
        type: "POST",
        success: function(res){
            
            let cart;
            let output = "";
            if(res == 0){
                $("#cart-body").html("<h3 class='text-center'>Cart is empty click <a href='"+base_url()+"shop'>here</a> to continue.</h3>");
            }else{
                cart = JSON.parse(res);
                for(let i = 0; i < cart.length; i++){
                    output += `<tr>
                        <td>
                            <button class="btn btn-danger" onclick="removeCartItem(${cart[i].item_id})"><i class="fa fa-trash"></i></button>
                        </td>
                        <td><img src="${cart[i].image}" width="50px"></td>
                        <td>${cart[i].name}</td>
                        <td>₱${number(cart[i].price*1)}</td>
                        <td><input type="number" value="${cart[i].quantity}" class="form-control cart-input" onkeyup="updateCart(event, this, ${cart[i].item_id}, ${cart[i].stocks})"></td>
                        <td>₱${number(cart[i].price * cart[i].quantity)}</td>
                    </tr>`;
                }
            }
            $('#cart-content').html(output);
            
        }
    }); 
}

function updateCart(e, v, id, stock){
    if(e.which === 13 || e.keyCode === 13){
        if(v.value !== "" && !isNaN(v.value)){

            if(v.value > stock){
                $.amaran({"message":`There is only ${stock} stock(s) available`});
                v.value = stock;
                return;
            }
            $.post(base_url() + "carts/update", {
                prod_id:id, 
                prod_qty:v.value,
            }, function(res){
                $.amaran({'message':res});
                loadCart();
            });
        }else{
            loadCart();
        }
    }
    v.onfocusout = function(){
        loadCart();
    }
}

function removeCartItem(id){
    $.post(base_url() + "carts/remove", {item_id:id}, function(res){
        loadCart();
        cartitems();
    });
}

function loadProducts(page, obj){
    $.ajax({
        url: base_url() + 'products/ajaxShop' + page,
        type: "POST",
        data:{
            brand:obj.brand,
            cat:obj.cat,
            sort:obj.sort,
            search:obj.search
        },
        beforeSend: function(){
            $("#loading").show();
        },
        success: function(response){

            $("#loading").hide();
            const shop = JSON.parse(response);
            let output = "";
            if(shop.products.length > 0){
                for(let i = 0; i < shop.products.length; i++){
                    output += `<div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <div id="prod-image" class="m-auto">
                                        <a href="${base_url()}product/${shop.products[i].prod_id}"><img class="card-img-top animated zoomIn" src="${shop.products[i].prod_image}" alt=""></a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#">${shop.products[i].prod_name}</a>
                                        </h4>
                                        <h5 class="card-price">₱${number(shop.products[i].prod_price * 1)}</h5>
                                    </div>
                                    <div class="card-footer">
                                        <form action="javascript:void(0);" method="POST" class="inline-form" id="form-${shop.products[i].prod_id}" onsubmit="add_to_cart(event, ${shop.products[i].prod_id}, false)">
                                            <input type="hidden" value="${shop.products[i].prod_id}" name="prod_id" id="prod_id_${shop.products[i].prod_id}">
                                            <button class="btn btn-primary btn-sm" type="submit" id="adding_${shop.products[i].prod_id}"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        <button class="btn btn-success btn-sm btn-try" data-id="2" onclick="viewPreview('${shop.products[i].prod_id}')"><i class="fa fa-search-plus"></i> Preview</button>
                                    </div>
                                </div>
                            </div>`;
                }
            }else{
                output +=   `<div class='col-lg-12'>
                                <h2 class='text-center'>Product not found!</h2>
                            </div>`;
            }
            cartitems();
            $("#shop-products").html(output);
            $("#pagination").html(shop.pagination);
        }
    });
}


function add_to_cart(event, prod_id, type){

    event.preventDefault();
    
    let prod_qty;
   
    if(type == "modal" || type == "product"){
        prod_qty = $("#modal-qty").val();
    }else{
        prod_qty = 1;
        $("#form-"+prod_id).attr("onsubmit", `add_to_cart(event, ${prod_id}, '')`); 
    }

    $.ajax({
        url: base_url() + "carts/add",
        type: "POST",
        data:{
            prod_qty: prod_qty,
            prod_id: prod_id
        },
        beforeSend: function(){
            $("#adding").html("<i class='fa fa-shopping-cart'></i> Adding...");
            $("#adding_"+prod_id).removeClass("btn-primary");        
            $("#adding_"+prod_id).addClass("btn-warning");
        },
        success: function(res){
            cartitems();
            if(type == 'modal' || type === 'product'){
                $("#modal-qty").val("1");
            }else{
                $("#adding_"+prod_id).addClass("btn-primary");        
            $("#adding_"+prod_id).removeClass("btn-warning");
            $("#adding_"+prod_id).html("<i class='fa fa-shopping-cart'></i> Add To Cart");
            }
            $.amaran({'message':res});
           
        }
    });
}



function viewPreview(prod_id){
    
    $.post(base_url() + "products/ajax_preview_product/"+prod_id,{get_prod:"get_prod"}, function(res){

        let prod = JSON.parse(res);

        $("#modal-image-modal").html(`<img src="${prod.prod_image}" class="img-fluid">`);
        $(".modal-title").text(prod.prod_name);
        $("#prod-price-modal").text(prod.prod_price);
        $("#prod-desc-modal").html(prod.prod_desc);
        $("#modal-image-stocks").text(prod.prod_stock);
        $("#modal-image-brand").text(prod.brand_name);
        $("#modal-image-category").text(prod.cat_name);
        $("#form-modal-cart").attr("onsubmit", "add_to_cart(event, "+ prod_id +", 'modal')");
        $("#product-preview").modal();
    });
}
