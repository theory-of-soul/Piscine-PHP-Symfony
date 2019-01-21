<?php

include_once 'TemplateEngine.php';
include_once 'Text.php';

$templateEngine = new ex01\TemplateEngine();
$templateText = new Text(array("first row", "second row"));

$templateEngine->createFile("newTemplate", $templateText);