<x-layout :$layout>
    <div class="row mt-3">
        <div class="col col-4">
            <form action="{!! route('createAppAction', absolute: false) !!}" method="post">
                @csrf
                <div>
                    <label for="project" class="form-label">Project name</label>
                    <select class="form-select @error('project_id') is-invalid @enderror" name="project_id" id="project">
                        <option value="">---</option>
                        @foreach($form['projects'] as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                    <div id="project-name-error" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 mt-3">
                    <label for="app-name" class="form-label">App name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="app-name" name="name">
                    @error('name')
                    <div id="app-name-error" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{!! route('appsList', absolute: false) !!}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</x-layout>
