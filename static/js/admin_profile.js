/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function approveRequest(uid){
//    alert(uid);
    var dataString= 'param='+"approveRequest"+'&uid='+uid;
    $.ajax({
        type: 'POST',
        url: 'includes/adminAction.php',
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
        url: 'includes/adminAction.php',
        data: dataString,
        success: function(data){
            $('#pending_edit'+uid).html(data);
        }
    });
}
count=1;
function addDepartmentRow(){
    if(count==1){
        html='<tr id="dept_input_value"><td><input type="text" name="dept_name" placeholder="Department" required="true"/>';
        html=html+'<td><input type="text" name="dept_desc" placeholder="Description" required="true" />';
        html=html+'<td><div id="add_dept"><img src="../static/images/approve.png" onclick="addDepartment();" style="float:left; padding-right:.7em;"alt="add it" />';
        html=html+'<img src="../static/images/cancel.png" alt="cancel it" onclick="cancelAddingDept();" /></div></td></tr> ';
        $('#tab_header').after(html);
        count=0;
    }
}

function addDepartment(){
//    alert("Hi nilav");
    var $input=$('#dept_input_value').find('input');
    html='This field required';
    dept_name=$input.eq(0).val();
    dept_desc=$input.eq(1).val();
    if(dept_name==''){
        $input.eq(0).attr('placeholder',html);
//        alert(dept_desc);
    }else if(dept_desc==''){
        $input.eq(1).attr('placeholder',html);      
    }else{
          var datastring='param='+"addDepartment"+'&dept_name='+dept_name+'&dept_desc='+dept_desc;
          $.ajax({
              type: 'POST',
              url: 'includes/adminAction.php',
              data: datastring,
              success: function(data){
                  $('#dept_input_value').remove();
                  $('#tab_header').after(data);
                  count=1;
              }
          });
    }    
}


function cancelAddingDept(){
      $('#dept_input_value').remove();
      count=1;
 }   