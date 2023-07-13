<?php

function is_appropriate_username($username, $USERNAME_AI) {

    $complete = $USERNAME_AI->completion(
        [
            'model' => 'text-davinci-003',
            'prompt' => 'A user entered the username: ' . $username . '. if this is an appropriate username with no bad words return 1, else return 0.',
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0.0,
            'presence_penalty' => 0.6

        ]
    );

    $complete = json_decode($complete, true);
    if($complete['choices'][0]['text'] == '1') {
        return true;
    } else {
        return false;
    }

}

function validateAnswer($question, $response, $HPI_AI) {

    $complete = $HPI_AI->completion(
        [
            'model' => 'text-davinci-003',
            'prompt' => 'A user filled out the prompt: "' . $question . '" and responded with ' . $response . '. if this is a relevant response return 1, else return 0.',
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0.0,
            'presence_penalty' => 0.6

        ]
    );

    $complete = json_decode($complete, true);
    if($complete['choices'][0]['text'] == '1') {
        return true;
    } else {
        return false;
    }

}

