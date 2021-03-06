<?php
/**
 * this source file is Email.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-15 11-13
 */
namespace App\Traits;

use App\Utils\Config;
use PHPMailer;

trait Email
{
    protected $email;

    protected function getEmail()
    {
        $this->email = new PHPMailer();

        $this->email->isSMTP();

        $this->email->Host = Config::get('email.smtp.host');
        $this->email->SMTPAuth = Config::get('email.smtp.auth');
        $this->email->Username = Config::get('email.username');
        $this->email->Password = Config::get('email.password');
        $this->email->SMTPSecure = Config::get('email.smtp.secure');
        $this->email->Port = Config::get('email.smtp.port');

        $this->email->isHTML(true);
        $this->email->setFrom(Config::get('email.username'), '比乐集');

        return $this->email;
    }

    protected function sendEmail($account, $message, $title = '', $alt_body = '')
    {
        $this->email->addAddress($account, 'customer');

        $this->email->Subject = empty($title) ? $message : $title;
        $this->email->Body = $this->formatBody($message);
        $this->email->AltBody = empty($alt_body) ? '此信为系统邮件，请不要直接回复。' : $alt_body;

        return $this->email->send() ? ['code' => 0, 'message' => 'sent e-mail success'] : ['code' => -1, 'message' => $this->email->ErrorInfo];
    }

    protected function formatBody($body)
    {
        return "尊敬的用户:<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;" . str_replace('【比乐集】您好，', '', $body) . "<br/><br/>此信为系统邮件，请不要直接回复。";
    }
}