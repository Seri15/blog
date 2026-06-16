<!DOCTYPE html>
<html>
<head><title>{{ $note->title }}</title></head>
<body style="font-family:Arial; max-width:800px; margin:40px auto; padding:0 20px">
    <a href="{{ route('notes.index') }}">← Back to All Notes</a>
    <h1>{{ $note->title }}</h1>
    <p><strong>Subject:</strong> {{ $note->subject }}</p>
    <p><strong>Created:</strong> {{ $note->created_at->format('M d, Y') }}</p>
    <hr>
    <p>{{ $note->body }}</p>
    <a href="{{ route('notes.edit', $note) }}" style="padding:8px 14px; background:#e74c3c; color:white; text-decoration:none">Edit</a>
</body>
</html>

