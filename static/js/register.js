/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('.student_info').hide();
    $('.department_info').hide();
    $("#usertype_list").change(function(){
        
        if($(this).val()== 5){
             $('.student_info').show();
             $('.department_info').show();
        }
        if($(this).val()== 2 || $(this).val()== 3){
            $('.student_info').hide();
            $('.department_info').show();
        }
        
        if($(this).val()== 4 || $(this).val==0){
             $('.student_info').hide();
             $('.department_info').hide();
        }
       
    });
});
