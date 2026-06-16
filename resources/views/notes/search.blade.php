<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>Search</h1>
    <form action="{{ route('notes.search', $search) }}" method="GET">
        @csrf  {{-- REQUIRED: protects against cross-site request forgery --}}
 
        <input type="text" name="Search" value="{{ old('search') }}"
               style="width:100%; padding:8px; margin:8px 0"><br>
 
        <button type="submit"
                style="padding:10px 20px; background:#e74c3c; color:white; border:none; border-radius:4px">
            Search
        </button>
    </form>
</body>
</html>