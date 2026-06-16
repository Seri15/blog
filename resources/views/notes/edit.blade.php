<!DOCTYPE html>
<html>
<head><title>Edit Note</title></head>
<body style="font-family:Arial; max-width:800px; margin:40px auto; padding:0 20px">
    <a href="{{ route('notes.index') }}">← Back</a>
    <h1>Edit Note</h1>
 
    @if ($errors->any())
        <div style="background:#ffe0e0; padding:12px; border-radius:4px; margin-bottom:16px">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif
 
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')  {{-- HTML forms only support GET/POST; this spoofs PUT --}}
 
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title', $note->title) }}"
               style="width:100%; padding:8px; margin:8px 0"><br>
 
        <label>Subject</label><br>
        <input type="text" name="subject" value="{{ old('subject', $note->subject) }}"
               style="width:100%; padding:8px; margin:8px 0"><br>
 
        <label>Content</label><br>
        <textarea name="body" rows="6"
                  style="width:100%; padding:8px; margin:8px 0">{{ old('body', $note->body) }}</textarea><br>
 
        <button type="submit"
                style="padding:10px 20px; background:#e74c3c; color:white; border:none; border-radius:4px">
            Update Note
        </button>
    </form>
</body>
</html>

