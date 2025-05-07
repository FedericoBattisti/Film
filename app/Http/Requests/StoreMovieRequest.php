<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title'=> 'required|min:3|max:255',
            'director'=> 'required|min:3|max:255',
            'genre'=> 'required|min:3|max:255',
            'release_date'=> 'required|date',
            'language'=> 'required|min:3|max:255',
            'country'=> 'required|min:3|max:255',
            'description'=> 'required|min:3|max:255',
            'cover'=> 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno 3 caratteri',
            'title.max' => 'Il titolo non deve superare i 255 caratteri',
            'director.min' => 'Il regista deve contenere almeno 3 caratteri',
            'director.max' => 'Il regista non deve superare i 255 caratteri',
            'director.required' => 'Il regista è obbligatorio',
            'genre.required' => 'Il genere è obbligatorio',
            'genre.min' => 'Il genere deve contenere almeno 3 caratteri',
            'genre.max' => 'Il genere non deve superare i 255 caratteri',
            'release_date.date' => 'La data di uscita deve essere una data valida',
            'release_date.required' => 'La data di uscita è obbligatoria',
            'release_date.date_format' => 'Il formato della data di uscita non è valido',
            'language.required' => 'La lingua è obbligatoria',
            'language.min' => 'La lingua deve contenere almeno 3 caratteri',
            'language.max' => 'La lingua non deve superare i 255 caratteri',
            'country.required' => 'Il paese è obbligatorio',
            'country.min' => 'Il paese deve contenere almeno 3 caratteri',
            'country.max' => 'Il paese non deve superare i 255 caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'cover.image' => 'Il file deve essere un\'immagine',
            'cover.mimes' => 'Il file deve essere in uno dei seguenti formati: jpeg, png, jpg, gif',
            'cover.max' => 'Il file non deve superare i 2MB',
        ];
    }
}
