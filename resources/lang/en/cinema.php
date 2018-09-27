<?php
return [
    'admin' => [
        'title' => 'Cinema',
        'list' => [
            'title' => 'List Cinemas'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'description' => 'Description',
            'tel' => 'Tel',
            'delete' => 'Delete',
            'edit' => 'Edit',
        ],
        'add' => [
            'title' => 'Add Cinema',
            'name' => 'Producer',
            'name' => 'Name',
            'address' => 'Address',
            'description' => 'Description',
            'tel' => 'Phone Number',
            'submit' => 'Submit',
            'edit' => 'Edit',
            'show' => 'Show',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'placeholder_name' => 'Enter name cinema',
            'placeholder_address' => 'Enter name address',
            'placeholder_tel' => 'Enter phone number',
            'placeholder_description' => 'Enter description',
            'message' => [
                'require_name' => 'Please enter name cinema.',
                'require_address' => 'Please enter address.',
                'require_tel' => 'Please enter phone.',
                'require_description' => 'Please enter description.',
            ],
        ],
        'edit' => [
            'title' => 'Edit Cinema',
        ],
        'message' => [
            'add' => 'Create New Cinema Successfull!',
            'add_fail' => 'Can not add New Cinema. Please check connect database!',
            'edit' => 'Update Cinema Successfull!',
            'edit_fail' => 'Cannot update by cinema!',
            'del' => 'Delete Cinema Successfull!',
            'del_fail' => 'Can not Delete Cinema. Please check connect database!',
            'msg_del' => 'Do you want to delete this Cinema?',
        ]
    ]
];
