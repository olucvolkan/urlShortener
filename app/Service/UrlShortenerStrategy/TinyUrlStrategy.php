<?php


namespace App\Service\UrlShortenerStrategy;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;

class TinyUrlStrategy implements Strategy
{
    public const TINYURL_PROVIDER = 'tinyurl';


    public function request(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): UrlShortenerPostResponseDTO
    {

    }

    public function canSend(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): bool
    {
        //TODO provider is available check should be added
        return  $urlShortenerPostRequestDTO->provider === self::TINYURL_PROVIDER || $urlShortenerPostRequestDTO->provider === UrlShortenerPostRequestDTO::DEFAULT_PROVIDER;
    }
}
