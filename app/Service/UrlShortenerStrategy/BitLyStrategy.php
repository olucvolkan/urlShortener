<?php


namespace App\Service\UrlShortenerStrategy;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;

class BitLyStrategy implements  Strategy
{
    public const BITLY_PROVIDER = 'bitly';

    public function request(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): UrlShortenerPostResponseDTO
    {
        // TODO: Implement execute() method.
    }

    public function canSend(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): bool
    {
        //TODO provider is available check should be added
        return  $urlShortenerPostRequestDTO->provider === self::BITLY_PROVIDER;
    }
}
