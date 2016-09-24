<?php
return [
    // DefaultController
    ''         => 'default/index',
    'sign-out' => 'sign-in/sign-out',

    // User
    '<_c>/view'            => '<_c>/not-found',
    '<_c>/update'          => '<_c>/not-found',
    '<_c>/<id:\d+>'        => '<_c>/view',
    '<_c>/<id:\d+>/edit'   => '<_c>/update',
    '<_c>/<id:\d+>/delete' => '<_c>/delete',
];
