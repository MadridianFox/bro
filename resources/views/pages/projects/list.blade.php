<?php
/** @var \Illuminate\Support\Collection<int,\App\Models\Project> $projects */
?>
<x-layout :$layout>
    <div class="row mt-3">
        <div class="col d-flex justify-content-end">
            <a class="btn btn-primary" href="{!! route('createProjectForm') !!}">Create Project</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <th scope="row">{{$project->id}}</th>
                        <td>{{$project->name}}</td>
                        <td>
                            <a href="{!! route('updateProjectForm', ['id' => $project->id], absolute: false) !!}" class="btn btn-sm btn-outline-dark"><i class="bi bi-pencil-square"></i></a>
                            <a href="{!! route('deleteProjectForm', ['id' => $project->id], absolute: false) !!}" class="btn btn-sm btn-outline-dark"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
