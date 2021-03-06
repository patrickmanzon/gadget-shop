$(document).ready(function(){

    const sort = {
        sort: false,
        brand: false,
        cat: false,
        search: false
    }

    loadProducts("/", sort);
    loadCart();

    $(document).on("click", ".page-link a", function(e){
        e.preventDefault();
        let page = $(this).attr("href");
        loadProducts(page, sort);
    });


    $(document).on("click", ".cat-link", function(e){
                
        sort.cat = $(this).data("id");
                
        loadProducts("/", sort);

        $(".cat-link").removeClass("sidebar-active");
        $(this).addClass("sidebar-active");
        $(".categories .side-bar-clear").show();

        e.preventDefault();  
    });

    $(document).on("click", ".brand-link", function(e){
        sort.brand = $(this).data("id");

        loadProducts("/", sort);

        $(".brand-link").removeClass("sidebar-active");
        $(this).addClass("sidebar-active");
        $(".brand .side-bar-clear").show();

        e.preventDefault();
    });

    $(document).on("click", ".sort-link", function(e){
        sort.sort = $(this).data("sort");
        loadProducts("/", sort);

        $(".sort-link").removeClass("sidebar-active");        
        $(this).addClass("sidebar-active");    
        $(".sort .side-bar-clear").show();
            
                       
        e.preventDefault()
    });

    $(document).on("click", ".side-bar-clear", function(){
        let type = $(this).data("type");
        switch(type){
            case "cat":
                sort.cat = false;
                break;
            case "brand":
                sort.brand = false;
                break;
            case "sort":
                sort.sort = false;
                break;
            case "search":
                sort.search = false
                break
        }

        $(this).hide();
        $("."+type+"-link").removeClass("sidebar-active");
        loadProducts("/", sort);

    });

    $(document).on("keyup", ".search-input", function(e){
        if(e.which === 13 || e.keyCode === 13){
            if($(this).val() != ""){
                sort.search = $(this).val();
                loadProducts("/", sort);
                $(".search .side-bar-clear").show();
            }
            $(this).val("");
        }
    });

});

// console.log(document.getElementById("form_6"));
