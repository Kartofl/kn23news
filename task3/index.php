<?php
function transformText($text) {
    $text = preg_replace('/[\s\W\d]+/', '', $text);

    $result = ' ';
    $default = true; // Починаємо з маленької літери
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text [$i];
        $result .= $default ? strtolower($char) : strtoupper($char);
        $default = !$default;
    }

    return $result;
}


$input = "Психологія - наука, що вивчає психічні явища (мислення, почуття, волю) та поведінку людини, пояснення якої знаходимо в цих явищах.";
echo transformText($input);





