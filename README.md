# WordPress Code Collection

<b>PT-BR</b><br />
Neste repositório estarão alguns códigos que adaptei/desenvolvi nos últimos 10 anos atuando no desenvolvimento de soluções WordPress. Todos os códigos foram refatorados para melhorar segurança, desempenho e manutenibilidade.

<b>EN-US</b><br />
In this repository will be some codes that I adapted/developed in the last 10 years working in the development of WordPress solutions. All codes have been refactored to improve security, performance, and maintainability.

<b>page_id_query_fixed.php</b><br />
Query with fixed ID, refactored to use proper sanitization and error handling.

<b>query_posts_with_counter.php</b><br />
Query posts with counter and pagination error prevention variable. Refactored to use WP_Query instead of deprecated query_posts function.

<b>wp_list_pluck.php</b><br />
WordPress function that facilitates converting an array of items (objects or arrays) into an array of values. It will iterate through all items in the array and replace the item with a specific field value from the item. Refactored with security improvements.

<b>functions_limit_words.php</b><br />
Function to limit the number of words in a text string with proper validation and security measures.
