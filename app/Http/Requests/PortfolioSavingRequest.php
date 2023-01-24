<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioSavingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ru.title' => 'required',
            'uk.title' => 'required',
            'en.title' => 'required',
            'ru.content.address' => 'required',
            'uk.content.address' => 'required',
            'en.content.address' => 'required',
        ];
    }
}
