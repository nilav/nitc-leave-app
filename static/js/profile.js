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
    
    var dataString= 'param='+ "updateLeave" + '&apid='+ apid +'&s_date'+ s_date +'&e_date'+ e_date +'&leave_reason'+ leave_reason +'&leave_type'+ leave_type;
    
    $.ajax({
        type: "POST",
        url: "includes/studentAction.php",
        data: dataString,
        success: function(data){                
                $('#applicationInfoRow'+apid).html(data);

        }
    });
}

