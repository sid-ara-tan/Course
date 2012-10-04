
    <script type="text/javascript">

    function show_detail(i){
        //alert(i);
        var ptag="p.profile"+i;
        var divtag="div.panel"+i;
        $(divtag).slideToggle("slow");
               /*
                        $.ajax({
                                type: "POST",
                                //data: "courseno=" + $("input#courseno_hidden").val(),

                                url: "<?php echo site_url('student_home_group/load_members_detail');?>",
                                success: function(msg){

                                        $(divtag).html(msg);
                                        $(divtag).slideToggle("slow");

                                }

                        });
                        */
  
    }
    
    $(document).ready(function(){
            
        $("input#search").click(function(){
            
            if($("input#search").val()=='Search Name')$("input#search").val('');
        });
        
        $("input#search").blur(function(){
            
            if($("input#search").val()=='')$("input#search").val('Search Name');
            
                
        });
    });
    </script>                   


    <div class="file_conversation">
    <p><h1>All Members List :(Click On Any Name To See Detail) </h1></p>   
    <input type="text" id="search" value="Search Name"></input>
                    <?php
                    
                    if($query_std_list!=FALSE){
                        $i=1;
                        foreach($query_std_list->result_array() as $row)
                            {
                            //var_dump(is_file('images/profile_pic/0805045'));
                            if( is_file('images/profile_pic/'.$row['S_Id'])==FALSE)
                            {
                                    $image_properties = array(
                                    'src' => base_url() . 'images/profile_pic/no_profile.jpg',
                                    'alt' => 'profile picture',
                                    'width' => '96',
                                    'height' => '96',
                                    'title' => $row['Name']
                                    );   
                            }
                            else
                            {

                            $image_properties = array(
                                    'src' => base_url() . 'images/profile_pic/'.$row['S_Id'],
                                    'alt' => 'profile picture',
                                    'width' => '96',
                                    'height' => '96',
                                    'title' => $row['Name']
                                    );
                            }
                                
                            
                            echo form_fieldset();
                            //echo  anchor('',img($image_properties)); 
                            echo '<br><br>';
                            echo "<p class='profile".$i."' onclick='show_detail(".$i.")'>".$row['Name']."</p>";
                            echo "<div class=panel".$i." style='display:none'>";
                            echo  anchor(site_url() . '/student_home_group/group/'.$courseno.'#',img($image_properties));
                            echo '<div class="comment_value">';
                            echo '<ul>';
                                echo '<li>'."Student Id :".$row['S_Id'].'</li>';
                                echo '<li>'."Section :".$row['Sec'].'</li>';
                                echo '<li>'."Department :".$row['Dept_id'].'</li>';
                                echo '<li>'."Level/Term :".$row['sLevel'].'/'.$row['Term'].'</li>';
                                echo '<li>'."E Mail :".$row['email'].'</li>';
                                
                            echo '</ul>';
                            echo    "</div></div>";
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