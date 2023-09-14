<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'subject' => 'required|string|min:1|max:255',
            'authors' => 'required|string|min:1|max:255',
            'edition' => 'required|integer|min:1',
            'publish_year' => 'required|integer|min:1|max_digits:4',
            'publisher' => 'required|string|min:1|max:255',
            'collection_id' => 'required|integer|min:1',
        ];
    }
}
