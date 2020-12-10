<?php

/***
 * Class Mailer
 * THis class uses SwiftMail , check this url for more documentation:
 * https://swiftmailer.symfony.com/docs/introduction.html
 */
class Mailer
{
  private $transport;
  private $mailer;
  private static $instance;

  private function __construct()
  {
    $this->transport = (
    new Swift_SmtpTransport(
      env('SMTP_SERVER'),
      env('SMTP_PORT'),
      env('SMTP_ENCRYPTION')
    )
    )
      ->setUsername(env('SMTP_USERNAME'))
      ->setPassword(env('SMTP_PASSWORD'));
    $this->mailer = new Swift_Mailer($this->transport);
  }

  /**
   * Get singleton mailer service
   *
   * @return Mailer
   */
  public static function getInstance(): Mailer
  {
    if (isset(self::$instance)) {
      return self::$instance;
    }
    return new Mailer();
  }

  /**
   * Create mail message
   * customBuilder: is a custom message builder
   *
   * @param array $options
   * @param array $defaultOptions
   */
  public static function sendMail(
    $options = [],
    $defaultOptions = [
      'subject' => '',
      'from' => [],
      'to' => [],
      'body' => '',
      'customBuilder' => null
    ]
  )
  {
    $options += $defaultOptions;
    [
      'subject' => $subject,
      'from' => $from,
      'to' => $to,
      'body' => $body,
      'customBuilder' => $customBuilder
    ] = $options;
    $builder = (new Swift_Message($subject));
    if ($customBuilder !== null) {
      $message = $customBuilder($builder);
    } else {
      $message = $builder
        ->setFrom($from)
        ->setTo($to)
        ->setBody($body);
    }
    self::getInstance()
      ->mailer
      ->send($message);
  }
}
