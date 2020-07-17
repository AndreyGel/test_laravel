@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <h2>Products</h2>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                </tr>
                </thead>
                <tbody>

                @forelse($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id  ?? '--'}}</th>
                        <td style="word-break: break-all">{{ $product->image_url  ?? '--'}}</td>
                        <td>{{ $product->product_name}}</td>
                        <td>{{ $product->categories ?? '--'}}</td>
                    </tr>
                @empty

                @endforelse

                </tbody>
            </table>

        </div>
    </div>
@endsection
