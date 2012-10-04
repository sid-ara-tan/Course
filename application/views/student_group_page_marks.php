                   <h1>All Given Marks Of <?php echo $coursename; ?></h1>
                
                    <?php
                        $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                        'heading_row_start'   => '<tr class="dark">',
                        'heading_row_end'     => '</tr>',
                        'row_start'           => '<tr class="light">',
                        'row_end'             => '</tr>',
                        'row_alt_start'       => '<tr class="dark">',
                        'row_alt_end'         => '</tr>');
                    $this->table->set_template($tmpl);
                    $this->table->set_heading('Exam Type','Exam Date', 'Exam Time','Duration','Location','Topic','Marks','Out Of');
                    //var_dump($query_marks);
                    if($query_marks!=FALSE){
                                foreach($query_marks->result_array() as $row){
                                    $this->table->add_row($row['eType'],$row['eDate'],$row['eTime'],$row['Duration'],$row['Location'],$row['Topic'],$row['Marks'],$row['Total']);
                                }
                            echo $this->table->generate();
                            }
                    else{
                        echo "<font color='red'> No Data Available".'</font>';
                        echo br(20);
                    }
                    
                    ?>