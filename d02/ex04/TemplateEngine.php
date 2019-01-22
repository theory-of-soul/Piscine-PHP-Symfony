<?php

namespace ex04;

class TemplateEngine {

    private $element;

    public function __construct(Elem $elem) {
        $this->element = $elem;
    }

    public function createFile($fileName) {
        $newFile = fopen(__DIR__ . "/{$fileName}.html", "w");
        fwrite($newFile, $this->element->getHTML());
        fclose($newFile);
    }
}