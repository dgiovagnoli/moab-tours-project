<?php
namespace Project\Email;

class SendEmail
{
  public static function sendEmail($to, $subject, $message, $from = "")
  {
    if(strlen($from) == 0)
        $from = getenv('MAIL_USERNAME');


    //$transport = \Swift_SmtpTransport::newInstance(getenv('MAIL_HOST'), getenv('MAIL_PORT'))
    $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        ->setUsername(getenv('MAIL_USERNAME'))
        ->setPassword(getenv('MAIL_PASSWORD'));

    $mailer = \Swift_Mailer::newInstance($transport);

    $message = \Swift_Message::newInstance()
        ->setSubject($subject)
        ->setFrom($from)
        ->setTo($to)
        ->setBody($message, 'text/html');

    $result = $mailer->send($message);
  }
}
