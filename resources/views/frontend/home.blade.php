@extends('frontend.app')

@section('content')
    <div class="max-w-[1200px] mx-auto px-5 xl:px-0 py-14 md:py-24">
        <div class="py-14 grid grid-cols-1 group/gridhov sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-10 sm:gap-y-20  select-none">
            @foreach ($featured_categories as $item)
            @if ($item->slug == 'al-quran')
            <a href="{{ url('surah/english/1') }}" class="overflow-hidden hover:opacity-60 transition-all duration-200">
                <img src="{{ $item->image }}" alt="img">
            </a>
            @else
            <a href="{{ route('categoryView', $item->slug) }}" class="overflow-hidden hover:opacity-60 transition-all duration-200">
                <img src="{{ $item->image }}" alt="img">
            </a>
            @endif
            @endforeach
        </div>

        {{-- Our Book --}}
        <div class="relative my-20">
            <!-- Swiper -->
            <div class="w-full absolute z-50 flex justify-between items-center -top-14">
                <h2 class="text-[25px] font-medium border-b border-black dark:border-white dark:text-white">Our Library</h2>
                <div class="flex gap-3 sm:gap-5">
                    <div
                        class="swiper-book-prev border p-1 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                            width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path d="m15 6-6 6 6 6" />
                        </svg>
                    </div>
                    <div
                        class="swiper-book-next border p-1 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                            width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path d="m9 6 6 6-6 6" />
                        </svg>
                    </div>
                </div>
            </div>
            @include('frontend.inc.books')
            
        </div>


        
        {{-- News & Stories --}}
        @php
            $newsAndStories = getRecentNews();
        @endphp
        @if ($newsAndStories && count($newsAndStories) > 0)   
        <div class="relative mt-[130px]">
            <!-- Swiper -->
            <div class="w-full absolute z-50 flex justify-between items-center -top-14">
                <h2 class="text-[25px] font-medium border-b border-black dark:border-white dark:text-white">News & Stories</h2>
                <div class="flex gap-3 sm:gap-5">
                    <div
                        class="swiper-news-prev border p-1 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                            width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path d="m15 6-6 6 6 6" />
                        </svg>
                    </div>
                    <div
                        class="swiper-news-next border p-1 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                            width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path d="m9 6 6 6-6 6" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="swiper newsMySwiper">
                <div class="swiper-wrapper"> 
                    @foreach ($newsAndStories as $item)   
                    <a href="{{ $item->link ? $item->link : route('news.details', $item->slug) }}" @if($item->link) target="_blank" @endif class="swiper-slide bg-red-500 relative cursor-pointer select-none">
                        <img src="{{ asset($item->image) }}" alt="img"
                            class="block w-full min-h-[250px] h-full object-cover">
                        <span class="absolute top-0 bg-gradient-to-t from-[#0009] z-[1] w-full h-full"></span>
                        <div class="absolute bottom-2 left-2 font-medium text-white z-20">
                            <h1 class="text-left p-2 hover:text-primary-500 text-[18px] sm:text-[16px] md:text-[18px]">
                                {{ $item->title }}
                            </h1>
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar"
                                    width="20" height="20" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M0 0h24v24H0z" stroke="none" />
                                    <path
                                        d="M4 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7zm12-4v4M8 3v4m-4 4h16m-9 4h1m0 0v3" />
                                </svg>
                                <span class="text-[12px]">
                                    {{ date('M, Y', strtotime($item->created_at)) }}
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
            </div>
        </div>
        @endif


    </div>



    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection


@push('top_js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endpush

@push('js')
    <script>
        var swiper = new Swiper(".newsMySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 60,
                },
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                prevEl: ".swiper-news-prev",
                nextEl: ".swiper-news-next",
            },
        });


        var swiper = new Swiper(".bookMySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 60,
                },
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                prevEl: ".swiper-book-prev",
                nextEl: ".swiper-book-next",
            },
        });
    </script>
@endpush
