/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$("document").ready(function(){
//    $('.error').hide();
//});

var editHtml=new Array();
function editLeave(apid){
    editHtml[apid]=$('#applicationInfoRow'+apid).html();    
    var dataString= 'param='+ "editLeave" + '&apid='+ apid;
//        alert(dataString);
//        return false;
    $.ajax({
        type: "POST",
        url: "includes/studentAction.php",
        data: dataString,
        success: function(data){                
                $('#applicationInfoRow'+apid).html(data);
//                Date.firstDayOfWeek = 0;
//                Date.format = 'yyyy-mm-dd';
//                $(function(){
//                    $('#s_date').datepicker({clickInput:true,startDate: '1970-01-01'});
//                    $('#e_date').datepicker({clickInput:true,startDate: '1970-01-01'});
//                });
                $('.leave_s_date').datepicker({ dateFormat: "yy-mm-dd", altField:".leave_s_date", altFormat:"yy-mm-dd" });
                $('.leave_e_date').datepicker({ dateFormat: "yy-mm-dd", altField:'.leave_e_date',altFormat:"yy-mm-dd" });

        }
    });
}

function cancelEditLeave(aid){
//    alert(editHtml[apid]);
    $('#applicationInfoRow'+aid).html(editHtml[aid]);
}

function updateLeave(apid){
    var $input=$('#applicationInfoRow'+apid).find('input');
    s_date=$input.eq(0).val();
    e_date=$input.eq(1).val();
    $textarea=$('#applicationInfoRow'+apid).find('select');
    leave_type=$textarea.eq(0).val();
    $textarea=$('#applicationInfoRow'+apid).find('textarea');
    leave_reason=$textarea.eq(0).val();
    
    var dataString= 'param='+ "updateLeave" + '&apid='+ apid +'&s_date='+ s_date +'&e_date='+ e_date +'&leave_reason='+ leave_reason +'&leave_type='+ leave_type;
    
    $.ajax({
        type: "POST",
        url: "includes/studentAction.php",
        data: dataString,
        success: function(data){ 
                app_var="#applicationInfoRow"+apid;
                popshow="<td colspan='5' class='toShow'>Updated Successfully.</td>";
                $('#applicationInfoRow'+apid).html(popshow);
                app_var="#applicationInfoRow"+apid;
                app=app_var+' '+'.toshow';
                var app_all=$(app);
                setTimeout(function(){
                        app_all.fadeOut('slow', function(){
                        app_all.remove();
                        $('#applicationInfoRow'+apid).html(data);
                    });
                },2000);
                

        }
    });
}

function deleteLeave(apid){
    var datastring='param='+ "deleteLeave"+ '&apid='+apid;
    $.ajax({
        type: "POST",
        url: "includes/studentAction.php",
        data: datastring,
        success: function(data){
            $('#applicationInfoRow'+apid).html(data);
            setTimeout(function(){
                        $('#applicationInfoRow'+apid).fadeOut('slow', function(){
                        $('#applicationInfoRow'+apid).remove();
                    });
                },2000);
        }
    });
}

