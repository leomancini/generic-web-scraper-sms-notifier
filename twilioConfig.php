<?php
    $config = [
        'twilio' => [
            'account_sid' => 'TWILIO_ACCOUNT_SID',
            'auth_token' => 'TWILIO_AUTH_TOKEN',
            'twilio_number' => 'TWILIO_PHONE_NUMBER'
        ],
        'numbersToSendSmsAlert' => [
            'RECIPIENT_PHONE_NUMBER_1',
            'RECIPIENT_PHONE_NUMBER_2',
            'RECIPIENT_PHONE_NUMBER_3'
        ]
    ];

    use Twilio\Rest\Client;

    if (isset($_SERVER['SERVER_NAME'])) {
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            $environment = "Localhost";
        } else {
            $environment = "Remote";
        }
    } else {
        $environment = "Remote";
    }

    if ($environment == "Localhost") {
        require 'PATH_TO_TWILIO_LIBRARY_LOCAL';
    } else if ($environment == "Remote") {
        require 'PATH_TO_TWILIO_LIBRARY_REMOTE';
    }

    function sendSmsAlert($to, $message) {
        global $config;

        $client = new Client($config['twilio']['account_sid'], $config['twilio']['auth_token']);
        $client->messages->create(
            '+1'.$to,
            array(
                'from' => '+1'.$config['twilio']['twilio_number'],
                'body' => $message
            )
        );
    }
?>