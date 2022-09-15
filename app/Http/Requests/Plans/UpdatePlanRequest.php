<?php

namespace App\Http\Requests\Plans;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // dd($this->route('plan')->id);
        return [
            'name' => ['required', 'string', Rule::unique('plans')->ignore($this->route('plan'))],
            'tenure' => ['required', 'numeric'],
            'min_investment' => ['required', 'numeric'],
            'max_investment' => ['required', 'numeric'],
            'demo' => ['required', 'boolean'],
            'features' => ['required'],
            'features.*' => ['required'],
            'bonus' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'features.*.required' => 'This feature is required'
        ];
    }
}
