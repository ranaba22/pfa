<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Departement;
use App\Models\Employee;
use App\Models\Fournisseur;

class DashboardController extends Controller
{
    public function index()
    {
        // Pie Chart: Number of articles by category
        $articlesByCategory = Article::selectRaw('id_categorie, COUNT(*) as count')
            ->groupBy('id_categorie')
            ->get()
            ->map(function ($item) {
                return [
                    'category' => $item->id_categorie, // Replace with category name if relations are set up
                    'count' => $item->count
                ];
            });

        // Bar Chart: Number of employees by department
        $employeesByDepartment = Employee::selectRaw('id_departement, COUNT(*) as count')
            ->groupBy('id_departement')
            ->get()
            ->map(function ($item) {
                return [
                    'department' => $item->id_departement, // Replace with department name if relations are set up
                    'count' => $item->count
                ];
            });

        // Bar Chart: Number of products by supplier
        $productsBySupplier = Article::selectRaw('id_fournisseur, COUNT(*) as count')
            ->groupBy('id_fournisseur')
            ->get()
            ->map(function ($item) {
                return [
                    'supplier' => $item->id_fournisseur, // Replace with supplier name if relations are set up
                    'count' => $item->count
                ];
            });

        // Bar Chart: Number of products by category by year
        $articlesByYear = Article::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
        ->groupBy('year')
        ->get()
        ->map(function ($item) {
            return [
                'year' => $item->year,
                'count' => $item->count
            ];
        });

    // Bar Chart: Number of articles by month
    $articlesByMonth = Article::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->get()
        ->map(function ($item) {
            return [
                'month' => $item->month,
                'count' => $item->count
            ];
        });
        return view('dashboard', compact(
            'articlesByCategory',
            'employeesByDepartment',
            'productsBySupplier',
            'articlesByYear',
            'articlesByMonth'
        ));
    }
}
