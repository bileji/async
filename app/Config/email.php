<?php
/**
 * this source file is email.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-15 10-52
 */
return [
    // 发送服务器
    'smtp'     => [
        'host'   => env('EMAIL_SMTP_HOST', 'smtp.exmail.qq.com'),
        'port'   => env('EMAIL_SMTP_PORT', 465),
        'secure' => env('EMAIL_SMTP_SECURE', 'ssl'), // ssl or tls
        'auth'   => env('EMAIL_SMTP_AUTH', true),
    ],
    'username' => env('EMAIL_USERNAME', 'master@bileji.com'),
    'password' => env('EMAIL_PASSWORD', '2Cb7cc3c'),
    'debug'    => env('EMAIL_DEBUG', 0),
];