<?php

include_once 'TemplateEngine.php';
include_once 'Coffee.php';
include_once 'Tea.php';

$templateEngine = new ex02\TemplateEngine();

$templateEngine->createFile(new Coffee());
$templateEngine->createFile(new Tea());