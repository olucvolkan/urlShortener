<?php


namespace App\Service;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;
use App\Service\UrlShortenerHandlers\BitLyUrlShortenerHandler;
use App\Service\UrlShortenerHandlers\TinyUrlUrlShortenerHandler;

class UrlShortenerService
{

    /**
     * @param UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO
     * @return UrlShortenerPostResponseDTO
     */
    public function urlShort(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): UrlShortenerPostResponseDTO
    {

        $bitLyUrlHandler = new BitLyUrlShortenerHandler();
        if ($urlShortenerPostRequestDTO->provider === 'default' ||
            $urlShortenerPostRequestDTO->provider === TinyUrlUrlShortenerHandler::TINYURL_PROVIDER ) {
            $tinyUrlHandler = new TinyUrlUrlShortenerHandler();
            $tinyUrlHandler->setNext($bitLyUrlHandler);
        }

        return $bitLyUrlHandler->handle($urlShortenerPostRequestDTO);
    }

}
