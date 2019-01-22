<?php

include_once 'TemplateEngine.php';
include_once "Elem.php";

$elem = new ex03\Elem('html');
$body = new ex03\Elem('body');
$p = new ex03\Elem('p', 'Lorem ipsum');
$body->pushElement($p);
$elem->pushElement($body);

$templateEngine = new ex03\TemplateEngine($elem);

$templateEngine->createFile("newTemplate");