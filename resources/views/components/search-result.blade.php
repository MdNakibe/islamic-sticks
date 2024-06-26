@foreach ($results as $item)    
<a href="{{ route('post.details', $item->slug) }}" class="flex gap-5 items-center py-4 border-b hover:bg-slate-50 cursor-pointer text-slate-700 px-[20px]">
    <div class="w-[70px] h-[70px] overflow-hidden rounded-xl">
        <img class="w-full h-full object-cover object-center" width="70" src="{{ asset($item->image) }}" alt="">
    </div>
    <div class="flex-1">
        <p class="text-[14px] sm:text-[14px] text-black">
            {{ $item->title }}
        </p>
        <p class="text-slate-500">
            {{ stringLimit($item->details, 50) }}
        </p>
    </div>
    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-[25px] h-[25px] sm:w-[30px] sm:h-[30px]" viewBox="0 0 24 24"
        stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M18 6l-12 12"></path>
        <path d="M6 6l12 12"></path>
    </svg> --}}
</a>
@endforeach
