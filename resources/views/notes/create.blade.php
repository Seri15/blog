<!DOCTYPE html>
<html>
<head><title>Create Note</title></head>
<body style="font-family:Arial; max-width:800px; margin:40px auto; padding:0 20px">
    <a href="{{ route('notes.index') }}">← Back</a>
    <h1>Create a New Note</h1>
 
    {{-- Show validation errors if any --}}
    @if ($errors->any())
        <div style="background:#ffe0e0; padding:12px; border-radius:4px; margin-bottom:16px">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif
 
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf  {{-- REQUIRED: protects against cross-site request forgery --}}
 
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title') }}"
               style="width:100%; padding:8px; margin:8px 0"><br>
 
        <label>Subject</label><br>
        <input type="text" name="subject" value="{{ old('subject') }}"
               style="width:100%; padding:8px; margin:8px 0"><br>
 
        <label>Content</label><br>
        <textarea name="body" rows="6"
                  style="width:100%; padding:8px; margin:8px 0">{{ old('body') }}</textarea><br>
 
        <button type="submit"
                style="padding:10px 20px; background:#e74c3c; color:white; border:none; border-radius:4px">
            Save Note
        </button>
    </form>
</body>
</html>

