<?php

namespace App\Http\Requests\Apps;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAppRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'project_id' => ['required', 'integer', Rule::exists(Project::class, 'id')],
            'name' => ['required', 'max:255'],
        ];
    }

    public function getProjectId(): int
    {
        return $this->get('project_id');
    }

    public function getName(): string
    {
        return $this->get('name');
    }
}
