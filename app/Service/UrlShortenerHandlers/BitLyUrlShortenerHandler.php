<?php


namespace App\Service\UrlShortenerHandlers;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;
use GuzzleHttp\Client;

class BitLyUrlShortenerHandler extends AbstractHandler
{
    public const BITLY_PROVIDER = 'bit.ly';
    public const BITLY_URL = 'https://api-ssl.bitly.com/v4/shorten';

    public function handle(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): UrlShortenerPostResponseDTO
    {

        if ($this->canSend($urlShortenerPostRequestDTO)) {
            $headers = [
                'Authorization' => 'Bearer ' . config('app.bitLy_token'),
                'Content-Type' => 'application/json'
            ];
            $client = new Client([
                'headers' => $headers
            ]);
            try {

                $res = $client->post(self::BITLY_URL, [
                        'form_params' => $this->createRequestBody($urlShortenerPostRequestDTO->url)
                    ]
                );

                $urlShortenerPostResponseDTO = new UrlShortenerPostResponseDTO();
                $urlShortenerPostResponseDTO->link = json_decode($res->getBody(), true)['long_url'];
                $urlShortenerPostResponseDTO->url = $urlShortenerPostRequestDTO->url;
            }catch (\Throwable $exception) {
                $this->setNext(new TinyUrlUrlShortenerHandler());
                return parent::handle($urlShortenerPostRequestDTO);
            }
            return $urlShortenerPostResponseDTO;
        }
        return parent::handle($urlShortenerPostRequestDTO);

    }

    private function canSend(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO): bool
    {
        return $urlShortenerPostRequestDTO->provider === self::BITLY_PROVIDER;
    }

    /**
     * @param string $url
     * @return array
     */
    private function createRequestBody(string $url): array
    {

        return [
            'group_guid' => config('bitLy_group_uid'),
            'domain' => self::BITLY_PROVIDER,
            'long_url' => $url,
        ];
    }
}
