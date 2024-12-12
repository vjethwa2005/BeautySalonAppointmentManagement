<?php
    require_once('vendor/autoload.php');
    $google = new Google_Client();

    $google->setClientId('1018816285311-g4en7lhb86rejn4obrvl9ckerlsjsag5.apps.googleusercontent.com');

    $google->setClientSecret('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');

    $google->setRedirectUri('http://127.0.0.1:5500/home.html');

    $google->addScope('email');

    $google->addScope('profile');

    session_start();
?>