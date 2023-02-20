<?php


namespace App\DTO;


use Spatie\DataTransferObject\DataTransferObject;

final class UrlShortenerPostRequestDTO extends DataTransferObject
{
    public const DEFAULT_PROVIDER = 'default';
    public string $url;

    public string $provider = self::DEFAULT_PROVIDER;

}
