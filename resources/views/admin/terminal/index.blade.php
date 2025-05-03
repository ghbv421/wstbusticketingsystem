<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminal</title>
</head>
<body>
    <h1>Terminal</h1>
    <a href=" {{ route('terminals.create') }} ">Add Terminal</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Terminal</th>
                <th>Capacity</th>
                <th>Contact</th>
                <th>Latitute</th>
                <th>Longitude</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($terminals as $terminal )
                <tr>
                    <td>{{ $terminal->id }}</td>
                    <td>{{ $terminal->terminal }}</td>
                    <td>{{ $terminal->capacity }}</td>
                    <td>{{ $terminal->contact }}</td>
                    <td>{{ $terminal->longitude }}</td>
                    <td>{{ $terminal->latitude }}</td>
                    <td>{{ $terminal->address }}</td>
                    <td>{{ $terminal->city }}</td>
                    <td>{{ $terminal->state }}</td>
                    <td>{{ $terminal->country }}</td>
                    <td>
                        <a href=" {{ route('terminals.edit', $terminal->id) }} ">Edit</a>
                        <form action=" {{ route('terminals.destroy', $terminal->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
        <tbody>
            
                <tr>
                    <td></td>
                    <td></td>
                </tr>
           
        </tbody>
    </table>

</body>
</html>