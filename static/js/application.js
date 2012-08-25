/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$('document').ready(function(){
    $('.error').hide();
    $('#apply_leave').hide();
    $('#s_date').datepicker({ dateFormat: "yy-mm-dd" });    
    $('#e_date').datepicker({ dateFormat: "yy-mm-dd" });
    
    
    $('#leave_button').click(function(){
        $('#apply_leave').toggle('slow');
        
    });
   

});

function applyLeave(){
      $('.error').hide();
//        var userid=$("input#userid").val();
        var leave_type=$("select#leave_type").val();
        var s_date=$("input#s_date").val();
        if(s_date==""){
            $("label#s_date_error").show();
            $("input#s_date").focus();
            return false;
        }
        
        var e_date=$("input#e_date").val();
        if(e_date==""){
            $("label#e_date_error").show();
            $("input#e_date").focus();
            return false;
        }
        
        var reason=$("textarea#leave_reason").val();
        if(reason==""){
            $("label#leave_reason_error").show();
            $("textarea#leave_reason").focus();
            return false;
        }
        
//        Submitting value of application form from student-profile.php through ajax

        var dataString= 'param='+ "submit_leave_application" + '&leave_type='+ leave_type +'&s_date='+ s_date +'&e_date='+ e_date +'&reason='+ reason;
//        alert(dataString);
//        return false;
        $.ajax({
            type: "POST",
            url: "controller/process.php",
            data: dataString,
            success: function(){                
                    $('#leave_form').html("<div id='message'></div>");
                    $('#message').html("<h2>Leave application submitted!</h2>")
                                .append("<p>We will mail you the progress on this.You can check your status here also.</p>")
                                .hide()
                                .fadeIn(1500, function(){
                                    $('#message').append("<img id='checkmark' src='../images/check.png' />");
                                });               
            }
        });

}
