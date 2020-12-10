<?php


class Mail
{
  public $subject;
  public $from;
  public $to;
  public $body;

  public function __construct($body)
  {
    $parsedBody = json_decode($body);
    $this->subject = $parsedBody->subject;
    $this->from = $parsedBody->from;
    $this->to = $parsedBody->to;
    $this->body = $parsedBody->body;
  }

  /**
   * Convert the object to an array
   *
   * @return array
   */
  public function toArray(): array
  {
    return (array)$this;
  }

}
