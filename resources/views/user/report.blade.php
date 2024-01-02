<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h1>Employees Data</h1>
    <table class="myTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">attended at</th>
                <th scope="col">left at</th>
                <th scope="col">date</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item->attended_at ?? 0 }}</td>
                        <td>{{ $item->left_at ?? 0 }}</td>
                        <td>{{ $item->date }}</td>
                    </tr>
                @endforeach
            @else
                <p>There are no user data to display</p>
            @endif
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.myTable').DataTable();
        });
    </script>
</body>

</html>
