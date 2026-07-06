<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'deployed_link' => ['nullable', 'url', 'max:500'],
            'github_link' => ['nullable', 'url', 'max:500'],
            'technologies' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
