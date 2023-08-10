<!DOCTYPE html>
<html>
<head>
    <title>PDF View</title>
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
    <h1>Product Report</h1>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Product Cover Image</th>
                <th>created_at</th>
                <th>updated_at</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        {{-- <img src="{{ asset('storage/' . $product->image) }}"> --}}
                    </td>

                    <td>{{ $product->category->created_at }}</td>
                    <td>{{ $product->category->updated_at }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
