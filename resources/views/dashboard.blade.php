@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="container">
        <!-- Flex container for charts and business profile -->
        <div class="flex flex-wrap -mx-4">
            <!-- Business Profile Card -->
            <div class="w-full px-4 mb-4">
                <div class="card shadow-lg rounded-lg overflow-hidden border border-gray-200">
                    <div class="card-body p-6">
                        <h3 class="text-2xl font-bold mb-6">{{ __('Profil de l’entreprise') }}</h3>

                        <!-- Profile Details -->
                        <div class="mb-6">
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-1/2 mb-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt text-3xl text-blue-600 mr-4"></i>
                                        <p>{{ __('Adresse') }}: <span class="text-gray-600">Rue Jamel Abdennaceur, Gabès</span></p>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 mb-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-building text-3xl text-blue-600 mr-4"></i>
                                        <p>{{ __('Raison Sociale') }}: <span class="text-gray-600">Magasin Ammar</span></p>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 mb-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-envelope text-3xl text-blue-600 mr-4"></i>
                                        <p>{{ __('Email') }}:
                                            <a href="mailto:magasin_ammar@gmail.com" class="text-blue-600 hover:underline">magasin_ammar@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 mb-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-phone-alt text-3xl text-blue-600 mr-4"></i>
                                        <p>{{ __('Téléphone') }}: <span>99780200</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="w-full px-4">
                <!-- Row 1: Two Pie Charts -->
                <div class="row mb-8">
                    <!-- Pie Chart: Articles by Category -->
                    <div class="col-md-6 mb-4">
                        <h4 class="text-lg font-semibold mb-4">{{ __('Articles par Catégorie') }}</h4>
                        <canvas id="articlesByCategoryChart"></canvas>
                    </div>
                    <!-- Pie Chart: Articles by Supplier -->
                    <div class="col-md-6 mb-4">
                        <h4 class="text-lg font-semibold mb-4">{{ __('Articles par Fournisseur') }}</h4>
                        <canvas id="articlesBySupplierChart"></canvas>
                    </div>
                </div>

                <!-- Row 2: Two Bar Charts -->
                <div class="row mb-8">
                    <!-- Bar Chart: Products by Supplier -->
                    <div class="col-md-6 mb-4">
                        <h4 class="text-lg font-semibold mb-4">{{ __('Produits par Fournisseur') }}</h4>
                        <canvas id="productsBySupplierChart"></canvas>
                    </div>
                    <!-- Bar Chart: Employees by Department -->
                    <div class="col-md-6 mb-4">
                        <h4 class="text-lg font-semibold mb-4">{{ __('Employés par Département') }}</h4>
                        <canvas id="employeesByDepartmentChart"></canvas>
                    </div>
                </div>

                <!-- Row 3: Two Line Charts -->
                <div class="row mb-8">
                    <!-- Line Chart: Products by Category by Year -->
                    <div class="col-md-6 mb-4">
                        <h4 class="text-lg font-semibold mb-4">{{ __('Produits par Catégorie (par Année)') }}</h4>
                        <canvas id="articlesByYearChart"></canvas>
                    </div>
                    <!-- Line Chart: Products by Category by Month -->
                    <div class="col-md-6 mb-4">
                        <h4 class="text-lg font-semibold mb-4">{{ __('Produits par Catégorie (par Mois)') }}</h4>
                        <canvas id="articlesByMonthChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Initialization -->
<script>
    // Pie Chart: Articles by Category
    const articlesByCategoryData = @json($articlesByCategory);
    new Chart(document.getElementById('articlesByCategoryChart'), {
        type: 'pie',
        data: {
            labels: articlesByCategoryData.map(item => item.category),
            datasets: [{
                label: '{{ __('Articles') }}',
                data: articlesByCategoryData.map(item => item.count),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
            }]
        }
    });
    const articlesBySupplierData = @json($productsBySupplier);
    new Chart(document.getElementById('articlesBySupplierChart'), {
        type: 'pie',
        data: {
            labels: articlesBySupplierData.map(item => item.supplier),
            datasets: [{
                label: '{{ __('Articles par Fournisseur') }}',
                data: articlesBySupplierData.map(item => item.count),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
            }]
        }
    });
    // Bar Chart: Employees by Department
    const employeesByDepartmentData = @json($employeesByDepartment);
    new Chart(document.getElementById('employeesByDepartmentChart'), {
        type: 'bar',
        data: {
            labels: employeesByDepartmentData.map(item => item.department),
            datasets: [{
                label: '{{ __('Employés') }}',
                data: employeesByDepartmentData.map(item => item.count),
                backgroundColor: '#36A2EB',
            }]
        }
    });

    // Bar Chart: Products by Supplier
    const productsBySupplierData = @json($productsBySupplier);
    new Chart(document.getElementById('productsBySupplierChart'), {
        type: 'bar',
        data: {
            labels: productsBySupplierData.map(item => item.supplier),
            datasets: [{
                label: '{{ __('Produits') }}',
                data: productsBySupplierData.map(item => item.count),
                backgroundColor: '#FF6384',
            }]
        }
    });

    const articlesByYearData = @json($articlesByYear);
new Chart(document.getElementById('articlesByYearChart'), {
    type: 'bar',
    data: {
        labels: articlesByYearData.map(item => item.year),
        datasets: [{
            label: '{{ __('Articles by Year') }}',
            data: articlesByYearData.map(item => item.count),
            backgroundColor: '#36A2EB',
        }]
    }
});

// Bar Chart: Articles by Month
const articlesByMonthData = @json($articlesByMonth);
new Chart(document.getElementById('articlesByMonthChart'), {
    type: 'bar',
    data: {
        labels: articlesByMonthData.map(item => item.month), // Display month number or name if needed
        datasets: [{
            label: '{{ __('Articles by Month') }}',
            data: articlesByMonthData.map(item => item.count),
            backgroundColor: '#FFCE56',
        }]
    }
});
</script>
@endsection
