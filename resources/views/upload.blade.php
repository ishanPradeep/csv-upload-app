<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4;">
<div style="max-width: 600px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h1 style="text-align: center; color: #333;">Upload CSV</h1>
    <form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf
        <input type="file" name="csv_file" style="padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        <button type="submit" style="padding: 10px 15px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
            Upload CSV
        </button>
    </form>
    @if (session('success'))
        <p style="text-align: center; color: #28a745;">{{ session('success') }}</p>
    @endif
</div>
</body>
</html>
