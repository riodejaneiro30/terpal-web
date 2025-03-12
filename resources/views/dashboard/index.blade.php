@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    <div class="w-full">
        
        <div class="grid grid-cols-4 gap-4">
            <div class="flex flex-col justify-center items-center rounded-xl p-6 bg-[#80C0CE] shadow-md">
                <p class="text-xl font-semibold text-white mb-2">Produk yang tersedia</p>
                <p class="text-4xl font-bold text-white">{{ $totalProducts }}</p>
            </div>
        </div>
        <div class="mt-8" style="width: 40%;">
            <canvas id="productGroupByCategoryChart"></canvas>
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('productGroupByCategoryChart').getContext('2d');
    const productGroupByCategoryChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($productGroupByCategory->pluck('product_category_name')) !!},
            datasets: [{
                label: 'Banyak Produk',
                data: {!! json_encode($productGroupByCategory->pluck('products_count')) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Distribusi Produk berdasarkan kategori'
                }
            }
        }
    });
</script>
@endsection
