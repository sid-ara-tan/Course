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
        'options'=>array(
            'name'=>'Options',
            'link'=>  site_url(),
            'class'=>'icn_settings'
        ),
        'logout'=>array(
            'name'=>'Logout',
            'link'=> site_url('admin/admin/logout'),
            'class'=>'icn_jump_back'
        )
    );

    $data['navigator']=array(
        'Users'=>$users,
        'Admin'=>$admin
    );
?>
