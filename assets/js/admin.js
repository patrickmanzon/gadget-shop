$(document).ready(function(){


    $(".delete_item").each(function(){
        $(this).click(function(){
            //$("#exampleModal").modal("show");
            var location = $(this).data("location");
            console.log(location);
            $('#deleteModal').modal();    
            $('#form_delete').attr("action", location);            
        });
    });


    $(".edit_item").each(function(){
        $(this).click(function(){
            $(".change-btn").text("Edit Category");
            $(".change-btn").removeClass("btn-primary");
            $(".change-btn").addClass("btn-success");
            $("input[type='text']#name").val($(this).data("input"));
            $("#edit_form").attr("action", $(this).data("edit"));
        });
    });
});