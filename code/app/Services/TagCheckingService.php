<?php

namespace App\Services;

class TagCheckingService
{
    public static function check(string $text, &$res = [])
    {
        $pattern = '/\[([a-z])\](.+?)\[\/[a-z]\]/';

        $replacement = '<$1>$2</$1>';

        $replacedText = preg_replace($pattern, $replacement, $text);

        if(preg_match($pattern, $replacedText)) {
            $replacedText = TagCheckingService::check($replacedText, $res);
        }

        return $replacedText;
    }
}
