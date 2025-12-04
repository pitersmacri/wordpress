<?php
/*************************************************************************
				 		functions.php
**************************************************************************/

/* LIMITAR NÚMERO DE PALAVRAS - LIMIT NUMBER WORDS */
function limit_words($string, $word_limit)
{
    // Validate inputs
    if (!is_string($string) || !is_numeric($word_limit)) {
        return $string;
    }
    
    $word_limit = (int)$word_limit;
    if ($word_limit <= 0) {
        return '';
    }
    
    // Use wp_strip_all_tags to remove HTML tags for proper word counting
    $clean_string = wp_strip_all_tags($string);
    
    $words = explode(' ', $clean_string, ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
        array_push($words, '...');
    }
    return implode(' ', $words);
}

?>


<!-- como usar no template  -->
<?php
	/* variável recebe o título do post/page */ 
	$text = get_the_title(); 

	/* imprimir título com 07 palavras */
	echo(limit_words($text,7)); 
?>