@extends('layouts.app')

@section('title', 'Product API Test')

@section('content')

<div class="page-header">
    <div>
        <h1>Product API Test</h1>
        <p>Test the Product GET API</p>
    </div>
</div>

<div class="test-card">


    <button id="getProductsBtn" class="btn btn-primary">
        Get Products
    </button>

    <div id="result" class="table-container">
        <p>Click "Get Products" to load products.</p>
    </div>


</div>

<script>
document.getElementById('getProductsBtn').addEventListener('click', async function() {

    const result = document.getElementById('result');

    result.innerHTML = '<p>Loading...</p>';

    try {
        const response = await fetch('/api/products');

        const data = await response.json();

        if (!data.success) {
            result.innerHTML = '<p>Failed to load products.</p>';
            return;
        }

        if (data.products.length === 0) {
            result.innerHTML = '<p>No products found.</p>';
            return;
        }

        result.innerHTML = `
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        ${data.products.map(product => `
                            <tr>
                                <td>${product.id}</td>
                                <td>${product.name}</td>
                                <td>${product.description}</td>
                                <td>${product.price}</td>
                                <td>
                                    ${product.status == 1 ? 'Visible' : 'Hidden'}
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            `;

    } catch (error) {
        result.innerHTML = '<p>Something went wrong.</p>';
        console.error(error);
    }
});
</script>

@endsection