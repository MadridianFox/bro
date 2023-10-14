<?php

namespace App\Actions\Projects;

use App\Models\Project;

class UpdateProjectAction
{
    public function execute(Project $project, string $name): int
    {
        $project->name = $name;
        $project->save();

        return $project->id;
    }
}
