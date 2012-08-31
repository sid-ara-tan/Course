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
        alert("Give Tpoic Name First");
    }
    else frm.submit();
}
        