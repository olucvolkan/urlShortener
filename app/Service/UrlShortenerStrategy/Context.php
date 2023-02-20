<?php


namespace App\Service\UrlShortenerStrategy;


use App\DTO\UrlShortenerPostRequestDTO;
use App\DTO\UrlShortenerPostResponseDTO;
use Exception;

class Context
{
    /** @var Strategy[] */
    private array $strategies = [];

    /**
     * Context constructor.
     */
    public function __construct()
    {
        $this
            ->addStrategies(new TinyUrlStrategy())
            ->addStrategies(new BitLyStrategy());
    }

    public function addStrategies(Strategy $strategy): self
    {
        $this->strategies[] = $strategy;

        return $this;
    }

    public function execute(UrlShortenerPostRequestDTO $urlShortenerPostRequestDTO):UrlShortenerPostResponseDTO
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->canSend($urlShortenerPostRequestDTO)) {
                return $strategy->request($urlShortenerPostRequestDTO);
            }
        }
        throw new Exception("Could not find available provider");
    }

}
