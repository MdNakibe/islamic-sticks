@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-50 mt-10 md:mt-0 md:pt-14 pb-5">
                <div class="">
                    <h1 class="text-[30px] font-bold dark:text-white">{{ $news->title }}</h1>
                </div>
                <span class="w-full h-[1px] bg-slate-400 dark:bg-slate-200 inline-block my-8"></span>
                <div class="">

                    <div class="py-10">
                        {!! $news->description !!}
                    </div>
                    <div class="flex justify-between bg-primary-200 p-5 sm:p-8">
                        @php
                            $nextPrev = getNextPreviousNews($news->id);
                        @endphp
                        @if ($nextPrev['valid'])
                            <div class="grid gap-2">
                                <a href="{{ route('post.details', $nextPrev['previousPost']->slug) }}"
                                    class="mb-2 font-medium hover:text-primary-600 text-[18px] uppercase">{{ $nextPrev['previousPost']->title }}</a>
                                <a href="{{ route('post.details', $nextPrev['previousPost']->slug) }}"
                                    class="flex items-center hover:text-primary-600 text-[15px]">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrow-narrow-left" width="26" height="26"
                                        viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                        <path d="M5 12l4 4"></path>
                                        <path d="M5 12l4 -4"></path>
                                    </svg>
                                    <p class="">Previous</p>
                                </a>
                            </div>
                            <div class="grid gap-2">
                                <a href="{{ route('post.details', $nextPrev['nextPost']->slug) }}"
                                    class="mb-2 font-medium hover:text-primary-600 text-[18px] uppercase">{{ $nextPrev['nextPost']->title }}</a>
                                <a href="{{ route('post.details', $nextPrev['nextPost']->slug) }}"
                                    class="flex items-center justify-end float-right hover:text-primary-600 text-[15px]">
                                    <p class="">Next</p>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrow-narrow-right" width="26"
                                        height="26" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                        <path d="M15 16l4 -4"></path>
                                        <path d="M15 8l4 4"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                    @if (count($relatedPost))
                        <div class="py-10">
                            <h1 class="text-[25px] pb-5 dark:text-white">Related Posts</h1>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-5">
                                @foreach ($relatedPost as $item)
                                    <div class="grid gap-2">
                                        <a href="{{ route('post.details', $item->slug) }}"
                                            class="bg-primary-200 text-center text-[20px] py-10 font-bold">
                                            {{ $item->title }}
                                        </a>
                                        <div>
                                            <a href="{{ route('post.details', $item->slug) }}"
                                                class="font-medium text-[18px] hover:text-primary-600  dark:text-white">
                                                {{ $item->title }}
                                            </a>
                                        </div>
                                        <div class=" dark:text-white">
                                            <span>
                                                {{ date('M d Y', strtotime($item->created_at)) }}
                                                /</span>
                                            <a href="{{ route('post.details', $item->slug) }}"
                                                class="hover:text-primary-600">{{ $item->title }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @include('components.news-right-sidebar', $news)

        </div>
    </div>
    <style>
        .mymention {
            color: gray;
        }

        .igniter_box {
            display: block;
            padding: 20px;
            background: #F4E9B3;
        }
    </style>
@endsection
