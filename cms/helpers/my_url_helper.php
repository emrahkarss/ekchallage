<?php
function url_title($str, $separator = 'dash', $lowercase = FALSE)
{
    if ($separator == 'dash')
    {
        $search = '-';
        $replace = '-';
    }
    else
    {
        $search = '-';
        $replace = '-';
    }

    $trans = array(
        '&\#\d+?;' => '',
        '&\S+?;' => '',
        '\s+' => $replace,
        '\.' => $replace,
        '[^a-z0-9\-_]' => '',
        $replace . '+' => $replace,
        $replace . '$' => $replace,
        '^' . $replace => $replace,
        '\.+$' => ''
    );

    $search_tr = array('ı', 'İ', 'Ğ', 'ğ', 'Ü', 'ü', 'Ş', 'ş', 'Ö', 'ö', 'Ç', 'ç');
    $replace_tr = array('i', 'i', 'g', 'g', 'u', 'u', 's', 's', 'o', 'o', 'c', 'c');
    $str = str_replace($search_tr, $replace_tr, $str);

    $str = strip_tags($str);

    foreach ($trans as $key => $val)
    {
        $str = preg_replace("#" . $key . "#i", $val, $str);
    }

    if ($lowercase === TRUE)
    {
        $str = strtolower($str);
    }

    return strtolower(trim(stripslashes($str)));
}
?>
