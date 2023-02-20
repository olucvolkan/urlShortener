<?php


namespace App\Service\UrlShortenerStrategy;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;

interface Strategy
{
    public function canSend(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): bool;

    public function request(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): UrlShortenerPostResponseDTO;
}
