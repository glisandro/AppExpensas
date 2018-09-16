<?php

namespace App\Http\Requests;

use App\Consorcio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateConsorcioRequest extends FormRequest
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
            'name' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.max'      => 'El campo nombre no puede tener mas de 100 caracteres',
        ];
    }

    public function createConsorcio()
    {
        return DB::transaction(function () {
            return Consorcio::create([
                'name'    => $this->name,
                'team_id' => Auth::user()->currentTeam()->id,
            ])->id;
        });
    }
}
