<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Terminal</title>
</head>
<body>
    <form action=" {{ route('terminals.store') }} " method="POST">
        @csrf
            <label for="name">Terminal:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity"><br><br>
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact"><br><br>
            <label for="latitude">Latitude:</label>
            <input type="number" step="any" id="latitude" name="latitude"><br><br>
            <label for="longitude">Longitude:</label>
            <input type="number" step="any" id="longitude" name="longitude"><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address"><br><br>
            <label for="city">City:</label>
            <input type="text" id="city" name="city"><br><br>
            <label for="state">State:</label>
            <input type="text" id="state" name="state"><br><br>
            <label for="country">Country:</label>
            <input type="text" id="country" name="country"><br><br>
            <input type="submit" value="Submit">
    </form>
</body>
</html>