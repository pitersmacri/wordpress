# limit_words helper for WordPress

This repository contains a small helper function `limit_words()` implemented for WordPress contexts. The function safely truncates text to a given number of words, supports multibyte characters, and performs basic sanitization.

---

## English — Overview

- **Function:** `limit_words($string, $word_limit)`
- **Purpose:** Truncate a text string to a maximum number of words and append an ellipsis when truncated.

Behavior and safeguards:
- Accepts any scalar input and casts to string.
- Removes HTML tags using `wp_strip_all_tags()` before counting words.
- Normalizes whitespace (collapses multiple spaces and Unicode whitespace) and supports UTF-8 / multibyte characters.
- Returns an empty string for invalid or non-positive `$word_limit` values.
- Sanitizes the returned text with `sanitize_text_field()`; still prefer escaping on output (e.g. `esc_html()`).

Example usage in a theme template:

```php
// Get the post title
$text = get_the_title();

// Print up to 7 words (escape at output)
echo esc_html( limit_words( $text, 7 ) );
```

Notes:
- The function is defined in `functions_limit_words.php`.
- The function avoids side-effects so it can be safely included by test bootstraps.

---

## Tests (local)

Prerequisites: PHP, Composer.

To install dev dependencies and run the test suite locally:

Windows (PowerShell):
```powershell
composer install
vendor\bin\phpunit --colors=always --testdox
```

Unix / Git Bash:
```bash
composer install
./vendor/bin/phpunit --colors=always --testdox
```

CI: a GitHub Actions workflow is included at `.github/workflows/phpunit.yml` and runs the same commands.

---

## Português — Visão geral

- **Função:** `limit_words($string, $word_limit)`
- **Objetivo:** Trunca um texto para um número máximo de palavras e adiciona reticências quando truncado.

Comportamento e medidas de segurança:
- Aceita qualquer entrada escalar e converte para string.
- Remove tags HTML com `wp_strip_all_tags()` antes de contar as palavras.
- Normaliza espaços (colapsa múltiplos espaços e considera espaços Unicode) e suporta UTF-8 / multibyte.
- Retorna string vazia para `$word_limit` inválido ou não positivo.
- Sanitiza o resultado com `sanitize_text_field()`; recomenda-se escapar no output (ex.: `esc_html()`).

Exemplo de uso em template:

```php
// Recebe o título do post
$text = get_the_title();

// Imprime até 7 palavras (escape ao exibir)
echo esc_html( limit_words( $text, 7 ) );
```

Observações:
- A função está em `functions_limit_words.php`.
- A função não produz efeitos colaterais, facilitando inclusão em testes.

---

If you want, I can also:
- add a short example file demonstrating usage (outside the functions file),
- or add static analysis (`phpstan`) and wire it into CI.
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
