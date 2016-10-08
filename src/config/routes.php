<?php
return [
    // DefaultController
    ''         => 'default/index',
    'sign-out' => 'sign-in/sign-out',

    // User
//    '<_c>/view'            => '<_c>/not-found',
//    '<_c>/update'          => '<_c>/not-found',
//    '<_c>/<id:\d+>'        => '<_c>/view',
//    '<_c>/<id:\d+>/edit'   => '<_c>/update',
//    '<_c>/<id:\d+>/delete' => '<_c>/delete',

    // Note-Book
    'note-book/view/<identification:[0-9A-Z_-]+>'   => 'note-book/view',
    'note-book/create/<identification:[0-9A-Z_-]+>' => 'note-book/create',
    'note-book/update/<identification:[0-9A-Z_-]+>' => 'note-book/update',
    'note-book/delete/<identification:[0-9A-Z_-]+>' => 'note-book/delete',
    'note-book/<identification:[0-9A-Z_-]+>'        => 'note-book/index',
];
