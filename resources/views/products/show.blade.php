@extends('layouts.default')
@section('title', "$product->title - Mark Shop")

@section('content')
    <section class="text-gray-600 overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="{{ $product->image }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->title }}</h1>
                    <div class="flex border-t-2 border-gray-100 mt-6 py-6">
                        <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price }}</span>
                    </div>
                    <p class="leading-relaxed">{{ $product->description }}</p>
                    <div class="my-5">
                        @if ($product->stock)
                            <span
                                class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">Em
                                estoque</span>
                        @else
                            <span
                                class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-slate-100 text-slate-800">Fora
                                de estoque</span>
                        @endif
                    </div>

                    <div class="flex flex-col border-t-2 border-gray-100 pt-6 gap-3">
                        <a
                                class="flex justify-center cursor-pointer text-slate-700 bg-slate-200 border-0 py-4 px-6 focus:outline-none hover:bg-slate-300 rounded">Add to cart</a>
                        @if ($product->stock)
                            <a
                                class="flex justify-center cursor-pointer text-white bg-indigo-500 border-0 py-4 px-6 focus:outline-none hover:bg-indigo-600 rounded">Buy</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
