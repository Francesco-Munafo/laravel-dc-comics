<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title' => 'bail|required|min:5|max:50',
            'description' => 'bail|nullable|min:5|max:1000',
            'thumb' => 'bail|nullable|image|max:1000',
            'price' => 'baul|required|min:4|max:8',
            'series' => 'bail|nullable|min:3|max:50',
            'sale_date' => 'bail|nullable|date',
            'type' => 'bail|nullable|min:3|max:50',

        ];
    }
}
