<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
          'name' => 'required|max:100',
          'description' => 'sometimes|max:2000',
          'genre_id' => 'required|exists:genres,id',
          'lang_id' => 'required|exists:languages,id',
          'image_path' => 'required|image|mimes:jpg,png,jpeg,webp|max:5000',
        ];
    }
}
