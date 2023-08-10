<!-- resources/views/pdf/category_view.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #336699;
            border-bottom: 2px solid #336699;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Category List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>created_at</th>
                <th>updated_at</th>
                <!-- Add more table headers for other fields if needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <!-- Add more table cells for other fields if needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
