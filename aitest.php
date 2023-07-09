<?php
require_once 'private/init.php';
require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.
use Orhanerday\OpenAi\OpenAi;

$ai_key = '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';
$HPI_AI = new OpenAi($ai_key);