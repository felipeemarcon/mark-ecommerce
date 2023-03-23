@extends('layouts.default')
@section('title', 'Mark Shop - Admin | Products')

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/2 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Products</h1>
                    <a
                        href={{ route('admin.product.create') }}
                        class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded">Add
                        new product</a>
                </div>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                                style="width: 150px">Image</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                SKU</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Price</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Stock</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Created at</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($products as $product)
                            <tr class="bg-gray-50">
                                <td class="px-4 py-3">{{ $product->id }}</td>
                                <td class="px-4 py-3">
                                    <img alt="{{ $product->name }}"
                                    class="aspect-square object-cover object-center w-full h-full block"
                                        src="{{ Storage::disk('public')->url($product->image) }}">
                                </td>
                                <td class="px-4 py-3">{{ $product->name }}</td>
                                <td class="px-4 py-3">{{ $product->sku }}</td>
                                <td class="px-4 py-3">R$ {{ $product->price }}</td>
                                <td class="px-4 py-3">{{ $product->stock }}</td>
                                <td class="px-4 py-3">{{ date('j F, Y', strtotime($product->created_at)) }}
                                </td>
                                <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                                    <a
                                        href="{{ route('admin.product.edit', $product->id) }}"
                                        class="text-indigo-500 inline-flex items-center">Editar</a>
                                    <a
                                        href="{{ route('admin.product.destroy', $product->id) }}"
                                        class="text-indigo-500 inline-flex items-center">Deletar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
