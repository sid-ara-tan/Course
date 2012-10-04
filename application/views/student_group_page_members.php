    <script type="text/javascript">
    $(document).ready(function(){
    $("a.profile").click(function(){
    $("div.panel").slideToggle("slow");
    });
    });
    </script>                   

<p><h1>All Members List :</h1></p>
                
                    <?php
                    
                    if($query_std_list!=FALSE){
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
                                
                            //echo  anchor('',img($image_properties));   
                            echo '<br><br>';
                            echo "<a class='profile' href='#'>".$row['Name']."</a>";
                            echo "<div class=panel style='display:none'>h</div>";
                                

                                
                                //echo '<img src='.base_url() . 'images/profile_pic/0805048_thumb' .' />';
                            }  

                    }
                    else echo "<font color='red'> No Data Available".'</font>';      
                    
                    ?>