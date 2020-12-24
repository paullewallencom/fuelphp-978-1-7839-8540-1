<?php

Autoloader::add_core_namespace('Captcha');

Autoloader::add_classes(array(
	'Captcha\\Captcha' => __DIR__ . '/classes/captcha.php',
	'Captcha\\CaptchaException' => __DIR__ . '/classes/captcha.php',
    'Captcha\\Model_Captcha_Answer' => __DIR__ . '/classes/model/captcha/answer.php',
));
