<?php

namespace App\Http\Requests\Box;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'box_img' => ['image', 'file'],
            'name' => ['required', 'max:255', 'string', Rule::unique('boxes')->ignore($this->box->box_img ?? null)],
            'description' => ['max:500'],
            'memo' => ['max:500'],
        ];
    }
}
