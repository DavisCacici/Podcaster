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
            'pod.name' => 'required',
            'pod.file' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            'pod.name.required' => 'Il campo nome è obbligatorio',
            'pod.file.required' => 'Non hai inserito nessun file',
            'pod.file.file' => 'Devi inserire il file'
        ];
    }
}
