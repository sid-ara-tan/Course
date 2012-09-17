<?php
    $users=array(
        'add_new_user'=>array(
            'name'=>'Add New User',
            'link'=>  site_url('admin/users/add_user'),
            'class'=>'icn_add_user'
        ),
        'view_user'=>array(
            'name'=>'View users',
            'link'=>  site_url('admin/users/view_users'),
            'class'=>'icn_view_users'
        ),
    );

    $admin=array(
        'logout'=>array(
            'name'=>'Logout',
            'link'=> site_url('admin/admin/logout'),
            'class'=>'icn_jump_back'
        )
    );

    $department=array(
        'view_department'=>array(
            'name'=>'View Department',
            'link'=>  site_url('admin/department/view_department'),
            'class'=>'icn_categories'
        ),
        'make_routine'=>array(
            'name'=>'Make Routine',
            'link'=>  site_url('admin/department/make_routine'),
            'class'=>'icn_settings'
        ),
        'schedule_period'=>array(
            'name'=>'Schedule Task',
            'link'=>  site_url('admin/department/schedule_period'),
            'class'=>'icn_photo'
        )
    );

    $course=array(
        'view_course'=>array(
            'name'=>'View Course',
            'link'=>  site_url('admin/course/view_course'),
            'class'=>'icn_categories'
        ),

        'assign_teacher_course'=>array(
            'name'=>'Assign teacher for Course',
            'link'=>  site_url('admin/course/assign_teacher_for_these_course'),
            'class'=>'icn_settings'
        ),
    );

    $teacher=array(
        'view_teacher'=>array(
            'name'=>'View teachers',
            'link'=>  site_url('admin/teacher/view_teacher'),
            'class'=>'icn_categories'
        )
    );

    $student=array(
        'view_student'=>array(
            'name'=>'View students',
            'link'=>  site_url('admin/student/view_student'),
            'class'=>'icn_categories'
        ),

        'manage_student_group'=>array(
            'name'=>'Manage student group',
            'link'=>  site_url('admin/student/manage_group_of_student'),
            'class'=>'icn_view_users'
        ),
        'add_student'=>array(
            'name'=>'Creat a student',
            'link'=>  site_url('admin/student/add_a_student'),
            'class'=>'icn_new_article'
        ),
        'taken_course'=>array(
            'name'=>'Pending Request',
            'link'=>  site_url('admin/student/pending_request'),
            'class'=>'icn_categories'
        ),
    );

    $data['navigator']=array(
        'Department'=>$department,
        'Course'=>$course,
        'Teacher'=>$teacher,
        'Student'=>$student,
        'Users'=>$users,
        'Admin'=>$admin
    );


?>
