                   <div class="demo">
                    <!-- <b><font color="red"><?php echo $notification_file; ?></font></b> -->
                    <p><h1>All Course files : </h1></p>
                        <hr /><hr />

                        <?php
                        $row_std_name=$query_student->row();
                        echo form_open_multipart('student_home_group/do_upload');?>
                        <?php echo form_label('Topic', 'topic_label');?>
                        <br>
                        <input type="text" name="topic" value="" size="50"  />
                        <br>
                        <?php echo form_label('Description', 'description_label');?>
                        <br>
                        <textarea name="description" rows="5" cols="70" maxlenth="1000" ></textarea>
                        <br>
                        <input type="file" name="file_upload" size="20" id="file_upload"  />
                        
                        <?php echo form_hidden('courseno',$courseno);?>
                        <br /><br />

                        <input type="button" value="upload" onclick="checkNull_file(this.form)" />

                        </form>
                        <hr><hr><hr>
                        <?php
                        if($record_file!=FALSE){

                            foreach($record_file as $row_record_file){
                            ?>
                            <h3><?php echo anchor('student_home_group/download_file/'.$courseno.'/'.$row_record_file->filename, $row_record_file->topic); ?></h3>
                            <?php echo $row_record_file->description.'<br>';
                                echo "<br />uploaded by <font color='red'> ".$row_record_file->uploader.'</font>';
                                echo ' '.$row_record_file->time.'<br>';
                                    if($row_record_file->uploader==$row_std_name->Name)
                                    {
                                        //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                        echo '<br>< '.anchor('student_home_group/delete_file/'.$courseno.'/'.$row_record_file->filename,"< <font color='red'>Delete</font> >",'onclick=" return check()"').' >';  
                                    }
                                echo ' '.anchor('student_home_group/comment/'.$row_record_file->file_id.'/'.$courseno,"< <font color='red'>".${'commentoffile'.$row_record_file->file_id}." Comment</font> >").'<br>';
                                  
                                echo '<hr>';

                            }
                        }
                        
                        else echo "<font color='red'> No File".'</font>';
                        ?>
                     </div>
