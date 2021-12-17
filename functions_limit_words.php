<?
/*************************************************************************
				 		functions.php
**************************************************************************/

/* LIMITAR NÚMERO DE PALAVRAS - LIMIT NUMBER WORDS */
function limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit) { array_pop($words); array_push($words, "..."); }
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