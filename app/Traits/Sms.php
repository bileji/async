<?php
/**
 * this source file is Sms.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-15 11-16
 */
namespace App\Traits;

use App\Utils\Config;
use Bileji\Support\Sms\Factory;

trait Sms
{
    protected $sms;

    protected function getSms()
    {
        return $this->sms = (new Factory(Config::get('sms')))->get();
    }

    protected function sendSms($account, $message)
    {
        $this->sms->send($account, $message);

        return ['code' => $this->sms->getCode(), 'message' => $this->sms->getContent()];
    }
}