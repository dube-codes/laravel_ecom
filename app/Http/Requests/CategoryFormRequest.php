<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'uuid' => ['required'],
            'slug' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required', 'in:0,1'],
            'popular' => ['sometimes', 'boolean'],
            'image' => ['required', 'image'],
            'meta_title' => ['required'],
            'meta_description' => ['required'],
            'meta_keyword' => ['required'],
        ];
    }

    protected function prepareForValidation(): void
    {

        $this->merge([
            'uuid' => Str::uuid(),
            'slug' => Str::slug($this->name),
            'popular' => $this->popular == true ? 1 : 0,

        ]);
    }
}
