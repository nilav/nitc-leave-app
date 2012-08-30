/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function approveRequest(uid){
//    alert(uid);
    var dataString= 'param='+"approveRequest"+'&uid='+uid;
    $.ajax({
        type: 'POST',
        url: 'includes/hodAction.php',
        data: dataString,
        success: function(data){
            $('#pending_edit'+uid).html(data);
        }
    });
}

function rejectRequest(uid){
    var dataString= 'param='+"rejectRequest"+ '&uid='+uid;
    $.ajax({
        type: 'POST',
        url: 'includes/hodAction.php',
        data: dataString,
        success: function(data){
            $('#pending_edit'+uid).html(data);
        }
    });
}
    
    function approveLeave(apid){
        
        var dataString= 'param='+"modifyLeave"+ '&apid='+apid;
//        alert("hi nilav");
        $.ajax({
            type: 'POST',
            url: 'includes/hodAction.php',
            data: dataString,
            success: function(data){
                $('#pending_edit'+apid).html(data);
            }
        });
    }
    
    function rejectLeave(apid){
        
        var dataString= 'param='+"rejectLeave"+ '&apid='+apid;
//        alert("hi nilav");
        $.ajax({
            type: 'POST',
            url: 'includes/hodAction.php',
            data: dataString,
            success: function(data){
                $('#pending_edit'+apid).html(data);
            }
        });
    }

