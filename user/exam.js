$(document).ready(function (){

    $("#selexam").click(function(){
        $("#examform").show();
    });

    $('#selexam').hide();
    
    $('#optionselector').change(function (){
        $("#selexam").show();
    });

    $('#selexam').load(function(){
        $("#examform").show();
    })

});
