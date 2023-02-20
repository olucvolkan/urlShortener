<?php


namespace App\Service;


use App\DTO\UrlShortenerPostRequestDTO;
use App\Service\UrlShortenerStrategy\Context;

class UrlShortenerService
{

    public function urlShort(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO)
    {
        $context = new Context();

        return $context->execute($urlShortenerPostRequestDTO);
    }

}
