@extends('layouts.app')

@section('title', 'Product API Test')

@section('content')

<div class="page-header">
    <div>
        <h1>Product API Test</h1>
        <p>Test the Product API</p>
    </div>
</div>

{{-- Get Products --}}

<div class="test-card">

    ```
    <h2>Get Products</h2>
    <p>Retrieve all products from the API.</p>

    <button id="getProductsBtn" class="btn btn-primary">
        Get Products
    </button>

    <div id="result" class="table-container">
        <p>Click "Get Products" to load products.</p>
    </div>
    ```

</div>

{{-- Create Product --}}

<div class="test-card">

    ```
    <h2>Create Product</h2>
    <p>Add a new product through the API.</p>

    <form id="createProductForm">

        <div class="form-group">
            <label for="productName">Name</label>
            <input type="text" id="productName" name="name">
        </div>

        <div class="form-group">
            <label for="productDescription">Description</label>
            <textarea id="productDescription" name="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="productPrice">Price</label>
            <input type="number" id="productPrice" name="price" step="0.01">
        </div>

        <div class="form-group">
            <label for="productStatus">Status</label>

            <input type="checkbox" id="productStatus" name="status" value="1" checked>

            <label for="productStatus">Visible</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Create Product
        </button>

    </form>

    <div id="createResult"></div>
    ```

</div>

<script>
// GET ALL PRODUCTS

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


// CREATE PRODUCT

document.getElementById('createProductForm').addEventListener('submit', async function(event) {

    event.preventDefault();

    const createResult = document.getElementById('createResult');

    const name = document.getElementById('productName').value;
    const description = document.getElementById('productDescription').value;
    const price = document.getElementById('productPrice').value;
    const status = document.getElementById('productStatus').checked ? 1 : 0;

    createResult.innerHTML = '<p>Creating product...</p>';

    try {

        const response = await fetch('/api/products', {

            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },

            body: JSON.stringify({
                name: name,
                description: description,
                price: price,
                status: status
            })

        });

        const data = await response.json();

        if (!response.ok) {
            createResult.innerHTML = '<p>Failed to create product.</p>';
            console.log(data);
            return;
        }

        createResult.innerHTML = `
                <p>Product created successfully!</p>
            `;

        document.getElementById('createProductForm').reset();

    } catch (error) {

        createResult.innerHTML = '<p>Something went wrong.</p>';

        console.error(error);
    }

});
</script>

@endsection