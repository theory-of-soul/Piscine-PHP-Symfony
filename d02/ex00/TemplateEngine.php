<?php

namespace ex00;

class TemplateEngine {
    public function createFile($fileName, $templateName, $parameters) {
        $templatePath = __DIR__ . "/" . $templateName;

        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            foreach ($parameters as $key => $value) {
                $searchString = '{'.$key.'}';
                $template = str_replace($searchString, $value, $template);
            }

            $newFile = fopen(__DIR__ . "/{$fileName}.html", "w");
            fwrite($newFile, $template);
            fclose($newFile);
        } else {
            echo "File wasn't found\n";
        }
    }
}