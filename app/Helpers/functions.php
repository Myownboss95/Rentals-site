<?php



function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

function getStockLevel($quantity) {
    if($quantity > 6) {
        return 'In Stock';
    } else if($quantity <= 6 && $quantity > 0) {
        return 'Low Stock';
    } else {
        return 'Out Of Stock';
    }
}

function format($price) {
    echo '<label>&#8358;</label>'.number_format($price, 2);
}
