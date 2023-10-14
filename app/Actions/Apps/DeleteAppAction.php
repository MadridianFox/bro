<?php

namespace App\Actions\Apps;

use App\Models\App;

class DeleteAppAction
{
    public function execute(App $app): void
    {
        $app->delete();
    }
}
