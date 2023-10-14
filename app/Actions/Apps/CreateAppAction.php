<?php

namespace App\Actions\Apps;

use App\Models\App;

class CreateAppAction
{
    public function execute(int $projectId, string $name): App
    {
        $app = new App();
        $app->project_id = $projectId;
        $app->name = $name;
        $app->save();

        return $app;
    }
}
