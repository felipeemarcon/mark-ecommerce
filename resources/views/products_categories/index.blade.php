@extends('layouts.default')
@section('title', 'Products Categories - Mark Shop')

@section('content')
    <section class="text-slate-700">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-col gap-8">
                <h1 class="text-4xl font-bold text-slate-700 pl-3">Categories</h1>
                <div class="flex flex-wrap">
                    <ul class="flex flex-col">
                        @foreach ($categories as $category)
                            <li class="flex">
                                <a href="{{ route('product.category', $category->id) }}"
                                    class="flex flex-1 items-center leading-tight text-indigo-500 hover:text-indigo-800 cursor-pointer p-4 gap-2 hover:pl-6 hover:bg-slate-100 hover:rounded-lg transition-all">
                                    <span>#{{ $category->id }} - {{ $category->name }}</span>
                                    <span class="inline-flex text-sm text-slate-400 mr-2">{{ count($category->products) }}
                                        products</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
