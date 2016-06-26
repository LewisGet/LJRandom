<?php

require_once __DIR__ . "/RandomCreate.php";

$items = explode(", ", "失誤, 驚嚇, 挑性, 故意, 惡搞, 意外, 痛苦, 耗時, 倒楣");

$mainString = new RandomCreate($items);
$mainString->debugPrint();
