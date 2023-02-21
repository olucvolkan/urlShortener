<?php

namespace App\Http\Requests;

use App\DTO\UrlShortenerPostRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class UrlShortenerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'url' => 'required',
            'provider' => 'string',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'url.required' => 'Url is required!',
        ];
    }

    public function data()
    {

        return new UrlShortenerPostRequestDTO(
             $this->input('url'),
             $this->input('provider')
        );
    }
}
