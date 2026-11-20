
<!DOCTYPE html>
<html>
<head>
    <title>Equipment Report</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
        }

        p {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eeeeee;
        }
    </style>
</head>

<body>

    <h1>Pickleball Equipment Report</h1>

    <p>
        Category:
        {{ $filters['category'] ?? 'All Categories' }}
    </p>

    <p>
        Availability:
        {{ $filters['availability_status'] ?? 'All Statuses' }}
    </p>

    <p>
        Total Records: {{ $equipment->count() }}
    </p>

    <table>

        <thead>
            <tr>
                <th>Equipment Name</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Availability</th>
            </tr>
        </thead>

        <tbody>

            @forelse($equipment as $item)

                <tr>
                    <td>{{ $item->equipment_name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>PHP {{ number_format($item->unit_price, 2) }}</td>
                    <td>{{ $item->availability_status }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" style="text-align: center;">
                        No equipment records found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</body>
</html>
