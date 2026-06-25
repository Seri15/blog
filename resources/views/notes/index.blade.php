<!DOCTYPE html>
<html>
<head>
    <title>My Notes</title>
    <style>
        body { font-family: Arial; max-width: 800px; margin: 40px auto; padding: 0 20px; }
        .note-card { border: 1px solid #ddd; padding: 16px; margin: 12px 0; border-radius: 6px; }
        .btn { padding: 8px 14px; text-decoration: none; border-radius: 4px; }
        .btn-primary { background: #e74c3c; color: white; }
        .btn-secondary { background: #95a5a6; color: white; }
    </style>
</head>
<body>
    <a href="notes.search">Search</a>
    <h1>All Notes</h1>
    @if (session('success'))
    <div style="background:#d4edda; padding:12px; border-radius:4px; margin:12px 0">
        {{ session('success') }}
    </div>
    @endif


    <a href="{{ route('notes.create') }}" class="btn btn-primary">+ New Note</a>
 
    @forelse ($notes as $note)
        <div class="note-card">
            <h3>{{ $note->title }}</h3>
            <p><strong>Subject:</strong> {{ $note->subject }}</p>
            <p>{{ Str::limit($note->body, 100) }}</p>
            <a href="{{ route('notes.show', $note) }}" class="btn btn-secondary">View</a>
            {{-- Add this AFTER the View link, inside .note-card --}}
            <form action="{{ route('notes.destroy', $note) }}" method="POST"
            style="display:inline"
            onsubmit="return confirm('Are you sure you want to delete this note?')">
                @csrf
                @method('DELETE')  {{-- Spoof DELETE method --}}
                <button type="submit"
                style="padding:8px 14px; background:#c0392b; color:white; border:none; border-radius:4px">
                Delete
                </button>
            </form>
        </div>
    @empty
        <p>No notes yet. Create your first one!</p>
    @endforelse
</body>
</html>

