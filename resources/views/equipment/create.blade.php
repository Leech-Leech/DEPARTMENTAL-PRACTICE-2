
@extends('layouts.equipment')

@section('title', 'Add Equipment')

@section('content')

    <h1 class="text-2xl font-bold mb-5">
        Add Equipment
    </h1>

    <form action="{{ route('equipment.store') }}" method="POST"
          class="bg-white p-6 rounded shadow space-y-4">

        @csrf

        <div>
            <label>Equipment Name</label>

            <input type="text" name="equipment_name"
                   value="{{ old('equipment_name') }}"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        <div>
            <label>Category</label>

            <select name="category" class="w-full border p-2 rounded" required>
                <option value="">Select Category</option>

                <option value="Paddles" {{ old('category') == 'Paddles' ? 'selected' : '' }}>Paddles</option>

                <option value="Balls" {{ old('category') == 'Balls' ? 'selected' : '' }}>Balls</option>

                <option value="Nets" {{ old('category') == 'Nets' ? 'selected' : '' }}>Nets</option>

                <option value="Accessories" {{ old('category') == 'Accessories' ? 'selected' : '' }}>Accessories</option>
            </select>
        </div>

        <div>
            <label>Unit Price</label>

            <input type="number" name="unit_price"
                   value="{{ old('unit_price') }}"
                   min="0" step="0.01"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        <div>
            <label>Description</label>

            <textarea name="description"
                      class="w-full border p-2 rounded"
                      required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Availability Status</label>

            <select name="availability_status"
                    class="w-full border p-2 rounded" required>

                <option value="">Select Status</option>

                <option value="Available" {{ old('availability_status') == 'Available' ? 'selected' : '' }}>
                    Available
                </option>

                <option value="Unavailable" {{ old('availability_status') == 'Unavailable' ? 'selected' : '' }}>
                    Unavailable
                </option>

            </select>
        </div>

        <div class="flex gap-3">

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Save Equipment
            </button>

            <a href="{{ route('equipment.index') }}"
               class="bg-gray-300 px-4 py-2 rounded">
                Cancel
            </a>

        </div>

    </form>

@endsection
