    @extends('layouts.app')
    @section('title', "Buat Postingan")
    @section('content')
    <div class="container my-3">
        <h2 class="title">Buat Posting Baru</h2>
    <form method="POST" action="{{ url('posts') }}">
        @csrf
        <label for="title" class="form-label">Judul Postingan</label>
            <input type="text" class="form-control" id="title" name="title" required>   
                <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="4" name="content" required></textarea>
        <button type="submit" formnovalidate="formnovalidate" name="save" class="btn btn-dark my-2">Save</button>
        <button type="submit" name="save" class="btn btn-dark my-2"><a class="text-decoration-none text-light" href="{{ url('posts') }}">Back</a></button>
    </form>
    </div>
    @endsection
