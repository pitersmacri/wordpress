<?php
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function test_truncates_to_limit()
    {
        $input = 'one two three four';
        $this->assertSame('one two…', limit_words($input, 2));
    }

    public function test_handles_html()
    {
        $input = '<p>one <strong>two</strong> three</p>';
        $this->assertSame('one two…', limit_words($input, 2));
    }

    public function test_invalid_limit_returns_empty()
    {
        $input = 'anything';
        $this->assertSame('', limit_words($input, 0));
    }

    public function test_multibyte_support()
    {
        $input = 'árvore coração pássaro';
        $this->assertSame('árvore coração…', limit_words($input, 2));
    }
}
