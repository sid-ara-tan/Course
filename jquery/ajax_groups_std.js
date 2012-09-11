

$(document).ready(function(){
    
  $("div#tabs-4").ajaxStart(function(){
     $(this).html("<img src='http://localhost/Course/images/wait.gif' />");
  });
  
  $("a#file").click(function(){
				//alert("ddd");
    			$.ajax({
				type: "POST",
				data: "courseno=" + $("input#courseno_hidden").val(),
                                
				url: "http://localhost/Course/index.php/student_home_group/load_file",
                                success: function(msg){
					
                                        $("div#tabs-4").html(msg);

                                }

			});
      
                        
  });
});













/*
function show(userid)
{
    var xmlhttp; 
    
    if(userid=="")
        {
           document.getElementById("idp").innerHTML="init....";
            return;
        }

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("idp").innerHTML=xmlhttp.responseText;
            //alert(xmlhttp.responseText.length);
            if(xmlhttp.responseText.length!=42)
                {
                    document.getElementById("btnsubmit").disabled=true;
                    document.getElementById("userid_id").style.background="red";
                }
            else
                {
                  document.getElementById("btnsubmit").disabled=false; 
                  document.getElementById("userid_id").style.background="white";
                }
            

        }
    }
    //xmlhttp.open("GET","getcustomer.asp?q="+str,true);
    xmlhttp.open('POST', 'http://localhost/SoftTracker/index.php/test/aja');
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var par=("idname="+userid);
    xmlhttp.send(par);

}

*/