<?php


namespace App\DTO;


final class UrlShortenerPostRequestDTO
{
    public const DEFAULT_PROVIDER = 'default';
    public string $url;
    public ?string $provider;

    public function __construct(string $url, ?string $provider = self::DEFAULT_PROVIDER)
    {
        $this->url = $url;
        $this->provider = $provider;
    }
}
