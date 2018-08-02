<?php

namespace App\Http\Requests;

use App\Consorcio;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UpdateConsorcioRequest extends FormRequest
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
            'name' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.max' => 'El campo nombre no puede tener mas de 100 caracteres'
        ];
    }

    public function updateConsorcio(Consorcio $consorcio)
    {
        DB::transaction(function() use ($consorcio){
            $consorcio->name = $this->name;
            $consorcio->save();
        });
    }
}
