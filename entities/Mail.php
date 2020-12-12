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
      /**
       * $get_object_vars = get_object_vars($this);
        unset($get_object_vars['parsedBody']);
        return $get_object_vars;
       */
    return (array)$this;
  }

}
