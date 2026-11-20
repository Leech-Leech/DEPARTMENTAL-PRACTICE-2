
@extends('layouts.equipment')

@section('title', 'Equipment Reports')

@section('content')

    <h1 class="text-2xl font-bold mb-5">
        Equipment Reports
    </h1>

    <!-- Report filters -->
    <form action="{{ route('reports.index') }}" method="GET"
          class="bg-white p-5 rounded shadow mb-5">

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label>Category</label>

                <select name="category" class="w-full border p-2 rounded">
                    <option value="">All Categories</option>

                    <option value="Paddles" {{ request('category') == 'Paddles' ? 'selected' : '' }}>Paddles</option>

                    <option value="Balls" {{ request('category') == 'Balls' ? 'selected' : '' }}>Balls</option>

                    <option value="Nets" {{ request('category') == 'Nets' ? 'selected' : '' }}>Nets</option>

                    <option value="Accessories" {{ request('category') == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                </select>
            </div>

            <div>
                <label>Availability</label>

                <select name="availability_status"
                        class="w-full border p-2 rounded">

                    <option value="">All Statuses</option>

                    <option value="Available" {{ request('availability_status') == 'Available' ? 'selected' : '' }}>
                        Available
                    </option>

                    <option value="Unavailable" {{ request('availability_status') == 'Unavailable' ? 'selected' : '' }}>
                        Unavailable
                    </option>

                </select>
            </div>

        </div>

        <div class="flex gap-3 mt-4">

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Filter
            </button>

            <a href="{{ route('reports.index') }}"
               class="bg-gray-300 px-4 py-2 rounded">
                Reset
            </a>

            <a href="{{ route('reports.pdf', request()->only('category', 'availability_status')) }}"
               class="bg-red-600 text-white px-4 py-2 rounded">
                Export PDF
            </a>

        </div>

    </form>

    <!-- Report results -->
    <div class="bg-white p-5 rounded shadow">

        <div class="flex justify-between mb-4">

            <h2 class="text-xl font-bold">
                Equipment Records
            </h2>

            <span>
                Total: {{ $equipment->count() }}
            </span>

        </div>

        @if($equipment->isEmpty())

            <p class="text-gray-600">
                No equipment records match your filters.
            </p>

        @else

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3">Equipment Name</th>
                            <th class="p-3">Category</th>
                            <th class="p-3">Unit Price</th>
                            <th class="p-3">Availability</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($equipment as $item)

                            <tr class="border-b">

                                <td class="p-3">
                                    {{ $item->equipment_name }}
                                </td>

                                <td class="p-3">
                                    {{ $item->category }}
                                </td>

                                <td class="p-3">
                                    ₱{{ number_format($item->unit_price, 2) }}
                                </td>

                                <td class="p-3">
                                    {{ $item->availability_status }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

@endsection
