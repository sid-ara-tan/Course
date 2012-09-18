            <?php
                $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">',
                                'heading_row_start'   => '<tr class="dark">',
                                'heading_row_end'     => '</tr>',
                                'row_start'           => '<tr class="light">',
                                'row_end'             => '</tr>',
                                'row_alt_start'       => '<tr class="dark">',
                                'row_alt_end'         => '</tr>');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Date', 'Course No','Course Name','Time','Duration','Location','Topic','Syllabus');
                if($query_exam!=FALSE){
                            foreach($query_exam->result_array() as $row){
                                $this->table->add_row($row['eDate'],$row['CourseNo'],$row['CourseName'],$row['eTime'],$row['Duration'],$row['Location'],$row['Topic'],$row['Syllabus']);
                            }
                            echo $this->table->generate();
                        }
            
                
            ?>