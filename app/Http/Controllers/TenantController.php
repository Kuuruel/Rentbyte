<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    public function create()
    {
        return view('dashboard.index5');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants',
            'password' => 'required|string|min:6',
        ]);

        Tenant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        return redirect('/tenants/create')->with('success', 'Tenant berhasil dibuat.');
    }
}
