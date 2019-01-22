<?php

include_once 'TemplateEngine.php';
include_once "Elem.php";

$elem = new ex05\Elem('html');
$body = new ex05\Elem('body');
$head = new ex05\Elem('head');
$table = new ex05\Elem('table');
$tr1 = new ex05\Elem('tr');
$ul = new ex05\Elem('ul');

$head->pushElement(new ex05\Elem('meta', '', ["charset" => "UTF-8"]));
$head->pushElement(new ex05\Elem('title', 'Page title'));

$tr1->pushElement(new \ex05\Elem('th', 'Here th'));
$table->pushElement($tr1);

$ul->pushElement(new \ex05\Elem('li', 'li 1'));
$ul->pushElement(new \ex05\Elem('li', 'li 2'));
$ul->pushElement(new \ex05\Elem('li', 'li 3'));

$body->pushElement(new ex05\Elem('p', 'Next tag is ul:', ['class' => 'text-muted']));
$body->pushElement($ul);
$body->pushElement($table);

$elem->pushElement($head);
$elem->pushElement($body);

$templateEngine = new ex05\TemplateEngine($elem);

if ($elem->validPage()) {
    $templateEngine->createFile("newTemplate");
} else {
    echo "\nIt's not valid page\n";
}
