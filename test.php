<?php
require_once 'private/init.php';
require __DIR__ . '/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;

$ai = new OpenAi(OPENAI_API_KEY);

$complete = $ai->completion(
    [
        'model' => 'text-davinci-003',
        'prompt' => 'What is 1+s?',
        'temperature' => 0.9,
        'max_tokens' => 150,
        'frequency_penalty' => 0.0,
        'presence_penalty' => 0.6

    ]
);

$complete = json_decode($complete, true);
var_dump($complete);