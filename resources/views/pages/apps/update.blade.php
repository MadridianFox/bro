<?php
/** @var \App\Models\App $app */
?>
<x-layout :$layout>
    <div class="row mt-3">
        <div class="col col-4">
            <form action="{!! route('updateAppAction', ['id' => $app->id], absolute: false) !!}" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="app-name" class="form-label">App name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="app-name" name="name" value="{{ $app->name }}">
                    @error('name')
                    <div id="app-name-error" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{!! route('appsList', absolute: false) !!}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</x-layout>
