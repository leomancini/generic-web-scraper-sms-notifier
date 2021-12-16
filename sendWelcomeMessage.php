<?php
    require('twilioConfig.php');

    // Initial message
    foreach ($config['numbersToSendSmsAlert'] as $number) {
        sendSmsAlert($number, 'Welcome to the SMS Alert System!');
        sleep(1);
        sendSmsAlert($number, 'This number is not set up for replies. Please contact customer service for questions or comments.');
    }
?>