<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $contacts->links() }} <!-- Pagination links -->
</body>
</html>
