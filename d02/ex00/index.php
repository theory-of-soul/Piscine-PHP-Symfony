<?php

include_once 'TemplateEngine.php';

$templateEngine = new ex00\TemplateEngine();

$parameters = array(
    "title" => "Война и мир",
    "author" => "Толстой"
);

$templateEngine->createFile("newTemplate", "book_description.html", $parameters);