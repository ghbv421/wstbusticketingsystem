<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Register Bus</h1>
    <form action="{{route('admin.bus.store')}}" method="post">
        @csrf
        @method('post')
        <div>
            <label for="">Type</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <input type="submit" value="Save Bus">
        </div>
    </form>
</body>
</html>