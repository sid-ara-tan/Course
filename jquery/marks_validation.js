function check_marks(frm,students){
    if(frm.total.value==""){
        document.getElementById('error_div').innerHTML="<font color='red'>!!! Total Marks required</font>";
        document.getElementById('total').style.background="red";
        frm.total.focus();
    }else if(isNaN(frm.total.value)){
        document.getElementById('error_div').innerHTML="<font color='red'>!!! Total Marks must be a number</font>";
        document.getElementById('total').style.background="red";
        frm.total.focus();
    }else if(parseFloat(frm.total.value) <= 0){
        document.getElementById('error_div').innerHTML="<font color='red'>!!! Total Marks must be greater than zero</font>";
        document.getElementById('total').style.background="red";
        frm.total.focus();
    }else{
        document.getElementById('total').style.background="white";
        var flag=true;
        var str="";
        students=students.split(",");        
        for (i = 0; i <students.length; i++) {
            document.getElementById(students[i]).style.background="white";
            if(document.getElementById(students[i]).value=="" || isNaN(document.getElementById(students[i]).value) ||
                parseFloat(document.getElementById(students[i]).value) > parseFloat(frm.total.value)){
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

function check_percentage(frm,exam){
    exam=exam.split(",");
    flag=true;
    str="";
    total=0;
    for(i=0;i<exam.length;i++){
        document.getElementById(exam[i]).style.background="white";
        if(document.getElementById(exam[i]).value=="" || isNaN(document.getElementById(exam[i]).value) ||
            parseFloat(document.getElementById(exam[i]).value)<0){
            document.getElementById(exam[i]).style.background="yellow";
            if(flag==true)str=str.concat("<font color='red'>!!! Percentage of ",exam[i]);
                else str=str.concat(", ",exam[i])
                flag=false;
        }else{
            total=total+parseFloat(document.getElementById(exam[i]).value);
        }
    }
    if(flag==true){            
        if(total > 100)document.getElementById('editexam_error').innerHTML=
            "<font color='red'>!!!Sum of percentage can't be greater than 100</font>";
        else frm.submit();
    }
    else{
        str=str.concat(" must be valid number </font>")
        document.getElementById('editexam_error').innerHTML=str;
    }
}

function check_individualpercentage(frm,exam){
    exam=exam.split(",");
    flag=true;
    str="";
    total=0;
    for(i=0;i<exam.length;i++){
        document.getElementById(exam[i]).style.background="white";
        if(document.getElementById(exam[i]).value=="" || isNaN(document.getElementById(exam[i]).value) ||
            parseFloat(document.getElementById(exam[i]).value)<0){
            document.getElementById(exam[i]).style.background="yellow";
            if(flag==true)str=str.concat("<font color='red'>!!! Percentage of ",exam[i]);
                else str=str.concat(", ",exam[i]);
                flag=false;
        }else{
            total=total+parseFloat(document.getElementById(exam[i]).value);
        }
    }
    if(flag==true){
        if(total > 100)document.getElementById('setpercentage_error').innerHTML=
            "<font color='red'>!!!Sum of percentage can't be greater than 100</font>";
        else frm.submit();
    }
    else{
        str=str.concat(" must be valid number </font>")
        document.getElementById('setpercentage_error').innerHTML="<font color='red'>Not a valid number</font><br/>";
    }
}

function check_individualbest(frm,total){
    str=frm.best_count.value;
    if(str=="" ||isNaN(str) || str.indexOf(".")!= -1 || parseInt(str)> parseInt(total)){       
        document.getElementById('best_count').style.background="yellow";
        document.getElementById('setpercentage_error').innerHTML="<font color='red'>Not a valid integer</font><br/>";
        frm.best_count.focus();
    }else {       
        frm.submit();
    }
}


