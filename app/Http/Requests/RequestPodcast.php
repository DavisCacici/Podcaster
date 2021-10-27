<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPodcast extends FormRequest
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
            'name' => 'required',
            'file' => 'required|file',
            'description' => 'max:191'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'file.required' => 'Non hai inserito nessun file',
            'file.file' => 'Devi inserire il file',
            'description.max' => 'hai superato la lunghezza massima'
        ];
    }
}
