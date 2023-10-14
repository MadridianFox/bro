<?php

namespace App\Actions\Apps;

use App\Models\App;

class UpdateAppAction
{
    public function execute(App $app, string $name): App
    {
        $app->name = $name;
        $app->save();

        return $app;
    }
}
