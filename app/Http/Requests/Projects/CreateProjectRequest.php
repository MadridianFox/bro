<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255']
        ];
    }

    public function getName(): string
    {
        return $this->get('name');
    }
}
