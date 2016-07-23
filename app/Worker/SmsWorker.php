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
    protected $sms;
    
    use Schedule;

    public function __construct()
    {
        $this->sms = (new Sms(Config::get('sms')))->get();
    }

    public function send($mobile, $message)
    {
        $this->sms->send($mobile, $message);

        return ['code' => $this->sms->getCode(), 'message' => $this->sms->getContent()];
    }
}