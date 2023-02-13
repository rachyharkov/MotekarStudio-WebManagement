<?php

if(!function_exists('generate_contrast_text')) {
    function generate_contrast_text($hexcolor)
    {
        $hexcolor = str_replace('#', '', $hexcolor);
        $r = hexdec(substr($hexcolor, 0, 2));
        $g = hexdec(substr($hexcolor, 2, 2));
        $b = hexdec(substr($hexcolor, 4, 2));
        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
        return ($yiq >= 128) ? 'black' : 'white';
    }
}

if(!function_exists('social_media_list')) {
    function social_media_list($generate_as = null) {
        $arraySosmed = [
            ['value' => 'Facebook', 'text' => 'Facebook', 'background' => '#3b5998', 'color' => '#fff'],
            ['value' => 'Twitter', 'text' => 'Twitter', 'background' => '#1da1f2', 'color' => '#fff'],
            ['value' => 'Instagram', 'text' => 'Instagram', 'background' => '#e1306c', 'color' => '#fff'],
            ['value' => 'Youtube', 'text' => 'Youtube', 'background' => '#ff0000', 'color' => '#fff'],
            ['value' => 'Linkedin', 'text' => 'Linkedin', 'background' => '#0077b5', 'color' => '#fff'],
            ['value' => 'Pinterest', 'text' => 'Pinterest', 'background' => '#bd081c', 'color' => '#fff'],
            ['value' => 'Tumblr', 'text' => 'Tumblr', 'background' => '#35465c', 'color' => '#fff'],
            ['value' => 'Reddit', 'text' => 'Reddit', 'background' => '#ff4500', 'color' => '#fff'],
            ['value' => 'Github', 'text' => 'Github', 'background' => '#333', 'color' => '#fff'],
            ['value' => 'Dribbble', 'text' => 'Dribbble', 'background' => '#ea4c89', 'color' => '#fff'],
            ['value' => 'Behance', 'text' => 'Behance', 'background' => '#1769ff', 'color' => '#fff'],
            ['value' => 'Codepen', 'text' => 'Codepen', 'background' => '#000', 'color' => '#fff'],
            ['value' => 'Stack Overflow', 'text' => 'Stack Overflow', 'background' => '#f48024', 'color' => '#fff'],
            ['value' => 'Slack', 'text' => 'Slack', 'background' => '#4a154b', 'color' => '#fff'],
            ['value' => 'Vk', 'text' => 'VK', 'background' => '#4a76a8', 'color' => '#fff'],
            ['value' => 'Soundcloud', 'text' => 'Soundcloud', 'background' => '#ff5500', 'color' => '#fff'],
            ['value' => 'Spotify', 'text' => 'Spotify', 'background' => '#1ed760', 'color' => '#fff'],
            ['value' => 'Whatsapp', 'text' => 'Whatsapp', 'background' => '#25d366', 'color' => '#fff'],
            ['value' => 'Telegram', 'text' => 'Telegram', 'background' => '#0088cc', 'color' => '#fff'],
            ['value' => 'Twitch', 'text' => 'Twitch', 'background' => '#6441a5', 'color' => '#fff'],
            ['value' => 'Vimeo', 'text' => 'Vimeo', 'background' => '#1ab7ea', 'color' => '#fff'],
            ['value' => 'Flickr', 'text' => 'Flickr', 'background' => '#ff0084', 'color' => '#fff'],
            ['value' => 'Foursquare', 'text' => 'Foursquare', 'background' => '#0072b1', 'color' => '#fff'],
            ['value' => 'Yelp', 'text' => 'Yelp', 'background' => '#af0606', 'color' => '#fff'],
            ['value' => 'Tripadvisor', 'text' => 'Tripadvisor', 'background' => '#589442', 'color' => '#fff'],
            ['value' => 'Medium', 'text' => 'Medium', 'background' => '#02b875', 'color' => '#fff'],
            ['value' => 'Deviantart', 'text' => 'Deviantart', 'background' => '#05cc47', 'color' => '#fff'],
            ['value' => 'Digg', 'text' => 'Digg', 'background' => '#000', 'color' => '#fff'],
            ['value' => 'Dropbox', 'text' => 'Dropbox', 'background' => '#007ee5', 'color' => '#fff'],
        ];

        if($generate_as == 'json') {
            return json_encode($arraySosmed);
        } else {
            return collect($arraySosmed);
        }
    }
}
