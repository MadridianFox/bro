<?php

namespace App\Http\Requests\Apps;

use App\Actions\Apps\SearchAppsParams;
use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchAppsRequest extends FormRequest implements SearchAppsParams
{
    public function rules(): array
    {
        return [
            'project_id' => ['nullable', Rule::exists(Project::class, 'id')]
        ];
    }

    public function projectId(): ?int
    {
        return $this->get('project_id');
    }
}
