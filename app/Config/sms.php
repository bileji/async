<?php
/**
 * this source file is sms.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-12 02-02
 */
return [
    // 短信发送策略single, multi
    'tactics' => 'single',

    'channel' => [
        // 云片
        'yun_pian' => [
            // api key
            'api_key' => '326322e0277a4fbb6d3e73af7ed1d4dc',
            // 默认发送渠道
            'default' => true,
            // tactics=multi时生效
            'weight'  => 1
        ],
    ]
];