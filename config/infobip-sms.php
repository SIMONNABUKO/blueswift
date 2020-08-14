<?php

/**
 * This is config for Infobip SMS.
 *
 * @see https://dev.infobip.com/send-sms/single-sms-message
 */
return [
    'from'     => env('INFOBIP_FROM', 'Blueswift'),
    'username' => env('INFOBIP_USERNAME', 'blueswift'),
    'password' => env('INFOBIP_PASSWORD', 'Gucci@1017'),
];
