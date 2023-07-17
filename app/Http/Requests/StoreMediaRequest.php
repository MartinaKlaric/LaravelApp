<?php

namespace App\Http\Requests;

use App\Service\AppService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreMediaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'  =>  ['required', 'min:2'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Media name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Media name is required!',
            'name.min' => ':attribute is too short!',
        ];
    }
}