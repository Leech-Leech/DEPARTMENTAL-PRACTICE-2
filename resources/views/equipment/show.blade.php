
@extends('layouts.equipment')

@section('title', 'View Equipment')

@section('content')

    <h1 class="text-2xl font-bold mb-5">
        Equipment Details
    </h1>

    <div class="bg-white p-6 rounded shadow space-y-3">

        <p>
            <strong>Name:</strong>
            {{ $equipment->equipment_name }}
        </p>

        <p>
            <strong>Category:</strong>
            {{ $equipment->category }}
        </p>

        <p>
            <strong>Unit Price:</strong>
            ₱{{ number_format($equipment->unit_price, 2) }}
        </p>

        <p>
            <strong>Description:</strong>
            {{ $equipment->description }}
        </p>

        <p>
            <strong>Availability:</strong>
            {{ $equipment->availability_status }}
        </p>

        <p>
            <strong>Date Added:</strong>
            {{ $equipment->created_at->format('F d, Y') }}
        </p>

        <div class="flex gap-3 pt-3">

            <a href="{{ route('equipment.edit', $equipment->id) }}"
               class="bg-green-600 text-white px-4 py-2 rounded">
                Edit
            </a>

            <a href="{{ route('equipment.index') }}"
               class="bg-gray-300 px-4 py-2 rounded">
                Back
            </a>

        </div>

    </div>

@endsection
