<?php

include_once 'TemplateEngine.php';
include_once "Elem.php";

$elem = new ex04\Elem('html');
$body = new ex04\Elem('body');
$body->pushElement(new ex04\Elem('p', 'Lorem ipsum', ['class' => 'text-muted']));
$elem->pushElement($body);

$templateEngine = new ex04\TemplateEngine($elem);

$templateEngine->createFile("newTemplate");