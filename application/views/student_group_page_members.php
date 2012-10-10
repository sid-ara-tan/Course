<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/sunny/jquery.ui.all.css"/>

	
        <script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.mouse.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.button.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.accordion.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.draggable.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.position.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.autocomplete.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.dialog.js"></script>
        
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.core.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.blind.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.explode.js"></script>
                
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.cookie.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.bgiframe-2.1.2.js"></script>
    <script type="text/javascript">


    function show_detail(i,sId,courseno){
        //alert(i);
        var ptag="p.profile"+i;
        var divtag="div.panel"+i;
        //$(divtag).slideToggle("slow");
               
                      $.ajax({
                                type: "POST",
                                data: {
                                    S_Id : sId,
                                    CourseNo : courseno
                                
                                },

                                url: "<?php echo site_url('student_home_group/load_members_detail');?>",
                                success: function(msg){

                                        $(divtag).html(msg);
                                        $(divtag).slideToggle("slow");

                                }

                        });
                       
  
    }
    
    $(document).ready(function(){
           //$("input#search").css("color","grey");
        $("input#search").click(function(){
            $("input#search").css("color","black");
            if($("input#search").val()=='Search Name')$("input#search").val('');
        });
        
        $("input#search").blur(function(){
            
            if($("input#search").val()=='')
                {
                    $("input#search").val('Search Name');
                    $("input#search").css("color","grey");
                }
                
            else $("input#search").css("color","black");
            
                
        });
        
        
        
        
        $(function() {
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		$( "#search" ).autocomplete({
			source: availableTags
		});
	});
    });
    </script>                   


    <div class="file_conversation">
    <p><h1>All Members List :(Click On Any Name To See Detail) </h1></p>   
    <input type="text" id="search" value="Search Name" style="color:grey"></input>
                    <?php
                    
                    if($query_std_list!=FALSE){
                        $i=1;
                        foreach($query_std_list->result_array() as $row)
                            {
                            //var_dump(is_file('images/profile_pic/0805045'));

                            
                            echo form_fieldset();
                            //echo  anchor('',img($image_properties)); 
                            echo '<br><br>';
                            $sID=$row['S_Id'];
                            //var_dump($sID);
                            echo "<p class='profile".$i."' onclick='show_detail($i,\"".$sID."\",\"".$courseno."\")'>".$row['Name']."</p>";
                            echo "<div class=panel".$i." style='display:none'>";

                            echo "</div>";
                            
                            echo form_fieldset_close();
                            
                            $i++;
                            }  

                    }
                    else{
                        echo "<font color='red'> No Data Available".'</font>';
                        echo br(20);
                    }

                    
                    ?>
</div>