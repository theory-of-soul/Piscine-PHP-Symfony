<?php

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
        "div"
    );

    private $element = array(
        "tagName" => null,
        "content" => array()
    );

    private $html = "";

    public function __construct($tagName, $content = null) {
        if (in_array($tagName, $this->supportTags)) {
            $this->element = array(
                "tagName" => $tagName,
                "content" => is_null($content) ? array() : array($content)
            );
        } else {
            $this->html .= "tag {$tagName} doesn't support\n";
            exit;
        }
    }

    public function pushElement(\Elem $element) {
        array_push($this->element["content"], $element);
    }

    public function getHTML($html = "") {
        $tagNeedToClose = array();

        foreach ($this->element as $key => $value) {
            if ($key === "tagName") {
                $this->html .= "\n<{$value}>";
                array_push($tagNeedToClose, $value);
            } elseif ($key === "content") {
                foreach ($value as $contentKey => $contentValue) {
                    if ($contentValue instanceof Elem) {
                        $this->html .= $contentValue->getHTML($html);
                    } else {
                        $this->html .=  "{$contentValue}";

                        $closeTag = array_shift($tagNeedToClose);
                        $this->html .=  "</{$closeTag}>\n";
                    }
                }
            }
        }

        foreach ($tagNeedToClose as $value) {
            $this->html .=  "</{$value}>\n";
        }

        return $this->html;
    }
}