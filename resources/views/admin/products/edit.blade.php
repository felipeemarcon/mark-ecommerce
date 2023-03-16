@extends('layouts.default')
@section('title', "Edit Product - $product->title | Mark Shop - Admin")

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Edit product</h1>
                </div>

                {{ $product->slug }}
                <form method="POST" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="title" class="leading-7 text-sm text-gray-600">Product title</label>
                                <input type="text" id="title" name="title" value="{{ $product->title }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                                <input type="number" id="price" name="price" value="{{ $product->price }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Stock</label>
                                <input type="text" id="stock" name="stock" value="{{ $product->stock }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="image" class="leading-7 text-sm text-gray-600">Product mage</label>
                                <label class="block pt-1" for="image">
                                    <span class="sr-only">Choose product photo</span>
                                    <input type="file" id="image" name="image" class="block w-full cursor-pointer text-sm text-slate-500 file:cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100
                                    "/>
                                </label>
                            </div>
                        </div>

                        @if ($product->image)
                            <div class="flex flex-col p-2 w-1/2">
                                <div class="border-2 border-dashed border-slate-200 p-2 rounded-lg mr-auto">
                                    <img class="aspect-square object-cover object-center w-full h-full block rounded-md"
                                        src="{{ Storage::disk('public')->url($product->image) }}"
                                        alt="{{ $product->title }}">
                                </div>
                                <a href="{{ route('admin.product.destroyImage', $product->id) }}"
                                    class="flex mr-auto mt-2 items-start text-red-700 text-sm font-semibold bg-red-100 p-3 rounded hover:bg-red-200 transition-colors">Delete
                                    image</a>
                            </div>
                        @endif

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                                <textarea id="description" name="description"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <button type="submit"
                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Update</button>
                        </div>

                        <div class="p-2 w-full">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
