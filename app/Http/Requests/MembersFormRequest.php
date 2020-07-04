<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembersFormRequest extends FormRequest
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
            'name'=>'required|min:3',
            'rg'=>'required|min:3',
            'rgEntity'=>'required|min:2',
            'cpf'=>'required|min:3',
            'documentName'=>'required|min:3',
            'birthdate'=>'required|min:3',
            'email[]'=>'unique:App\MemberContact,primaryEmail'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'O campo :attribute é obrigatorio',
            'rgEntity.required' => 'O a entidade emissoria do RG é obrigatória',
            'documentName.required' => 'O nome oficial no documento é obrigatorio',
            'birthdate.required' => 'A data de nascimento é obrigatória',
            'cpf.required' => 'O CPF é obrigatorio',
            'email.unique' => 'O email já foi cadastrado como sendo de outro membro. Por favor, escolha outro email',
            'name.min' => 'O campo nome precisa ter pelo menos 3 caracteres'
        ];
    }

}
