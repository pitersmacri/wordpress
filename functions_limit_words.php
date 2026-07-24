<?php
/*************************************************************************
				 		functions.php
**************************************************************************/

/*
 * LIMITAR NÚMERO DE PALAVRAS - LIMIT NUMBER WORDS
 *
 * Melhora: suporta strings multibyte, normaliza espaços, valida parâmetros
 * e sanitiza a saída. Use `esc_html()` ao imprimir se necessário.
 *
 * @param string $string Texto de entrada (título, conteúdo reduzido, etc.)
 * @param int    $word_limit Número máximo de palavras a retornar
 * @return string Texto truncado com reticências quando necessário
 */
if (!function_exists('limit_words')) {
    function limit_words($string, $word_limit)
    {
        // Garantir tipos básicos — evita warnings/erros
        if (!is_scalar($string)) {
            return '';
        }

        // Normalizar e validar limite de palavras
        $word_limit = (int) $word_limit;
        if ($word_limit <= 0) {
            return '';
        }

        // Remover tags HTML para contagem de palavras correta
        $clean = wp_strip_all_tags((string) $string);

        // Remover espaços extras e separar por qualquer espaço unicode
        $clean = trim(preg_replace('/\s+/u', ' ', $clean));
        if ($clean === '') {
            return '';
        }

        // Quebrar em palavras com suporte UTF-8
        $words = preg_split('/\s+/u', $clean);

        // Se já estiver dentro do limite, retornar a versão sanitizada
        if (count($words) <= $word_limit) {
            return sanitize_text_field($clean);
        }

        // Construir trecho com limite e adicionar reticências de forma segura
        $slice = array_slice($words, 0, $word_limit);
        $result = implode(' ', $slice) . '…'; // caractere de reticências (UTF-8)

        // Sanitizar antes de retornar — o chamador deve escapar ao imprimir
        return sanitize_text_field($result);
        }
    }
