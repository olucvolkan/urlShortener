<?php


namespace App\Service\UrlShortenerHandlers;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;

interface UrlShortenerHandler
{
    public function setNext(UrlShortenerHandler $handler): UrlShortenerHandler;

    public function handle(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): ?UrlShortenerPostResponseDTO;
}
