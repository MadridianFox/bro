<?php

namespace App\Actions\Launch;

use App\Models\App;
use App\Models\Build;
use GuzzleHttp\Client;

class LaunchBuildAction
{
    public function execute(App $app, string $branch): void
    {
        $buildParams = [
            'BRANCH' => $branch,
        ];
        $build = $this->createBuild($app, $buildParams);
        try {
            $this->startJob($buildParams);
        } catch (\Throwable) {
            $build->status = '';
            $build->save();
        }
    }

    private function createBuild(App $app, array $buildParams): Build
    {
        $build = new Build();
        $build->app_id = $app->id;
        $build->input = json_encode($buildParams);
        $build->status = Build::STATUS_START;
        $build->save();

        return $build;
    }

    private function startJob(array $buildParams)
    {
        $client = new Client([
            'base_uri' => 'http://172.20.0.1:8080'
        ]);
        $client->post('/job/test/buildWithParameters',[
            'form_params' => $buildParams,
            'auth' => ['admin', '11f179b876d443d4031816c7f46f1f8fab']
        ]);
    }
}
