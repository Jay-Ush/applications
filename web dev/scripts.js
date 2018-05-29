$(document).ready(function(){
    $("#loginLink").click(function(){
        $("#loginModal").modal('show');
    });
    $("#reserveTable").click(function(){
        $("#reservetable").modal('show');
    });
    $("#loginClose, #login-close").click(function(){
        $("#loginModal").modal('hide');
    });
    $("#reserveClose, #reserve-close").click(function(){
        $("#reservetable").modal('hide');
    });
    $("#mycarousel").carousel({interval: 2000});
    $("#carousel-button").click(function(){
        if($("#carousel-button").children("span").hasClass("fa-pause")){
            $("#mycarousel").carousel('pause');
            $("#carousel-button").children("span").removeClass("fa-pause");
            $("#carousel-button").children("span").addClass("fa-play");
        }
        else if($("#carousel-button").children("span").hasClass("fa-play")){
            $("#mycarousel").carousel('cycle');
            $("#carousel-button").children("span").removeClass("fa-play");
            $("#carousel-button").children("span").addClass("fa-pause");
        }
    });
});