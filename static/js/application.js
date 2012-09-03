/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$('document').ready(function(){
    $('.error').hide();
    $('#apply_leave').hide();
    $('#leave_history').hide();
    $('#s_date').datepicker({ 
        dateFormat: "yy-mm-dd",
        showOn: "both"    
        
    });  
    
    $('#e_date').datepicker({ 
        dateFormat: "yy-mm-dd" 
        
    });

    
    
    $('#leave_form_button').click(function(){
        $('#apply_leave').toggle('slow');
        
    });
    $('#leave_history_button').click(function(){
        $('#leave_history').toggle('medium');
        
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
        
        var startDate = new Date($('#s_date').val());
        var endDate = new Date($('#e_date').val());
        if (startDate > endDate){
            alert("Enter proper date");
            return false;
        }
//        var s_date1 = $('#s_date').val();
//        var e_date1 = $('#e_date').val();
        var diff = new Date(endDate - startDate);
        var days = diff/1000/60/60/24;
        var allowed_leave=$("#balanced_leave"+leave_type).val();
        if(days>allowed_leave){
            alert("your balanced leave is low then applied number of day");
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
