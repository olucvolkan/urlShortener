<?php


namespace App\DTO;


use JsonSerializable;
use Spatie\DataTransferObject\DataTransferObject;

final class UrlShortenerPostResponseDTO extends DataTransferObject implements JsonSerializable
{
    public string $url;

    public string $link;


    public function jsonSerialize()
    {
        return [
            'url' => $this->url,
            'link' => $this->link,
        ];
    }
}
