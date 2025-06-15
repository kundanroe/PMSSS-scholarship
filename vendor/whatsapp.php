<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once 'autoload.php';
    use Twilio\Rest\Client;

    $sid    = "ACe36920ae7abefe9868fd87820cc09932";
    $token  = "fbf07bab64325c3212aeb22fbef154a9";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+919934570077", // to
        array(
          "from" => "whatsapp:+14155238886",
          "contentSid" => "HXb5b62575e6e4ff6129ad7c8efe1f983e",
          // "contentVariables" => "hello",
          "body" => "Your Message"
        )
      );

print($message->sid);