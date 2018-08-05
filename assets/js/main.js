$(document).ready(function(){

    let sort = {
        sort: false,
        brand: false,
        cat: false
    }

    loadProducts("/1", sort);
    loadCart();

    $(document).on("click", ".page-link a", function(e){
        e.preventDefault();
        let page = $(this).attr("href"); 
        loadProducts(page, sort);
        
    });


    $(document).on("click", ".cat-link", function(e){
                
        sort.cat = $(this).data("id");
                
        loadProducts("/1", sort);

        $(".cat-link").removeClass("sidebar-active");
        $(this).addClass("sidebar-active");
        $(".categories .side-bar-clear").show();

        e.preventDefault();  
    });

    $(document).on("click", ".brand-link", function(e){
        sort.brand = $(this).data("id");

        loadProducts("/1", sort);

        $(".brand-link").removeClass("sidebar-active");
        $(this).addClass("sidebar-active");
        $(".brand .side-bar-clear").show();

        e.preventDefault();
    });

    $(document).on("click", ".sort-link", function(e){
        sort.sort = $(this).data("sort");
        loadProducts("/1", sort);

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
        }

        $(this).hide();
        $("."+type+"-link").removeClass("sidebar-active");
        loadProducts("/1", sort);

    });

});

// console.log(document.getElementById("form_6"));
