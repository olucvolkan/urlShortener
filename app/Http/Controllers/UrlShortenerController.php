<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use App\Service\UrlShortenerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class UrlShortenerController extends BaseController
{

    /**
     * @var UrlShortenerService
     */
    private UrlShortenerService $urlShortenerService;

    public function __construct(UrlShortenerService $urlShortenerService)
    {
        $this->urlShortenerService = $urlShortenerService;
    }

    /**
     * Display a listing of the resource.
     * @param UrlShortenerRequest $urlShortenerRequest
     * @return JsonResponse
     */
    public function index(UrlShortenerRequest $urlShortenerRequest): JsonResponse
    {
        $urlShortResponse = $this->urlShortenerService->urlShort($urlShortenerRequest->data());

        return response()->json($urlShortResponse->jsonSerialize());

    }
}
