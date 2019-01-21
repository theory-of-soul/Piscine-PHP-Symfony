<?php

namespace ex01;

class TemplateEngine {
    public function createFile($fileName, \Text $text) {

        $template = "<!doctype html>\n<html lang=\"en\">\n<head>\n<title>Text</title>\n</head>\n<body>\n";

        $template .= $text->displayTemplate();

        $template .= "</body>\n</html>";

        $newFile = fopen(__DIR__ . "/{$fileName}.html", "w");
        fwrite($newFile, $template);
        fclose($newFile);
    }
}