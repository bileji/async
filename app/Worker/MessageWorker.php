<?php
/**
 * this source file is MessageWorker.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-15 11-03
 */

use App\Traits\Email;
use App\Traits\Schedule;
use App\Traits\Sms;

class MessageWorker
{
    use Email, Sms, Schedule;

    public function __construct()
    {
        $this->sms = $this->getSms();

        $this->mail = $this->getEmail();
    }

    public function send($account, $message, $title = '')
    {
        if (preg_match('/^1[3|4|5|7|8]\d{9}$/', $account)) {
            return $this->sendSms($account, $message);
        }

        if (preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/', $account)) {
            return $this->sendEmail($account, $message, $title);
        }

        return ['code' => -1, 'message' => 'neither account is not a phone number and e-mail'];
    }
}