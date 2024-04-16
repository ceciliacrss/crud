<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id'=>'required|BigInt|min:1|max:10000|unique:post,code',
            'title'=>'required|string|max:250',
            'description'=>'required|string|max:1000',
            'image'=>'required|string',
            'create_at'=>'nullable||required',
            'update_at'=>'nullable|required',
        ];
    }
}
