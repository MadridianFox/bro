<?php
/** @var \Illuminate\Support\Collection<int,\App\Models\App> $apps */
?>

<x-layout :$layout>
    <div class="row">
        <div class="col">
            <form action="{!! route('appsList') !!}" method="get">
                <div class="row">
                <div class="col-3">
                    <label for="project" class="form-label">Project name</label>
                        <select class="form-select @error('project_id') is-invalid @enderror" name="project_id" id="project">
                            <option value="">All</option>
                            @foreach($filter['projects'] as $project)
                                <option value="{{ $project->id }}" @selected(request('project_id') == $project->id)>{{ $project->name }}</option>
                            @endforeach
                        </select>
                        @error('project_id')
                        <div id="project-name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-3">Filter</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col d-flex justify-content-end">
            <a class="btn btn-primary" href="{!! route('createAppForm') !!}">Create App</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Project</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($apps as $app)
                    <tr>
                        <th scope="row">{{$app->id}}</th>
                        <td>{{$app->name}}</td>
                        <td>{{$app->project->name}}</td>
                        <td>
                            <a href="{!! route('launchBuildForm', ['id' => $app->id], absolute: false) !!}" class="btn btn-sm btn-outline-dark"><i class="bi bi-rocket-takeoff"></i></a>
                            <a href="{!! route('updateAppForm', ['id' => $app->id], absolute: false) !!}" class="btn btn-sm btn-outline-dark"><i class="bi bi-pencil-square"></i></a>
                            <a href="{!! route('deleteAppForm', ['id' => $app->id], absolute: false) !!}" class="btn btn-sm btn-outline-dark"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
