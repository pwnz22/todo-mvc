<?php

function addGetParams($params = [])
{
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_array = parse_url($url);

    if (!empty($url_array['query'])) {
        parse_str($url_array['query'], $query_array);
        foreach ($params as $key => $value) {
            if ($value == null) {
                unset($query_array[$key]);
            } else {
                $query_array[$key] = $value;
            }
        }
    } else {
        $query_array = $params;
    }

    return 'http://' . $url_array['host'] . $url_array['path'] . '?' . http_build_query($query_array);
}