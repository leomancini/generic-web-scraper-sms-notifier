<?php
    require('twilioConfig.php');
    require('getInfo.php');

    $data = getInfoMultiple();
    $instances = json_decode($data, true);

    $sendAlert = false;

    foreach($instances as $instance) {
        if ($location['field1'] !== false) {
            $sendAlert = true;
        }
    }

    // DEBUG
    // $sendAlert = true;

    if ($sendAlert === true) {
        $message = "AVAILABLE\n\n";

        if ($location['field1']) {
            $message .= "\n".$location['field1'];
        }

        if ($location['field3']) {
            $message .= "\n".$location['field2'];
        }

        if ($location['field3']) {
            $message .= "\n".$location['field3'];
        }

        foreach ($config['numbersToSendSmsAlert'] as $number) {
            sendSmsAlert($number, $message);
        }
    }
