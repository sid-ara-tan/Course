                    <h1>All Course content :- </h1><br>
                    <?php
                    if($record_content!=FALSE){

                        foreach($record_content as $row_record){
                        ?>
                        <h3><?php echo anchor('student_home_group/download_file/'.$courseno.'/'.$row_record->File_Path, $row_record->Topic); ?></h3>
                        <?php echo '<p>'.$row_record->Description.'</p>';?>
                        <?php echo "<br />uploaded by <font color='red'>".$row_record->Uploader.'</font>' ?>
                        <?php echo $row_record->Upload_Time.'<hr>'; 
                        

                        }
                    }
                    
                    else{
                        echo "<font color='red'> No Content Available".'</font>';
                        echo br(20);
                    }
                    ?>