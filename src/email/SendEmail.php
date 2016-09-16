<?php
namespace Project\Email;


return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 465),
    'from' => ['address' => 'forgeddit.com@gmail.com', 'name' => 'forgeddit'],
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

];





class SendEmail
{
  public static function sendEmail($to, $subject, $message, $from = "")
  {
    if(strlen($from) == 0)
        $from = getenv('MAIL_USERNAME');


    $transport = \Swift_SmtpTransport::newInstance(getenv('MAIL_HOST'), getenv('MAIL_PORT'))
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
