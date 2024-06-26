@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0 py-4 md:py-0 lg:py-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-10 sm:pt-14 pb-5 gap-5 sm:gap-10">
                <div class="grid relative" style="gap: 90px;">
                    <div class="mb-10">
                        <h1 class="text-[25px] text-center font-medium dark:text-white">Qaida</h1>
                        <span class="w-[50px] mx-auto h-[2px] block bg-slate-600 dark:bg-slate-50"></span>
                    </div>


                    <!-- Swiper -->
                    <div class="w-full absolute z-50 select-none mt-[75px]">
                        <div class="flex justify-center bg-white font-medium sm:font-bold text-lg border border-primary-500"
                            style="width: 280px; margin: auto; border-radius: 10px">
                            <div class="swiper-btn-prev bg-primary-500 hover:bg-primary-600 px-5 py-3 text-white"
                                style="border-radius: 10px 0 0 10px">Prev</div>
                            <div class="qaida-swiper-pagination text-center px-5 py-3"></div>
                            <div class="swiper-btn-next bg-primary-500 hover:bg-primary-600 px-5 py-3 text-white"
                                style="border-radius: 0 10px 10px 0">Next</div>
                        </div>
                    </div>



                    <div class="swiper w-full h-auto">
                        <div class="swiper-wrapper ">
                            <!-- Slides -->
                            @foreach ($quidas as $item)
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset($item->image) }}" alt="img">
                            </div>
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        {{-- <div class="swiper-pagination"></div> --}}

                        <!-- If we need navigation buttons -->


                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-24">
                    @foreach ($videos as $item)
                    {!! $item->path !!}
                    @endforeach
                </div>
            </div>

            <div class="w-full md:w-[250px] lg:w-[300px] pb-[50px]">
                <div class="py-5 md:pt-14 md:pb-5 relative ">
                    <h1 class="text-[25px] font-medium dark:text-white bg-white dark:bg-slate-700 pr-5 inline-block z-10">
                        Recent Posts</h1>
                    <span
                        class="w-full h-[1px] bg-slate-500 dark:bg-slate-200 block absolute bottom-[45%] md:bottom-[30%] -z-10"></span>
                </div>
                <div class="grid gap-5">
                    @php
                        $recentPosts = getRecentPost(3);
                    @endphp
                    @foreach ($recentPosts as $item)  
                    <a href="{{ route('post.details', $item->slug) }}" class="shadow-md">
                        <img src="{{ asset($item->image) }}" alt="img">
                        <div class=" bg-white text-center p-2">
                            <p class="text-[14px]">{{ $item->title }}</p>
                            <p class="text-[17px] font-bold line-clamp-2 hover:text-primary-500">
                                {{ stringLimit($item->details, 80) }}
                            </p>
                            <p class="text-[14px]">{{ date('D m, Y', strtotime($item->created_at)) }}</p>
                        </div>
                    </a>
                    @endforeach

                </div>
                <div class="py-5 md:pt-14 md:pb-5">
                    <h1 class="text-[25px] font-medium dark:text-white mb-3">Categories</h1>
                    <div class="grid gap-2">
                        @php
                            $topCategories = getCategoryWithPostCount(8);
                        @endphp
                        @foreach ($topCategories as $item)   
                        <a href="{{ route('categoryView', $item->slug) }}"
                            class="flex justify-between border hover:text-primary-500 font-medium bg-white group">
                            <span class="p-3">{{ $item->name }}</span>
                            <span class="p-3 bg-primary-500 text-white w-[100px]  group-hover:w-[120px] transition-all">
                                {{ $item->posts_count }}
                                Posts</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="py-5 md:pt-14 md:pb-5">
                    <h1 class="text-[25px] font-medium dark:text-white mb-3">Popular Posts</h1>
                    <div class="grid gap-2">
                        @php
                            $popularPosts = getPopularPost(4);
                        @endphp
                        @foreach ($popularPosts as $item) 
                        <a href="{{ route('post.details', $item->slug) }}"
                            class="flex justify-between border hover:text-primary-500 font-medium gap-1 bg-white group">
                            <img src="{{ asset('placeholder.webp') }}" data-src="{{ asset($item->image) }}" class="w-[80px] lazyload"
                                alt="img">
                            <div class="p-2 flex flex-1 flex-col text-left">
                                <span class="">{{ $item->title }}</span>
                                <span class="text-[14px] font-normal text-left">
                                    {{ date('M d, Y', strtotime($item->created_at)) }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('top_js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endpush

@push('js')
    <!-- Initialize Swiper -->
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            // speed: 1000,

            // Autoplay
            // autoplay: {
            //     delay: 3000,
            // },

            // If we need pagination
            pagination: {
                el: ".qaida-swiper-pagination",
                type: "fraction",
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-btn-next',
                prevEl: '.swiper-btn-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>
@endpush
