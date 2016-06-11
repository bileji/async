<?php
/**
 * this source file is SmsWorker.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-31 17-13
 */
use App\Traits\Schedule;

use App\Utils\Config;
use Bileji\Support\Sms\Factory as Sms;

class SmsWorker
{
    use Schedule;

    public function send($mobile, $message)
    {
        return (new Sms(Config::get('sms')))->send($mobile, $message);
    }
}