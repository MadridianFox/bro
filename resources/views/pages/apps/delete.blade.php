<?php
/** @var \App\Models\App $app */
?>
<x-layout :$layout>
    <div class="row mt-3">
        <div class="col col-4">
            <form action="{!! route('deleteAppAction', ['id' => $app->id], absolute: false) !!}" method="post">
                @csrf
                <div class="mb-3">
                    Are you sure?
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="{!! route('appsList', absolute: false) !!}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</x-layout>
