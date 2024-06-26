@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0 py-14 md:py-24 lg:py-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-14 pb-5 gap-5 sm:gap-10 ">
                <div class="grid gap-10">
                    @if($category->slug != 'dua-dhikir')
                    <div>
                        <h1 class="text-[16px] text-center font-medium dark:text-white">{{ $category->name }}</h1>
                        <span class="w-[50px] mx-auto h-[2px] block bg-slate-600 dark:bg-slate-50"></span>
                    </div>
                    @endif
                    <div 
                        class="grid grid-cols-2 
                        sm:grid-cols-{{$category->column}}
                            justify-between gap-5 md:gap-10"
                        >
                        @foreach ($category->posts as $item) 
                            <a href="{{ route('post.details', $item->slug) }}" class="hover:scale-x-90 hover:scale-y-95 hover:rotate-2 transition-all duration-300 col-span-1 bg-white drop-shadow-lg text-center rounded overflow-hidden">
                                <img class="w-full object-cover lazyload" src="{{ asset('placeholder.webp') }}" data-src="{{ asset($item->image) }}" alt="">
                                @if($category->print_title)
                                <p class="font-medium text-[18px]" style="padding: 10px;">{{ $item->title }}</p>
                                @endif
                            </a>
                        @endforeach
                    </div>
                    @if(!count($category->posts))
                        <h1>No result found</h1>
                    @endif
                </div>
            </div>

            @include('components.right-sidebar')
            
        </div>
    </div>
@endsection
