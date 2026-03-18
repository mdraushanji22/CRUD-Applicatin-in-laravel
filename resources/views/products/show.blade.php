@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="card shadow">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-primary"><i class="fas fa-box"></i> Product Details</h4>
            <div class="btn-group">
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid rounded border shadow-sm"
                             style="max-height: 400px; width: 100%; object-fit: cover;">
                    @else
                        <div style="background-color: #e9ecef; height: 400px;" 
                             class="d-flex align-items-center justify-content-center rounded border">
                            <i class="fas fa-image fa-5x text-muted"></i>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 150px;">Product Name:</th>
                        <td><strong>{{ $product->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td>{{ $product->description ?? 'No description available' }}</td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td>
                            <span class="fs-4 text-success">
                                <strong>${{ number_format($product->price, 2) }}</strong>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Quantity Available:</th>
                        <td>
                            @if($product->quantity > 0)
                                <span class="badge bg-success fs-6">{{ $product->quantity }} in stock</span>
                            @else
                                <span class="badge bg-danger fs-6">Out of Stock</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{ $product->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Last Updated:</th>
                        <td>{{ $product->updated_at->format('M d, Y h:i A') }}</td>
                    </tr>
                </table>

                <div class="mt-4 p-3 bg-light rounded">
                    <h5><i class="fas fa-info-circle text-primary"></i> Product Information</h5>
                    <p class="mb-0 small text-muted">
                        This product was added on {{ $product->created_at->format('F d, Y') }} and was last updated on {{ $product->updated_at->format('F d, Y') }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white">
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                <i class="fas fa-trash"></i> Delete Product
            </button>
        </form>
    </div>
</div>
@endsection
