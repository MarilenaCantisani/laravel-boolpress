{{-- Check if there are errors in the form --}}
@if($errors->any())
  <div>
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
{{-- Check if there are errors in the form --}}
@if ($category->exists)
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.categories.store') }}">
@endif
@csrf
<div class="form-group">
    <label for="name">Nome categoria:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $category->name) }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="color">Colore categoria:</label>
    <select class="form-control @error('color') is-invalid @enderror" id="color" name="color">
        <option>Nessun colore</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="success">Verde</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="danger">Rosso</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="primary">Blu</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="warning">Giallo</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="secondary">Grigio</option>
    </select>
    @error('color')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- <button type="reset" class="btn btn-warning">Reset</button> --}}
<button type="submit" class="btn btn-success">Salva</button>
</form>
