function formReset()
{
    document.getElementById("std_profile_form").reset();
}

function formEmail(frm)
{
    //alert("Not a valid e-mail address blur");
    var x=frm.user_email.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
        //alert("Not a valid e-mail address blur");
        document.getElementById("btnsubmit").disabled=true;
        document.getElementById('email_error').innerHTML="<font color='red'>*** not a valid email</font>";
        document.getElementById('email').style.background="red";
        frm.user_email.focus();
    }
    else 
    {
        document.getElementById("btnsubmit").disabled=false;
        document.getElementById('email_error').innerHTML="<font color='green'>success</font>";
        document.getElementById('email').style.background="white";

    }
}


function numCheck(frm)
{
    if(isNaN(frm.user_phone.value))
    {
        document.getElementById("btnsubmit").disabled=true;
        document.getElementById('user_phun').focus();
        document.getElementById('phone_error').innerHTML="<font color='red'>*** phone no can not be a character </font>";
        
    }
    else
    {
        document.getElementById("btnsubmit").disabled=false;
        document.getElementById('phone_error').innerHTML="";
    }
}

function passCheck(frm)
{

    if(frm.password1.value!=frm.password2.value)
    {
        document.getElementById("btnsubmit").disabled=true;
        document.getElementById('pass2').innerHTML="<font color='red'>*** password miss match.please type again </font>";
        document.getElementById('p1').style.background="red";
        document.getElementById('p2').style.background="red";
        frm.password2.focus();
    }
    else
    {
        if(frm.password1.value.toString().length<4)
        {
            document.getElementById('pass1').innerHTML="<font color='red'>*** password length must be minimum 4 character </font>";
            document.getElementById("btnsubmit").disabled=true;
            frm.password1.focus();
        }
        else
        {
            document.getElementById("btnsubmit").disabled=false;
            document.getElementById('pass1').innerHTML="<font color='green'>success</font>";
            document.getElementById('pass2').innerHTML="";
            document.getElementById('p1').style.background="white";
            document.getElementById('p2').style.background="white"; 
        }
    }
}

function std_profile_submit(frm)
{   
    if((frm.user_email.value=="")&&(frm.std_name.value=="")&&(frm.password1.value==""))alert("Enter Name,Email Address,Password First ");
    else if(frm.user_email.value=="")
        {
            document.getElementById('email_error').innerHTML="<font color='red'>Enter Email Address</font>";
            frm.user_email.focus();
        }
    else if(frm.std_name.value=="")
        {
            document.getElementById('name_error').innerHTML="<font color='red'>Enter Name</font>";
            frm.std_name.focus();
        }
    else if(frm.password1.value=="")
        {
            document.getElementById('pass1').innerHTML="<font color='red'>Enter Password</font>";
            frm.password1.focus();
        }
    else if(frm.password2.value=="")
        {
            document.getElementById('pass2').innerHTML="<font color='red'>Retype Password</font>";
            frm.password2.focus();
        }

    else document.forms["std_profile_form"].submit();
}