<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV</title>
</head>
<body>
<form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="csv_file" />
    <button type="submit">Upload CSV</button>
</form>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
</body>
</html>
