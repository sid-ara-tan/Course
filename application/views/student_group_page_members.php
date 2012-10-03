                   <h1>All Members List :</h1>
                
                    <?php
                    
                    if($query_std_list!=FALSE){
                            echo "<ul>";
                            foreach($query_std_list->result_array() as $row)
                            {
                                echo "<li>".anchor('student_home_group/group/'.$courseno,$row['Name'])."</li>";
                            }
                            echo "<ul/>";
                    }
                    else{
                        echo "<font color='red'> No Data Available".'</font>';
                        echo br(20);
                    }

                    
                    ?>