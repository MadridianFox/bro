<?php

namespace App\Actions\Apps;

use App\Models\App;
use Illuminate\Support\Collection;

class SearchAppsAction
{
    public function execute(SearchAppsParams $params): Collection
    {
        $query = App::query()->orderBy('name');

        $projectId = $params->projectId();
        if($projectId) {
            $query->where('project_id', $projectId);
        }

        return $query->get();
    }
}
