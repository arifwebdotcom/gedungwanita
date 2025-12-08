<?php

function create_captcha_ci4()
{
    $permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

    $word = substr(str_shuffle($permitted_chars), 0, 5);

    $img = imagecreatetruecolor(150, 50);

    $bg = imagecolorallocate($img, 255, 255, 255);
    $textcolor = imagecolorallocate($img, 0, 0, 0);

    imagefilledrectangle($img, 0, 0, 150, 50, $bg);

    // tulis captcha
    imagettftext(
        $img,
        20,
        rand(-10, 10),
        20,
        35,
        $textcolor,
        FCPATH . 'assets/fonts/arial.ttf',  // ubah sesuai font yang ada
        $word
    );

    ob_start();
    imagepng($img);
    $image_data = ob_get_contents();
    ob_end_clean();

    imagedestroy($img);

    $base64 = 'data:image/png;base64,' . base64_encode($image_data);

    return [
        'word'  => $word,
        'image' => "<img src='{$base64}' class='border rounded'>"
    ];
}
