                   <p><h1>All Members List :</h1></p>
                
                    <?php
                    
                    if($query_std_list!=FALSE){
                            foreach($query_std_list->result_array() as $row)
                            {
                                echo anchor('student_home_group/group/'.$courseno,$row['Name']).'<hr>';
                                
                            }    
                    }
                    else echo "<font color='red'> No Data Available".'</font>';      
                    
                    ?>