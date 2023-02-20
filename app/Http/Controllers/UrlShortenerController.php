<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use App\Service\UrlShortenerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UrlShortenerController extends Controller
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
     */
    public function index(UrlShortenerRequest $urlShortenerRequest): \Illuminate\Http\JsonResponse
    {
        $urlShortResponse = $this->urlShortenerService->urlShort($urlShortenerRequest->data());

        return  response()->json($urlShortResponse->jsonSerialize());

    }
}
