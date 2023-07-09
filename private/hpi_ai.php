<?php

require '../vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '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';

$HPI_AI = new OpenAi($open_ai_key);


function validateAnswer($question, $response) {

    global $HPI_AI;
    $complete = $HPI_AI->completion(
        [
            'model' => 'text-davinci-003',
            'prompt' => 'A user filled out the prompt: "' . $question . '" and responded with ' . $response . '. if this is a relevant response return true, else return false.',
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0.0,
            'presence_penalty' => 0.6

        ]
    );

    $complete = json_decode($complete, true);
    return $complete['choices'][0]['text'];

}



