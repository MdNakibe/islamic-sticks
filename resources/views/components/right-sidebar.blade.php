<div class="w-full md:w-[250px] lg:w-[300px] pb-[50px]">
    @if (isset($post) && $post->id)
        @php
            $right_ad = getAdvertise($post->category_id, 'right');
        @endphp
        <div class="mt-5">
            @if ($right_ad)
            <a href="{{ $right_ad->link }}" class="shadow-md">
                <img src="{{ asset('placeholder.webp') }}" class="lazyload" data-src="{{ asset($right_ad->image) }}" alt="img">
            </a>
            @endif
        </div>
    @endif
    @if (isset($post) && $post->id)
    <div class="py-5 @if(!$right_ad) md:pt-14 @endif md:pb-5 relative ">
    @else
    <div class="py-5 md:pt-14 md:pb-5 relative ">
    @endif
        <h1 class="text-[25px] font-medium dark:text-white bg-white dark:bg-slate-700 pr-5 inline-block z-10">Recent Posts</h1>
        <span class="w-full h-[1px] bg-slate-500 dark:bg-slate-200 block absolute bottom-[45%] md:bottom-[30%] -z-10"></span>
    </div>
    <div class="grid gap-5">
        @php
            if (isset($post) && $post->id) {
                $recent_posts = getRecentPost(3, $post->id);
            } else {
                $recent_posts = getRecentPost(3);
            }
        @endphp
        
        @foreach ($recent_posts as $item)
            <a href="{{ route('post.details', $item->slug) }}" class="shadow-md">
                <img src="{{ asset('placeholder.webp') }}" class="lazyload" data-src="{{ asset($item->image) }}" alt="img">
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
            <style>
                @media only screen and (max-width: 480px) {
                    .post_img_height {
                        height: 80px;
                    }
                }
            </style>
            @foreach ($popularPosts as $item) 
            <a href="{{ route('post.details', $item->slug) }}"
                class="flex justify-between border hover:text-primary-500 font-medium gap-1 bg-white group">
                <img src="{{ asset('placeholder.webp') }}" data-src="{{ asset($item->image) }}" class="w-[80px] lazyload post_img_height"
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