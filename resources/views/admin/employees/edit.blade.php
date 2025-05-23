<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Employee</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-100 min-h-screen flex items-center justify-center py-10">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">Edit Employee</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md text-sm">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.employees.update', $employees->id) }}" method="POST" class="space-y-5">
      @csrf
      @method('PUT')

      <div>
        <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
        <input type="text" name="name" value="{{ $employees->name }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">E-mail</label>
        <input type="email" name="email" value="{{ $employees->email }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="flex space-x-4">
        <div class="w-1/2">
          <label for="age" class="block text-gray-700 font-medium mb-1">Age</label>
          <select name="age" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">--</option>
            @for ($i = 18; $i <= 65; $i++)
              <option value="{{ $i }}" @if($employees->age == $i) selected @endif>{{ $i }}</option>
            @endfor
          </select>
        </div>
        <div class="w-1/2">
          <label for="sex" class="block text-gray-700 font-medium mb-1">Sex</label>
          <select name="sex" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">--</option>
            <option value="male" @if($employees->sex == 'male') selected @endif>Male</option>
            <option value="female" @if($employees->sex == 'female') selected @endif>Female</option>
            <option value="other" @if($employees->sex == 'other') selected @endif>Other</option>
          </select>
        </div>
      </div>

      <div>
        <label for="address" class="block text-gray-700 font-medium mb-1">Address</label>
        <input type="text" name="address" value="{{ $employees->address }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="phone" class="block text-gray-700 font-medium mb-1">Phone</label>
        <input type="text" name="phone" value="{{ $employees->phone }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="position" class="block text-gray-700 font-medium mb-1">Position</label>
        <select name="position" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="">Select</option>
          <option value="Admin" @if($employees->position == 'Admin') selected @endif>Admin</option>
          <option value="Driver" @if($employees->position == 'Driver') selected @endif>Driver</option>
          <option value="Conductor" @if($employees->position == 'Conductor') selected @endif>Conductor</option>
          <option value="Dispatcher" @if($employees->position == 'Dispatcher') selected @endif>Dispatcher</option>
        </select>
      </div>

      <div class="flex justify-between items-center pt-4">
        <a href="{{ route('admin.employees.index') }}" class="text-red-600 font-medium hover:underline">← Back</a>
        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-semibold">
          Update
        </button>
      </div>
    </form>
  </div>

</body>
</html>
