<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|min:2|max:100',
            'author' => 'required|min:2|max:50',
            'cover' => 'required|image|mimes:jpeg,jpg,png,webp',
            'plot' => 'required|min:10|max:1000',
        ];
    }

    public function messages(){
        return [
            'required' => 'Il campo :attribute è richiesto',
            'min' => 'Il campo :attribute deve essere di :min caratteri',
            'max' => 'Il campo :attribute deve essere al massimo di :max caratteri',
            'image' => 'Il file deve essere un\'immagine', 
            'mimes' => 'Le estensioni accettate sono :values',
        ];
    }
}
