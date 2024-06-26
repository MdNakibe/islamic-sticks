<div class="swiper bookMySwiper">
    <div class="swiper-wrapper">
        @foreach ($books as $book)
            <div href="{{ $book->url }}"
                class="group swiper-slide bg-red-500 relative cursor-pointer select-none overflow-visible">
                <img src="{{ asset($book->image) }}" alt="img" class="block w-full min-h-[250px] h-full object-cover">
                <span class="absolute top-0 bg-gradient-to-t from-[#0009] z-[1] w-full h-full"></span>
                {{-- <h1 class="text-left p-2 hover:text-primary-500 text-[18px] sm:text-[16px] md:text-[18px]">
                    {{ $book->title }}
                </h1>
                <div class="absolute bottom-2 left-2 font-medium text-white z-20">
                    <h1 class="text-left p-2 hover:text-primary-500 text-[18px] sm:text-[16px] md:text-[18px]">
                        {{ $book->title }}
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
                            {{ date('M, Y', strtotime($book->created_at)) }}
                        </span>
                    </div>
                </div> --}}
                {{-- <div class="absolute flex flex-col bg-white z-[998] shadow-2xl p-4 top-2 bottom-2 left-2 right-2 divide-y overflow-y-auto divide-slate-300"> --}}
                @if ($book->links)
                    <div
                        class="hidden absolute group-hover:flex flex-col bg-white z-[998] shadow-2xl p-4 top-2 bottom-2 left-2 right-2 divide-y overflow-y-auto divide-slate-300">
                        @if (@$book->links['link1'])
                            <a href="{{ $book->links['link1'] }}"
                                class="flex w-full py-1 px-3 hover:bg-slate-200">Amazon</a>
                        @endif
                        @if (@$book->links['link2'])
                            <a href="{{ $book->links['link2'] }}"
                                class="flex w-full py-1 px-3 hover:bg-slate-200">Audio book</a>
                        @endif
                        @if (@$book->links['link3'])
                            <a href="{{ $book->links['link3'] }}"
                                class="flex w-full py-1 px-3 hover:bg-slate-200">Youtube</a>
                        @endif
                        @if (@$book->links['link4'])
                            <a href="{{ $book->links['link4'] }}"
                                class="flex w-full py-1 px-3 hover:bg-slate-200">Facebook</a>
                        @endif
                        @if (@$book->links['link5'])
                            <a href="{{ $book->links['link5'] }}"
                                class="flex w-full py-1 px-3 hover:bg-slate-200">Instagram</a>
                        @endif
                        @if (@$book->links['link6'])
                            <a href="{{ $book->links['link6'] }}"
                                class="flex w-full py-1 px-3 hover:bg-slate-200">Google</a>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    {{-- <div class="swiper-pagination"></div> --}}
</div>

{{-- <div class="fixed top-0 left-0 right-0 bottom-0 z-[9990] bg-black/30 flex items-center justify-center"></div> --}}
