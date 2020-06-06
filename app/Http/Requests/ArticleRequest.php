<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
     * Do some operation before the validation.
     *
     */
    protected function prepareForValidation()
    {
        // Add destination and oldData field to the request
        $this->destination = 'articles';
        $this->oldData = $this->route('article');
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            // If request for create operation the return validation rules
            return [

            ];
        } else if ($this->isMethod('patch')) {
            // If request for update operation the return validation rules
            return [

            ];
        }
    }
}
