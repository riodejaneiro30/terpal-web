@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">General Parameter</h1>
    <div class="mb-4">
        <a href="{{ route('generalparameter.create') }}" class="w-16 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Tambah General Parameter
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        General Parameter Key
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Deskripsi General Parameter
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        General Parameter Value
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($generalparameters as $index => $generalparameter)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                        {{ $index + 1 + ($generalparameters->currentPage() - 1) * $generalparameters->perPage() }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $generalparameter->general_parameter_key }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $generalparameter->general_parameter_description }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $generalparameter->general_parameter_value }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            <a href="{{ route('generalparameter.edit', $generalparameter->general_parameter_id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                            <form action="{{ route('generalparameter.destroy', $generalparameter->general_parameter_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $generalparameters->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection