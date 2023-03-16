@extends('layouts.default')

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 pt-8 mx-auto">
            <form
                method="GET"
                class="flex gap-2">
            <input type="search" id="search" name="search" value="" placeholder="Search for a product"
                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-4 px-3 leading-8 transition-colors duration-200 ease-in-out" />
            <button type="submit"
                class="flex items-center ml-auto text-white bg-indigo-500 border-0 py-2 px-12 focus:outline-none hover:bg-indigo-600 rounded">Search</button>
            </form>
        </div>
    </section>
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a href="{{ route('product.show', $product->slug) }}"
                            class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src="{{ Storage::disk('public')->url($product->image) }}">
                        </a>
                        <div class="mt-4">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->title }}</h2>
                            </a>
                            <p class="mt-1">${{ $product->price }}</p>
                        </div>
                        <a href="{{ route('product.show', $product->slug) }}"
                            class="mt-3 text-indigo-500 inline-flex items-center">Ver mais
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach

                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
