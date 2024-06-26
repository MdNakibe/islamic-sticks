@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto ">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0 py-4 md:py-0 lg:py-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-14 pb-5 gap-5 sm:gap-10 ">
                <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <select id="sura_list"
                        class="w-full py-3 px-2 cursor-pointer dark:bg-slate-800 dark:text-slate-50 dark:border-slate-600 font-medium outline-none border border-slate-400 rounded">
                        <option disabled>CHOOSE SURA</option>
                        @foreach ($sura_list as $item)
                            <option value="{{ $item->number }}" @if ($item->number == $index) selected @endif>
                                {{ $item->englishName }}</option>
                        @endforeach
                    </select>
                    {{-- language --}}
                    <select id="lang_list"
                        class="w-full py-3 px-2 cursor-pointer dark:bg-slate-800 dark:text-slate-50 dark:border-slate-500 outline-none font-medium border border-slate-400 rounded">
                        <option disabled><b>CHOOSE LANGUAGE</b></option>
                        @foreach ($edition_list as $item)
                            <option value="{{ $item->identifier }}" @if ($item->identifier == $edition) selected @endif>
                                {{ $item->languageName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="bg-white dark:bg-slate-800 lg:p-14 p-5 rounded border border-slate-400 dark:border-slate-500 grid gap-10 relative">
                    {{-- <div class="absolute top-0 left-0 right-0 bottom-0">
                        <img class="!h-full w-1 absolute left-0" src="{{ asset('frontend/images/quran-border.svg') }}" alt="">
                        <img class="w-12 -left-[25px] top-1/2 -translate-y-1/2 absolute" src="{{ asset('frontend/images/quran-frame.png') }}" alt="">
                        <img class="w-12 -right-[25px] top-1/2 -translate-y-1/2 absolute" src="{{ asset('frontend/images/quran-frame.png') }}" alt="">
                        <img class="w-12 -top-[43px] left-1/2 -translate-x-1/2 rotate-90 absolute" src="{{ asset('frontend/images/quran-frame.png') }}" alt="">
                        <img class="w-12 -bottom-[43px] left-1/2 -translate-x-1/2 rotate-90 absolute" src="{{ asset('frontend/images/quran-frame.png') }}" alt="">
                    </div> --}}
                    <div class="border-b dark:border-slate-700 pb-5">
                        <div class="items-center justify-center flex gap-0 sm:gap-10">
                            <button onclick="prevSura()"
                                class="hover:bg-primary-200 bg-slate-200 dark:text-slate-50 dark:hover:bg-slate-900 dark:bg-slate-700 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[45px] h-[45px] sm:w-[55px] sm:h-[55px]"
                                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 6l-6 6l6 6"></path>
                                </svg>
                            </button>
                            <div class="items-center justify-center gap-5 flex">
                                <div class="flex-1 dark:text-slate-50">
                                    <div class="flex flex-wrap justify-center gap-2 sm:gap-5">
                                        <h2 class="text-2xl sm:text-3xl font-bold text-center">{{ $content->englishName }}
                                        </h2>
                                        <h3 class="text-xl mt-2 font-bold mb-4 font-nh font-arabic">( {{ $content->name }} )
                                        </h3>
                                    </div>
                                    <div class="flex flex-wrap gap-2 justify-center">
                                        <span
                                            class="bg-primary-100 text-primary-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-900">
                                            {{ $content->englishNameTranslation }}
                                        </span>
                                        <span
                                            class="bg-primary-700 text-primary-100 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                            {{ $content->revelationType }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button onclick="nextSura()"
                                class="hover:bg-primary-200 bg-slate-200 dark:text-slate-50 dark:hover:bg-slate-900 dark:bg-slate-700 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[45px] h-[45px] sm:w-[55px] sm:h-[55px]"
                                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="pt-6 flex justify-center w-full">
                            <audio controls class="w-full block">
                                <source
                                    src="https://cdn.islamic.network/quran/audio-surah/128/ar.alafasy/{{ $index }}.mp3"
                                    type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>

                    <div class="dark:text-slate-50">
                        @foreach ($content->ayahs as $key => $ayah)
                            <div class="border-b border-slate-400 dark:border-slate-500 py-3 grid gap-2">
                                <p class="font-arabic text-[28px] text-right">
                                    {{ $arabic_content->ayahs[$key]->text }}
                                </p>
                                <p class="@if ($edition == 'bangla') font-bangla @endif text-[18px] @if($edition_info->direction == 'rtl') text-right @endif ">
                                    {{ $ayah->text }}
                                </p>
                            </div>
                        @endforeach
                    </div>
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

@push('js')
    <script>
        let edition = `{{ $edition }}`
        let index = `{{ $index }}`
        let url = `{{ url('') }}`
        $('#lang_list').change(function() {
            let val = $(this).val();
            location.href = `${url}/surah/${val}/${index}`;
        })

        $('#sura_list').change(function() {
            let val = $(this).val();
            location.href = `${url}/surah/${edition}/${val}`;
        })

        function prevSura() {
            if (+index > 1) {
                location.href = `${url}/surah/${edition}/${+index-1}`;
            }
        }

        function nextSura() {
            if (+index < 114) {
                location.href = `${url}/surah/${edition}/${+index+1}`;
            }
        }
    </script>
@endpush
