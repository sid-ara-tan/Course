<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
    <title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" href="<?php echo base_url();?>template/styles/layout.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>

<!--************************************************************************************************************* -->
	<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/sunny/jquery.ui.all.css">

	

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js"></script>

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js"></script>

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js"></script>
                
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.cookie.js"></script>
        <script>
	$(function() {
		$( "#tabs" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
                    
		});
	});
    </script>
        <script type="text/javascript" src="<?php echo base_url();?>jquery/form_valid.js"></script>
        
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>

        <script type="text/javascript">
            function validate_email(field,alerttxt)
            {
            with (field)
              {
              apos=value.indexOf("@");
              dotpos=value.lastIndexOf(".");
              if (apos<1||dotpos-apos<2)
                {alert(alerttxt);return false;}
              else {return true;}
              }
            }
            function validate_form(thisform)
            {
            with (thisform)
              {
              if (validate_email(total,"Not a valid e-mail address!")==false)
                {total.focus();return false;}
              }
            }
        </script>

        <script type="text/javascript">
            function load_student(sec)
            {
                if (sec=="")
                  {
                  document.getElementById("marks_form").innerHTML="";
                  return;
                  }

              var x="http://localhost/Course/index.php/teacher_home/process_form/";
              var y=document.getElementById('courseno').getAttribute('value');

              $("#marks_form").load(x.concat(y,"/",sec));
            }

            function load_marks(exam_ID)
            {
              var x="http://localhost/Course/index.php/teacher_home/marks_list/";
              var y=document.getElementById('CourseNo').getAttribute('value');
              var z=document.getElementById('Sec').getAttribute('value');
              $("#marks_list").load(x.concat(y,"/",z,"/",exam_ID));
            }
         </script>

        <script type="text/javascript" src="<?php echo base_url();?>jquery/marks_validation.js"></script>
<!--************************************************************************************************************* -->

</head>