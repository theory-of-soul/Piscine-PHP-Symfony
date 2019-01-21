<?php

class Text {
    private $rows = array();

    function __construct($rows) {
        $this->rows = $rows;
    }

    public function addRow($row) {
        array_push($this->rows, $row);
    }

    public function displayTemplate() {
        $template = "";

        foreach ($this->rows as $value) {
            $template .= "<p>{$value}</p>\n";
        }

        return $template;
    }

}