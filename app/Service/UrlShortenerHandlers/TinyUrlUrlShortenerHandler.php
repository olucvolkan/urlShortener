<?php


namespace App\Service\UrlShortenerHandlers;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;
use GuzzleHttp\Client;
use Throwable;

class TinyUrlUrlShortenerHandler extends AbstractHandler
{
    public const TINYURL_PROVIDER = 'tinyurl';


    public function handle(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): UrlShortenerPostResponseDTO
    {
        $client = new Client();
        try {
            $response = $client->get('http://tinyurl.com/api-create.php?url=' . $urlShortenerPostRequestDTO->url);
            $this->setNext(new BitLyUrlShortenerHandler());
            $urlShortenerPostResponseDTO = new UrlShortenerPostResponseDTO();
            $urlShortenerPostResponseDTO->link = $response->getBody()->getContents();
            $urlShortenerPostResponseDTO->url = $urlShortenerPostRequestDTO->url;

            return $urlShortenerPostResponseDTO;
        } catch (Throwable $exception) {
            $this->setNext(new BitLyUrlShortenerHandler());
            return parent::handle($urlShortenerPostRequestDTO);
        }

    }

}
