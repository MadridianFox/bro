<?php
/** @var \App\Models\Project $project */
?>
<x-layout :$layout>
    <div class="row mt-3">
        <div class="col col-4">
            <form action="{!! route('updateProjectAction', ['id' => $project->id], absolute: false) !!}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="project-name" class="form-label">Project name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="project-name" name="name" value="{!! $project->name !!}">
                    @error('name')
                    <div id="project-name-error" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{!! route('projectsList', absolute: false) !!}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</x-layout>
