<?php

include_once 'TemplateEngine.php';
include_once "Elem.php";

$elem = new Elem('html');
$body = new Elem('body');
$body->pushElement(new Elem('p', 'Lorem ipsum'));
$elem->pushElement($body);

$templateEngine = new ex03\TemplateEngine($elem);

$templateEngine->createFile("newTemplate");