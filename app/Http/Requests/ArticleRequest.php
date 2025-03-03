<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $roules=[
            'title'=>'required|min:5',
            'content'=>'required|min:5',
            'category_id'=>'required',
           
        ];
        if($this->route()->getActionMethod()==='store'){
            $roules['image']='required|image';
        }
        return $roules;
    }
}
