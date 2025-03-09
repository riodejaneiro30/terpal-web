<?php

namespace App\Http\Controllers\Parameter;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\GeneralParameter;

class GeneralParameterController extends Controller
{
    public function index()
    {
        $generalparameters = GeneralParameter::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('generalparameter.index', compact('generalparameters'));
    }

    public function create()
    {
        return view('generalparameter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'general_parameter_key' => 'required|string|max:255',
            'general_parameter_value' => 'required|string'
        ]);

        GeneralParameter::create([
            'general_parameter_id' => (string) Str::uuid(), // Generate UUID
            'general_parameter_key' => $request->general_parameter_key,
            'general_parameter_description' => $request->general_parameter_description,
            'general_parameter_value' => $request->general_parameter_value,
            'created_by' => 'admin',
            'created_date' => now(),
        ]);

        return redirect()->route('generalparameter.index')->with('success', 'General Parameter berhasil dibuat.');
    }

    public function edit(GeneralParameter $generalparameter)
    {
        return view('generalparameter.edit', compact('generalparameter'));
    }

    public function update(Request $request, GeneralParameter $generalparameter)
    {
        $request->validate([
            'general_parameter_key' => 'required|string|max:255',
            'general_parameter_value' => 'required|string'
        ]);

        $generalparameter->update([
            'general_parameter_key' => $request->general_parameter_key,
            'general_parameter_description' => $request->general_parameter_description,
            'general_parameter_value' => $request->general_parameter_value,
            'last_updated_by' => 'admin',
            'last_updated_date' => now(),
        ]);

        return redirect()->route('generalparameter.index')->with('success', 'General Parameter berhasil diperbarui.');
    }

    public function destroy(GeneralParameter $generalparameter)
    {
        $generalparameter->delete();
        return redirect()->route('generalparameter.index')->with('success', 'General Parameter berhasil dihapus.');
    }
}
