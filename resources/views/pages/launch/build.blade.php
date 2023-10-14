<x-layout :$layout>
    <form action="{!! route('launchBuildAction', ['id' => $app->id], absolute: false) !!}" method="post">
        @csrf
        <div class="mb-3 mt-3">
            <label for="git-branch" class="form-label">Git branch</label>
            <input type="text" class="form-control @error('branch') is-invalid @enderror" id="git-branch" name="branch">
            @error('name')
            <div id="git-branch-error" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Build</button>
        <a href="{!! route('appsList', absolute: false) !!}" class="btn btn-light">Cancel</a>
    </form>
</x-layout>
