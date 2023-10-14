<?php

namespace App\Http\Controllers;

use App\Actions\Projects\CreateProjectAction;
use App\Actions\Projects\DeleteProjectAction;
use App\Actions\Projects\UpdateProjectAction;
use App\Http\Requests\Projects\CreateProjectRequest;
use App\Http\Requests\Projects\UpdateProjectRequest;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function list()
    {
        $project = Project::all();

        return view('pages/projects/list', [
            'projects' => $project,
            'layout' => [
                'title' => 'Projects',
                'breadcrumbs' => [
                    ['name' => 'Projects']
                ],
            ]
        ]);
    }

    public function createForm()
    {
        return view('pages/projects/create', [
            'layout' => [
                'title' => 'Create new project',
                'breadcrumbs' => [
                    ['name' => 'Projects', 'url' => route('projectsList', absolute: false)],
                    ['name' => 'Create']
                ]
            ],
        ]);
    }

    public function createAction(CreateProjectRequest $request, CreateProjectAction $action)
    {
        $action->execute($request->getName());

        return redirect(route('projectsList'));
    }

    public function updateForm(int $id)
    {
        /** @var Project $project */
        $project = Project::query()->findOrFail($id);

        return view('pages/projects/update', [
            'project' => $project,
            'layout' => [
                'title' => "Updating project: {$project->id}",
                'breadcrumbs' => [
                    ['name' => 'Projects', 'url' => route('projectsList', absolute: false)],
                    ['name' => $project->name],
                    ['name' => 'Update']
                ]
            ],
        ]);
    }

    public function updateAction(int $id, UpdateProjectRequest $request, UpdateProjectAction $action)
    {
        /** @var Project $project */
        $project = Project::query()->findOrFail($id);
        $action->execute($project, $request->getName());

        return redirect(route('projectsList'));
    }

    public function deleteForm(int $id)
    {
        /** @var Project $project */
        $project = Project::query()->findOrFail($id);

        return view('pages/projects/delete', [
            'project' => $project,
            'layout' => [
                'title' => "Deleting project: {$project->id}",
                'breadcrumbs' => [
                    ['name' => 'Projects', 'url' => route('projectsList', absolute: false)],
                    ['name' => $project->name],
                    ['name' => 'Delete']
                ]
            ],
        ]);
    }

    public function deleteAction(int $id, DeleteProjectAction $action)
    {
        /** @var Project $project */
        $project = Project::query()->findOrFail($id);
        $action->execute($project);

        return redirect(route('projectsList'));
    }
}
