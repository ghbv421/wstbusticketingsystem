<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $employees = User::query()
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('age', 'like', "%{$search}%")
                    ->orWhere('sex', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('position', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'asc')
            ->paginate(10) // <-- paginates 10 results per page
            ->withQueryString(); // <-- keeps the ?search= query in pagination links

        return view('admin.employees.index', compact('employees'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email',
                'position' => 'required|string',
                'age' => 'required|numeric|min:18|max:65',
                'sex' => 'required',
                'address' => 'required|string',
                'phone' => 'required|string',
            ]);

            User::create($request->all());

            return redirect()->route('admin.employees.index')->with('success', 'Employee added successfully!');
        }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employees = User::findOrFail($id);

        return view('admin.employees.show', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employees = User::findOrFail($id);
        return view('admin.employees.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|min:18|max:65',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'position' => 'required'
        ]);

        $request['sex'] = strtolower($request['sex']);

        $employees = User::findOrFail($id);
        $employees->update([
            'name' => $request->name,
            'sex' => $request->sex,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'position' => $request->position
        ]);

        return redirect()->route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $employees = User::findOrFail($id);
        $employees->delete();

        return redirect()->route('admin.employees.index');
    }
}
