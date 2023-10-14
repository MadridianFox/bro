<?php

namespace App\Actions\Projects;

use App\Models\Project;

class CreateProjectAction
{
    public function execute(string $name): int
    {
        $project = new Project();
        $project->name = $name;
        $project->save();

        return $project->id;
    }
}
