<?php

namespace App\Http\Controllers;

use App\Actions\Apps\CreateAppAction;
use App\Actions\Apps\DeleteAppAction;
use App\Actions\Apps\SearchAppsAction;
use App\Actions\Apps\UpdateAppAction;
use App\Http\Requests\Apps\CreateAppRequest;
use App\Http\Requests\Apps\SearchAppsRequest;
use App\Http\Requests\Apps\UpdateAppRequest;
use App\Models\App;
use App\Models\Project;

class AppsController extends Controller
{
    public function list(SearchAppsRequest $request, SearchAppsAction $action)
    {
        $apps = $action->execute($request);

        return view('pages/apps/list', [
            'apps' => $apps,
            'filter' => [
                'projects' => Project::all(),
            ],
            'layout' => [
                'title' => 'Apps',
                'breadcrumbs' => [
                    ['name' => 'Apps']
                ],
            ]
        ]);
    }

    public function createForm()
    {
        return view('pages/apps/create', [
            'form' => [
                'projects' => Project::all(),
            ],
            'layout' => [
                'title' => 'Create new app',
                'breadcrumbs' => [
                    ['name' => 'Apps', 'url' => route('appsList', absolute: false)],
                    ['name' => 'Create']
                ]
            ],
        ]);
    }

    public function createAction(CreateAppRequest $request, CreateAppAction $action)
    {
        $action->execute($request->getProjectId(), $request->getName());

        return redirect(route('appsList'));
    }

    public function updateForm(int $id)
    {
        /** @var App $app */
        $app = App::query()->findOrFail($id);

        return view('pages/apps/update', [
            'app' => $app,
            'layout' => [
                'title' => "Updating app: {$app->id}",
                'breadcrumbs' => [
                    ['name' => 'Apps', 'url' => route('appsList', absolute: false)],
                    ['name' => "{$app->project->name} - {$app->name}"],
                    ['name' => 'Update']
                ]
            ],
        ]);
    }

    public function updateAction(int $id, UpdateAppRequest $request, UpdateAppAction $action)
    {
        /** @var App $app */
        $app = App::query()->findOrFail($id);
        $action->execute($app, $request->getName());

        return redirect(route('appsList'));
    }

    public function deleteForm(int $id)
    {
        /** @var App $app */
        $app = App::query()->findOrFail($id);

        return view('pages/apps/delete', [
            'app' => $app,
            'layout' => [
                'title' => "Deleting app: {$app->id}",
                'breadcrumbs' => [
                    ['name' => 'Apps', 'url' => route('appsList', absolute: false)],
                    ['name' => "{$app->project->name} - {$app->name}"],
                    ['name' => 'Delete']
                ]
            ],
        ]);
    }

    public function deleteAction(int $id, DeleteAppAction $action)
    {
        /** @var App $app */
        $app = App::query()->findOrFail($id);
        $action->execute($app);

        return redirect(route('appsList'));
    }
}
