@if ($post->exsist)
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
    @method('PATCH')
    @else
    <form action="{{route('admin.posts.store')}}" method="POST">  
@endif
    @csrf
    <div class="form-group">
        <label for="title">Titolo del post:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select class="form-control" id="category_id" name="category_id">
          <option>Nessuna Categoria</option>
          @foreach ($categories as $category)
            <option @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>       
          @endforeach
        </select>
      </div>
    <div class="form-group">
        <label for="url">Url del post:</label>
        <input type="text" class="form-control" id="url" name="url" value="{{$post->url}}">
    </div>
    <div class="form-group">
        <label for="content">Testo del post:</label>
        <textarea class="form-control" id="content" name="content" rows="6">{{$post->content}}</textarea>
    </div>
    <button type="button" class="btn btn-dark"><a class="text-white text-decoration-none" href="{{route('admin.posts.index')}}">Indietro</a></button>
    <button type="submit" class="btn btn-primary">Salva post</button>
</form>