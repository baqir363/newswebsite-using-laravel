<?php
return [
    'temporary_file_upload' => [
        'disk' => 'local', // or 'public' if needed
        'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,gif', 'max:2048'], // 2MB max
    ],
];
