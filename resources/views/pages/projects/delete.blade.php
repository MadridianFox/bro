<?php
/** @var \App\Models\Project $project */
?>
<x-layout :$layout>
    <div class="row mt-3">
        <div class="col col-4">
            <form action="{!! route('deleteProjectAction', ['id' => $project->id], absolute: false) !!}" method="post">
                @csrf
                <div class="mb-3">
                    Are you sure?
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="{!! route('projectsList', absolute: false) !!}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</x-layout>
