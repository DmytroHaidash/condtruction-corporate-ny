<?php

//Function phone link for tel link
if (!function_exists('phone_link')) {
    function phone_link($phone)
    {
        return str_replace([' ', '(', ')', '-'], '', $phone);
    }
}

if (!function_exists('remove_tags')) {
    function remove_tags($text, $limit = 100)
    {
        return Str::limit(preg_replace('/<[^>]*>/', ' ', $text), $limit);
    }
}

if (!function_exists('get_video_id')) {
    function get_video_id($url)
    {
        if (!$url) {
            return null;
        }

        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
            $url, $matches);
        return $matches[1];
    }
}

