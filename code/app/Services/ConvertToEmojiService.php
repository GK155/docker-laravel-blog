<?php

namespace App\Services;

class ConvertToEmojiService
{
    protected $array = [
        ':)' => "\u{1F600}",
        ';)' => "\u{1F601}",
    ];

    public function convert(array $comments)
    {
        foreach ($comments as $comment) {
            $comment->text = str_replace(array_keys($this->array), $this->array, $comment->text);
        }

        return $comments;
    }

}
