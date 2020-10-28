$(document).ready(function (){
    $("#examform").hide();
    $('#selexam').hide();

    $("#exam").click(function(){
        $("#examform").show();
    });
    
    $('#optionselector').change(function (){
        $("#selexam").show();
    });

});
