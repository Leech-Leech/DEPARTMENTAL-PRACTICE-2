
@extends('layouts.equipment')

@section('title', 'Equipment List')

@section('content')

    <div class="flex justify-between items-center mb-5">

        <h1 class="text-2xl font-bold">
            Equipment List
        </h1>

        <a href="{{ route('equipment.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Equipment
        </a>

    </div>

    @if($equipment->isEmpty())

        <p class="bg-white p-4 rounded">
            No equipment records found.
        </p>

    @else

        <div class="bg-white rounded shadow overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3">Name</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Price</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Actions</th>
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

                            <td class="p-3">

                                <a href="{{ route('equipment.show', $item->id) }}"
                                   class="text-blue-600">
                                    View
                                </a>

                                |

                                <a href="{{ route('equipment.edit', $item->id) }}"
                                   class="text-green-600">
                                    Edit
                                </a>

                                |

                                <form action="{{ route('equipment.destroy', $item->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this equipment?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

@endsection
