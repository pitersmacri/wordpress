<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../page_id_query_fixed.php';

final class PageQueryHelperTest extends TestCase
{
    public function test_builds_safe_query_args_for_valid_page_id(): void
    {
        $args = wp_main_build_page_query_args(12, 'page', 'publish');

        $this->assertSame([
            'p' => 12,
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'no_found_rows' => true,
            'ignore_sticky_posts' => true,
        ], $args);
    }

    public function test_rejects_invalid_page_id(): void
    {
        $this->assertFalse(wp_main_build_page_query_args(0));
        $this->assertFalse(wp_main_build_page_query_args(-5));
        $this->assertFalse(wp_main_build_page_query_args('invalid'));
    }

    public function test_falls_back_to_safe_defaults_for_invalid_values(): void
    {
        $args = wp_main_build_page_query_args(12, 'custom-type', 'draft');

        $this->assertSame('page', $args['post_type']);
        $this->assertSame('publish', $args['post_status']);
    }
}
