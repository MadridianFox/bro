<?php

namespace App\Http\Controllers;

use App\Actions\Launch\LaunchBuildAction;
use App\Models\App;
use Illuminate\Http\Request;

class LaunchController
{
    public function launchBuildForm(int $id)
    {
        $app = App::findOrFail($id);

        return view('pages/launch/build', [
            'app' => $app,
            'layout' => [
                'title' => 'Launch Build',
                'breadcrumbs' => [
                    ['name' => 'Launch Build']
                ],
            ]
        ]);
    }

    public function launchBuildAction(int $id, Request $request, LaunchBuildAction $action)
    {
        $app = App::findOrFail($id);
        $action->execute($app, $request->get('branch'));

        return redirect(route('appsList'));
    }
}
