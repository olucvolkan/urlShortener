<?php


namespace App\Service\UrlShortenerHandlers;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;

abstract class AbstractHandler implements UrlShortenerHandler
{
    /**
     * @var UrlShortenerHandler;
     */
    private  $nextHandler;

    public function setNext(UrlShortenerHandler $urlShortenerHandler): UrlShortenerHandler
    {
        $this->nextHandler = $urlShortenerHandler;
        return $urlShortenerHandler;
    }

    public function handle(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): ?UrlShortenerPostResponseDTO
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($urlShortenerPostRequestDTO);
        }

        return null;
    }
}
