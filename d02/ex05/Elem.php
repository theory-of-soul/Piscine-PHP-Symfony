<?php

namespace ex05;

include_once "MyException.php";

class Elem {

    private $supportTags = array(
        "meta",
        "img",
        "hr",
        "br",
        "html",
        "head",
        "body",
        "title",
        "h1",
        "h2",
        "h3",
        "h4",
        "h5",
        "h6",
        "p",
        "span",
        "div",
        "table",
        "tr",
        "th",
        "td",
        "ul",
        "ol",
        "li"
    );

    private $element;

    private $html = "";

    public function __construct($tagName, $content = null, $attributes = array()) {
        if (in_array($tagName, $this->supportTags)) {
            $this->element = array(
                "tagName" => $tagName,
                "content" => is_null($content) ? array() : array($content),
                "attributes" => $attributes
            );
        } else {
            $myException = new MyException();
            $myException->throwTagException($tagName);
        }
    }

    public function pushElement(Elem $element) {
        array_push($this->element["content"], $element);
    }

    public function getHTML($html = "") {
        $tagNeedToClose = array();

        foreach ($this->element as $key => $value) {
            if ($key === "tagName") {
                $attributes = $this->getInlineAttributes($this->element["attributes"]);
                $this->html .= "\n<{$value}{$attributes}>";
                array_push($tagNeedToClose, $value);
            } elseif ($key === "content") {
                foreach ($value as $contentKey => $contentValue) {
                    if ($contentValue instanceof Elem) {
                        $this->html .= $contentValue->getHTML($html);
                    } else {
                        $this->html .=  "{$contentValue}";

                        $closeTag = array_shift($tagNeedToClose);
                        if ($closeTag != 'meta') {
                            $this->html .=  "</{$closeTag}>\n";
                        }
                    }
                }
            }
        }

        foreach ($tagNeedToClose as $value) {
            $this->html .=  "</{$value}>\n";
        }

        return $this->html;
    }

    public function getElementDescription() {
        return $this->element;
    }

    public function validPage() {

        if ($this->element["tagName"] != "html") {
            return false;
        }


        return $this->checkValidContent();
    }

    private function checkValidContent() {
        $thisContent = $this->element["content"];

        foreach ($thisContent as $childElement) {
            if ($childElement instanceof Elem) {
                $isValidElement = $this->checkValidElement($childElement);
                if ($isValidElement) {
                    if (!$childElement->checkValidContent()) {
                        return false;
                    };
                } else {
                    return false;
                }
            }
        }

        return true;
    }

    private function checkValidElement($childElement) {

        $thisElement = $this->element["tagName"];
        $thisContent = $this->element["content"];

        var_dump($childElement->getElementDescription()["tagName"]);

        // the parent element / tag is html and contains exactly one head element followed by a body element
        if ($thisElement == "html") {
            if (!$thisContent[0] instanceof Elem ||
                !$thisContent[1] instanceof Elem ||
                $thisContent[0]->getElementDescription()["tagName"] != "head" ||
                $thisContent[1]->getElementDescription()["tagName"] != "body") {
                return false;
            }
        }

        // the head element should contain a single title element and a single element meta charset
        if ($thisElement == "head") {
            if (count($thisContent) != 2 ||
                ((!$thisContent[0] instanceof Elem || !$thisContent[1] instanceof Elem) ||
                !(($thisContent[0]->getElementDescription()["tagName"] == "meta" && $thisContent[1]->getElementDescription()["tagName"] == "title") ||
                ($thisContent[1]->getElementDescription()["tagName"] == "meta" && $thisContent[0]->getElementDescription()["tagName"] == "title")))
            ) {
                return false;
            }

            $descriptionChildElement = $childElement->getElementDescription();
            if ($descriptionChildElement["tagName"] == "meta" && !key_exists("charset", $descriptionChildElement["attributes"])) {
                return false;
            }
        }

        // the p tag should not contain any other tags, only text
        if (($thisElement == 'p') && (count($thisContent) != 1 || !is_string($thisContent[0]))
        ) {
            return false;
        }

        // the table tag should contain only tr tags
        if ($thisElement == "table") {
           if ( $childElement->getElementDescription()["tagName"] != "tr") {
               return false;
           }
        }

        // the tr tag containing only th or td tags
        if ($thisElement == "tr") {
           if ($childElement->getElementDescription()["tagName"] != "th" &&
               $childElement->getElementDescription()["tagName"] != "td"
           ) {
               return false;
           }
        }

        if (($thisElement == "ol" || $thisElement == "ul") &&
            $childElement->getElementDescription()["tagName"] != "li"
        ) {
            return false;
        }

        return true;
    }

    private function getInlineAttributes($attributes) {
        $attrString = "";

        foreach($attributes as $key => $value) {
            $attrString .= " {$key}=\"{$value}\"";
        }

        return $attrString;
    }
}