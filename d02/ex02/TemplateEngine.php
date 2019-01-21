<?php

namespace ex02;

class TemplateEngine {
    public function createFile(\HotBeverage $text) {

        $templatePath = __DIR__ . "/template.html";

        $oReflectionClass = new ReflectionClass($text);

        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);

            foreach ($oReflectionClass->getProperties() as $value ) {
                $propertyName = $value->getName();
                $searchString = '{'.$propertyName.'}';

                $methodName = "get" . ucfirst($propertyName);
                $template = str_replace($searchString, $text->$methodName(), $template);
            }

            $newFile = fopen(__DIR__ . "/{$oReflectionClass->getName()}.html", "w");
            fwrite($newFile, $template);
            fclose($newFile);
        } else {
            echo "File wasn't found\n";
        }
    }
}