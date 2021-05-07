<?php
return array(
    "article/show/([0-9]+)" => [
        "controller" => "article",
        "action" => "show",
    ],
    "articles" => [
        "controller" => "article",
        "action" => "index"
    ],
    "articles/category/([0-9]+)" => [
        "controller" => "article",
        "action" => "category"
    ],
    "contact" => [
        "controller" => "main",
        "action" => "contact"
    ],
    "" => [
        "controller" => "main",
        "action" => "index"
    ]
);