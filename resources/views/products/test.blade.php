@extends('layouts.app')

@section('title', 'Product API Test')

@section('content')

<div class="page-header">
    <div>
        <h1>Product API Test</h1>
        <p>Test the Product API</p>
    </div>
</div>

{{-- Get All Products --}}

<div class="test-card">


    <h2>Get Products</h2>
    <p>Retrieve all products from the API.</p>

    <button id="getProductsBtn" class="btn btn-primary">
        Get Products
    </button>

    <div id="result" class="table-container">
        <p>Click "Get Products" to load products.</p>
    </div>


</div>

{{-- Create Product --}}

<div class="test-card">


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


</div>

{{-- Get Product By ID --}}

<div class="test-card">


    <h2>Get Product</h2>
    <p>Retrieve a single product by ID.</p>

    <form id="getProductForm">

        <div class="form-group">
            <label for="productId">Product ID</label>

            <input type="number" id="productId" name="id" min="1">
        </div>

        <button type="submit" class="btn btn-primary">
            Get Product
        </button>

    </form>

    <div id="singleProductResult"></div>


</div>

{{-- Update Product --}}

<div class="test-card">


    <h2>Update Product</h2>
    <p>Update an existing product through the API.</p>

    <form id="updateProductForm">

        <div class="form-group">
            <label for="updateProductId">Product ID</label>

            <input type="number" id="updateProductId" min="1">
        </div>

        <div class="form-group">
            <label for="updateProductName">Name</label>

            <input type="text" id="updateProductName">
        </div>

        <div class="form-group">
            <label for="updateProductDescription">Description</label>

            <textarea id="updateProductDescription" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="updateProductPrice">Price</label>

            <input type="number" id="updateProductPrice" step="0.01">
        </div>

        <div class="form-group">
            <label for="updateProductStatus">Status</label>

            <input type="checkbox" id="updateProductStatus" value="1">

            <label for="updateProductStatus">
                Visible
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Product
        </button>

    </form>

    <div id="updateResult"></div>


</div>

{{-- Delete Product --}}

<div class="test-card">


    <h2>Delete Product</h2>
    <p>Delete a product by ID.</p>

    <form id="deleteProductForm">

        <div class="form-group">
            <label for="deleteProductId">Product ID</label>

            <input type="number" id="deleteProductId" min="1">
        </div>

        <button type="submit" class="btn btn-danger">
            Delete Product
        </button>

    </form>

    <div id="deleteResult"></div>


</div>

<script>
// ==============================
// GET ALL PRODUCTS
// ==============================

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


// ==============================
// CREATE PRODUCT
// ==============================

document.getElementById('createProductForm').addEventListener('submit', async function(event) {

    event.preventDefault();

    const createResult = document.getElementById('createResult');
    // get the data values from the inputs 
    const name = document.getElementById('productName').value;
    const description = document.getElementById('productDescription').value;
    const price = document.getElementById('productPrice').value;
    const status = document.getElementById('productStatus').checked ? 1 : 0;

    createResult.innerHTML = '<p>Creating product...</p>';

    try {

        const response = await fetch('/api/products', {
            //  POST/api/products
            // this route leads to store() function 
            method: 'POST',
            // el data is sent in json form 
            //el response mstneh in json form brdo
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            //el data ely I took it from the elements values de ely h post beha 


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


// ==============================
// GET PRODUCT BY ID
// ==============================

document.getElementById('getProductForm').addEventListener('submit', async function(event) {

    event.preventDefault();

    const id = document.getElementById('productId').value;

    const result = document.getElementById('singleProductResult');

    result.innerHTML = '<p>Loading...</p>';

    try {
        //el url de htro7 3la route ->productController -> show()
        const response = await fetch(`/api/products/${id}`);

        const data = await response.json();

        if (!response.ok) {

            result.innerHTML = '<p>Product not found.</p>';

            return;
        }

        const product = data.product;

        result.innerHTML = `
                <div class="product-details">

                    <p>
                        <strong>ID:</strong>
                        ${product.id}
                    </p>

                    <p>
                        <strong>Name:</strong>
                        ${product.name}
                    </p>

                    <p>
                        <strong>Description:</strong>
                        ${product.description}
                    </p>

                    <p>
                        <strong>Price:</strong>
                        ${product.price}
                    </p>

                    <p>
                        <strong>Status:</strong>
                        ${product.status == 1 ? 'Visible' : 'Hidden'}
                    </p>

                </div>
            `;

    } catch (error) {

        result.innerHTML = '<p>Something went wrong.</p>';

        console.error(error);
    }

});


// ==============================
// UPDATE PRODUCT
// ==============================

document.getElementById('updateProductForm').addEventListener('submit', async function(event) {

    event.preventDefault();

    const id = document.getElementById('updateProductId').value;

    const updateResult = document.getElementById('updateResult');

    const name = document.getElementById('updateProductName').value;
    const description = document.getElementById('updateProductDescription').value;
    const price = document.getElementById('updateProductPrice').value;
    const status = document.getElementById('updateProductStatus').checked ? 1 : 0;

    updateResult.innerHTML = '<p>Updating product...</p>';

    try {

        const response = await fetch(`/api/products/${id}`, {
            //put l2no by update 
            method: 'PUT',

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

            updateResult.innerHTML = '<p>Failed to update product.</p>';

            console.log(data);

            return;
        }

        updateResult.innerHTML = `
                <p>Product updated successfully!</p>
            `;

        document.getElementById('updateProductForm').reset();

    } catch (error) {

        updateResult.innerHTML = '<p>Something went wrong.</p>';

        console.error(error);
    }

});


// ==============================
// DELETE PRODUCT
// ==============================

document.getElementById('deleteProductForm').addEventListener('submit', async function(event) {

    event.preventDefault();

    const id = document.getElementById('deleteProductId').value;

    const deleteResult = document.getElementById('deleteResult');

    deleteResult.innerHTML = '<p>Deleting product...</p>';

    try {

        const response = await fetch(`/api/products/${id}`, {

            method: 'DELETE',

            headers: {
                'Accept': 'application/json'
            }

        });

        const data = await response.json();

        if (!response.ok) {

            deleteResult.innerHTML = '<p>Failed to delete product.</p>';

            console.log(data);

            return;
        }

        deleteResult.innerHTML = `
                <p>Product deleted successfully!</p>
            `;

        document.getElementById('deleteProductForm').reset();

    } catch (error) {

        deleteResult.innerHTML = '<p>Something went wrong.</p>';

        console.error(error);
    }

});
</script>

@endsection