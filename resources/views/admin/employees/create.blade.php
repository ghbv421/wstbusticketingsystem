<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Employee</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-400 text-black min-h-screen flex items-center justify-center font-mono">

  <div class="bg-gray-300 p-6 rounded shadow-lg w-80">
    <form action="{{ route('admin.employees.store') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label for="name" class="block mb-1">NAME:</label>
        <input type="text" name="name" required placeholder="ENTER" class="w-full px-2 py-1 border border-black bg-white focus:outline-none">
      </div>

      <div>
        <label for="email" class="block mb-1">E-MAIL:</label>
        <input type="email" name="email" required placeholder="ENTER" class="w-full px-2 py-1 border border-black bg-white focus:outline-none">
      </div>

      <div class="flex justify-between space-x-2">
        <div class="w-1/2">
          <label for="age" class="block mb-1">AGE:</label>
          <select name="age" required class="w-full px-2 py-1 border border-black bg-white focus:outline-none">
            <option value="">--</option>
            @for ($i = 18; $i <= 65; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>
        <div class="w-1/2">
          <label for="sex" class="block mb-1">SEX::</label>
          <select name="sex" required class="w-full px-2 py-1 border border-black bg-white focus:outline-none">
            <option value="">--</option>
            <option value="Male">MALE</option>
            <option value="Female">FEMALE</option>
            <option value="Other">OTHER</option>
          </select>
        </div>
      </div>

      <div>
        <label for="address" class="block mb-1">ADDRESS:</label>
        <input type="text" name="address" required placeholder="ENTER" class="w-full px-2 py-1 border border-black bg-white focus:outline-none">
      </div>

      <div>
        <label for="phone" class="block mb-1">PHONE#:</label>
        <input type="text" name="phone" required placeholder="ENTER" class="w-full px-2 py-1 border border-black bg-white focus:outline-none">
      </div>

      <div>
        <label for="position" class="block mb-1">EMPLOYEE:</label>
        <select name="position" required class="w-full px-2 py-1 border border-black bg-white focus:outline-none">
          <option value="">SELECT</option>
          <option value="Driver">DRIVER</option>
          <option value="Conductor">CONDUCTOR</option>
          <option value="Dispatcher">DISPATCHER</option>
        </select>
      </div>

      <div class="text-center mt-4 space-y-2">
        <button type="submit" class="bg-white border border-black px-6 py-2 hover:bg-gray-200 transition">ADD</button>
        
        <a href="{{ route('admin.employees.index') }}" class="inline-block bg-white border border-black px-6 py-2 hover:bg-gray-200 transition">
            BACK
        </a>
        </div>
    </form>
  </div>

</body>
</html>
