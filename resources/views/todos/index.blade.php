<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Todo</title>
</head>
<body>
    <h1>Daftar Todo</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->id }}</td>
                    <td>{{ $todo->user_id }}</td>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->is_done ? 'Selesai' : 'Belum Selesai' }}</td>
                    <td>{{ $todo->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
