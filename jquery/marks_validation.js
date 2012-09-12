function check_marks(frm,students){
    if(frm.total.value==""){
        document.getElementById('error_div').innerHTML="<font color='red'>!!! Total Marks required</font>";
        document.getElementById('total').style.background="red";
        frm.total.focus();
    }else if(isNaN(frm.total.value)){
        document.getElementById('error_div').innerHTML="<font color='red'>!!! Total Marks must be a number</font>";
        document.getElementById('total').style.background="red";
        frm.total.focus();
    }else{
        document.getElementById('total').style.background="white";
        var flag=true;
        var str="";
        students=students.split(",");        
        for (i = 0; i <students.length; i++) {
            document.getElementById(students[i]).style.background="white";
            if(document.getElementById(students[i]).value=="" || isNaN(document.getElementById(students[i]).value)){
                document.getElementById(students[i]).style.background="yellow";
                if(flag==true)str=str.concat("<font color='red'>!!! Marks of ",students[i]);
                else str=str.concat(", ",students[i])
                flag=false;
            }

            
        }
        if(flag==true)frm.submit();
        else{
            str=str.concat(" must be valid number </font>")
            document.getElementById('error_div').innerHTML=str;
        }
    }
}

function check_content(frm){
    
    if(frm.Topic.value==""){
        document.getElementById("content_error").innerHTML="<font color='red'>!!!Topic required</font>";
        document.getElementById('Topic').style.background="yellow";
        frm.Topic.focus();        
    }else{
        frm.submit();
    }
}

function check_addexam(frm){
    if(frm.exam_type.value==""){
        document.getElementById("addexam_error").innerHTML="<font color='red'>!!!Name required</font>";
        document.getElementById('exam_type').style.background="yellow";
        frm.exam_type.focus();
    }else{
        frm.submit();
    }
}

