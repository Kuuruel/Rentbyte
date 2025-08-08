<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

public function index5()
{
    $tenants = Tenant::all();
    return view('dashboard.index5', compact('tenants'));
}



    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'price' => 'required|numeric',
            'rent_type' => 'required|in:monthly,yearly',
        ]);

    Property::create($request->all());
    return redirect()->route('index')->with('success', 'Properti berhasil ditambahkan.');
    }
}