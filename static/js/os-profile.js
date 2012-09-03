function editDate(dept_id){
    editHtml=$('#semdate').html();
    var dataString= 'param='+ "editDate" + '&dept_id='+ dept_id;
//        alert(dataString);
//        return false;
    $.ajax({
        type: "POST",
        url: "includes/osAction.php",
        data: dataString,
        success: function(data){                
                $('#semdate').html(data);
//               

        }
    });
}


function updateDate(dept_id){
    var $input=$('#semdate').find('input');
    s_date=$input.eq(0).val();
    e_date=$input.eq(1).val();
    
    
    var dataString= 'param='+ "updateDate" + '&dept_id='+ dept_id +'&s_date='+ s_date +'&e_date='+ e_date ;
    
    $.ajax({
        type: "POST",
        url: "includes/osAction.php",
        data: dataString,
        success: function(data){ 
                
                $('#semdate').html(data);
                
                

        }
    });
}   
