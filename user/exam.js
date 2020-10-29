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
    });

    $('#opt1').click(function(){
        var checked=$(this).attr('checked',true);
        if (checked) {
            $(this).attr('checked',false);
        }
        else {
            $(this).attr('checked',true);
        }
    });

    $('#opt2').click(function(){
        var checked=$(this).attr('checked',true);
        if (checked) {
            $(this).attr('checked',false);
        }
        else {
            $(this).attr('checked',true);
        }
    });

    $('#opt3').click(function(){
        var checked=$(this).attr('checked',true);
        if (checked) {
            $(this).attr('checked',false);
        }
        else {
            $(this).attr('checked',true);
        }
    });

    $('#opt4').click(function(){
        var checked=$(this).attr('checked',true);
        if (checked) {
            $(this).attr('checked',false);
        }
        else {
            $(this).attr('checked',true);
        }
    });

});
