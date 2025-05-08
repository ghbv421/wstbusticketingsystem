<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <form action="{{ route('admin.bus.update', $bus->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <label for="driver">Driver:</label>
        <input type="text" name="driver" value="{{ old('driver', $bus->driver) }}">
    
        <label for="conductor">Conductor:</label>
        <input type="text" name="conductor" value="{{ old('conductor', $bus->conductor) }}">
    
        <label for="departure_time">Departure Time:</label>
        <input type="time" name="departure_time" value="{{ old('departure_time', $bus->departure_time) }}">
    
        <label for="arrival_time">Arrival Time:</label>
        <input type="time" name="arrival_time" value="{{ old('arrival_time', $bus->arrival_time) }}">
    
        <label for="status">Status:</label>
        <select name="status">
            <option value="On Time" {{ old('status', $bus->status) == 'On Time' ? 'selected' : '' }}>On Time</option>
            <option value="Delayed" {{ old('status', $bus->status) == 'Delayed' ? 'selected' : '' }}>Delayed</option>
            <option value="Cancelled" {{ old('status', $bus->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    
        <button type="submit">Update Bus</button>
    </form>    
</body>
</html>