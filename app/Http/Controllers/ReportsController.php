<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportsController extends Controller
{
    // Display equipment reports with filters.
    public function index(Request $request)
    {
        $filters = $request->validate([
            'category' => 'nullable|in:Paddles,Balls,Nets,Accessories',
            'availability_status' => 'nullable|in:Available,Unavailable',
        ]);

        // Only get equipment belonging to the logged-in user.
        $query = $request->user()->equipment();

        // Filter by category.
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by availability.
        if ($request->filled('availability_status')) {
            $query->where(
                'availability_status',
                $request->availability_status
            );
        }

        $equipment = $query->latest()->get();

        return view('reports.index', compact('equipment', 'filters'));
    }

    // Export the filtered equipment report as PDF.
    public function pdf(Request $request)
    {
        $request->validate([
            'category' => 'nullable|in:Paddles,Balls,Nets,Accessories',
            'availability_status' => 'nullable|in:Available,Unavailable',
        ]);

        $query = $request->user()->equipment();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('availability_status')) {
            $query->where(
                'availability_status',
                $request->availability_status
            );
        }

        $equipment = $query->latest()->get();

        $filters = $request->only([
            'category',
            'availability_status'
        ]);

        $pdf = Pdf::loadView('reports.pdf', compact(
            'equipment',
            'filters'
        ));

        return $pdf->download('equipment-report.pdf');
    }
}
