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
    );

    $course=array(
        'view_course'=>array(
            'name'=>'View Course',
            'link'=>  site_url('admin/course/view_course'),
            'class'=>'icn_categories'
        ),
    );

    $teacher=array(
        'view_teacher'=>array(
            'name'=>'View teachers',
            'link'=>  site_url(),
            'class'=>'icn_categories'
        ),
    );

    $student=array(
        'view_student'=>array(
            'name'=>'View students',
            'link'=>  site_url(),
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
