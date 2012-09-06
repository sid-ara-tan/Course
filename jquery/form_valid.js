function checkNull(frm)
{
    if((frm.message.value=="")||(frm.subject.value==""))
    {
    }
    else frm.submit();
}
        
function check()
{
    var ans=confirm("Are you sure to delete ?");
    if(ans){
        return true;
    }
    else return false;

}
        
function checkNullComment(frm)
{
    
    if(frm.comment.value=="")
    {
    }
    else frm.submit();
}

function checkNull_file(frm)
{
    if(frm.topic.value=="")
    {
        alert("Give Topic Name First");
    }
    else frm.submit();
}

function check_selected()
{
    flag=0;
    for(i=1;i<document.forms["regi_form"]["count"].value;i++)
        {
            if(document.forms["regi_form"]["selected_course"+i].checked)flag=1;
        }
        
        if(flag==0)
            {
                alert("Select Course First");
            }
        else document.regi_form.submit();

}
        