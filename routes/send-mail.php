<?php

/** @var Klein $klein */

use Klein\Klein;
use Klein\Request;
use Klein\Response;

$klein->respond('POST', '/send-mail', function (Request $request, Response $response) use ($klein) {
  $mail = new Mail($request->body());
  try {
    Mailer::sendMail($mail->toArray());
    return $response->json((object)['success' => true]);
  } catch (Exception $exception) {
    return $response->json((object)['error' => $exception->getMessage()]);
  }
});
