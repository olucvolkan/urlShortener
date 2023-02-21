<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlShortenerControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_create_shortlinks_returns_a_successful_response(): void
    {
        $response = $this->post('/api/shortlinks', ['provider' => 'bit.ly', 'url' => "https://example.com/"]);
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_create_shortlinks_when_bitly_crashed(): void
    {
        $response = $this->post('/api/shortlinks', ['provider' => 'bit.ly', 'url' => "https://example.com/"]);
        $this->assertMatchesRegularExpression('/tinyurl/', json_decode($response->getContent())->link);

    }
}
