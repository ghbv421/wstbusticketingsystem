<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .employee-nav {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .employee-nav a {
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
            color: #333;
        }
        .employee-nav a:hover {
            color: #0d6efd;
        }
        .search-box {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>EMPLOYEES</h1>
        
        <div class="employee-nav">
            <a href="#">Driver</a>
            <a href="#">Conductor</a>
            <a href="#">Dispatcher</a>
        </div>
        
        <div class="search-box">
            <form action="{{ route('employees.search') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Driver_id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>Mobile No.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->driver_id }}</td>
                        <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->sex == 14 ? 'Male' : 'Female' }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->mobile_no }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($employees->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $employees->links() }}
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>