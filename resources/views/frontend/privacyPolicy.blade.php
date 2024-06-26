@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0 py-14 md:py-24 lg:py-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-14 pb-5 gap-5 sm:gap-10 ">
                <div class="grid gap-10">
                    <div class="grid gap-5">
                        <p class="text-[17px] text-justify ">At our platform, ensuring our visitor's privacy remains a top
                            concern. This Privacy Policy describes the data we collect and record on our site and how we
                            employ it.
                        </p>
                        <p class="text-[17px] text-justify ">Feel free to contact us if you have any queries or need more
                            details about our Privacy Policy.
                        </p>
                        <p class="font-bold">Log Files</p>
                        <p class="text-[17px] text-justify ">Like most websites, our platform uses log files as a standard
                            practice. These files record visitors as they access websites - an integral part of the
                            analytics provided by hosting services. The data recorded by log files include IP (Internet
                            Protocol) addresses, the type of browser used, ISP (Internet Service Provider), timestamps,
                            referring and exit pages, and potential click counts. However, these details are not linked to
                            any personal identifiable information. The collected data helps analyze trends, manage the site,
                            track user activity, and collect demographic data.</p>
                    </div>
                    <div class="grid gap-5">
                        <h1 class="text-[25px] font-bold">Cookies and Web Beacons</h1>
                        <p class="text-[17px] text-justify ">Our platform, like others, uses 'cookies.' These cookies gather
                            information, including visitor preferences and the pages they visited on the site. This
                            information helps us to enhance the user experience by tailoring our webpage content based on
                            the visitor's browser type and other data.
                        </p>
                    </div>
                    <div class="grid gap-5">
                        <h1 class="text-[25px] font-bold">Our Advertising Partners</h1>
                        <p class="text-[17px] text-justify ">We do not engage any advertising partners on our platform.</p>
                        <p class="font-bold">Privacy Policies</p>
                        <p class="text-[17px] text-justify ">You can consult this section to discover the Privacy Policy for
                            each advertising partner on our platform. </p>
                        <p class="text-[17px] text-justify ">Third-party advertising servers or networks employ technologies
                            like cookies, JavaScript, or Web Beacons in their advertisements and links on our platform,
                            which are directly sent to the user's browser. They will receive your IP address automatically
                            when this happens. These techniques gauge their advertising campaign's effectiveness and/or
                            personalize the ad content you view on the sites you visit.
                        </p>
                        <p class="text-[17px] text-justify ">Please note that we do not have access to or control over
                            cookies used by third-party advertisers.</p>
                        <p class="font-bold">Third Part Privacy Policies</p>
                        <p class="text-[17px] text-justify ">The Privacy Policy of our platform does not govern other
                            advertisers or websites. Therefore, we suggest that you consult the respective Privacy Policies
                            of these third-party ad servers for more comprehensive information. This may include their
                            practices and instructions about opting out of certain options. You can find a complete list of
                            these Privacy Policies and their links here: Privacy Policy Links.</p>
                        <p class="text-[17px] text-justify ">You have the option to disable cookies through your browser's
                            settings. For more comprehensive information about managing cookies with specific web browsers,
                            you can find it on the respective browser's website. What Are Cookies?</p>
                        <p class="font-bold">Children’s Information</p>
                        <p class="text-[17px] text-justify ">Another significant part of our priority is ensuring children's
                            protection during their internet use. We urge parents and guardians to monitor, participate in,
                            and guide their online activity.
                        </p>
                        <p class="text-[17px] text-justify ">Our platform does not intentionally gather Personal
                            Identifiable Information from children under 13. Suppose you suspect that your child has
                            provided such information on our site. In that case, we strongly recommend you contact us
                            immediately, and we will promptly expedite the removal of such information from our records.</p>
                        <p class="font-bold">Online Privacy Policy Only</p>
                        <p class="text-[17px] text-justify ">This privacy policy applies exclusively to our online
                            activities. It is valid for visitors to our platform concerning the information they share or
                            collects on our site. This policy does not cover any data collected offline or through channels
                            other than this website. </p>
                        <p class="font-bold">Consent</p>
                        <p class="text-[17px] text-justify ">By accessing our platform, you consent to our Privacy Policy
                            and accept its Terms and Conditions.</p>
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
                    {{-- <a href="#" class="shadow-md">
                        <img src="{{ asset('frontend/images/dua-dhikir/duha11-1024x575.jpg') }}" alt="img">
                        <div class=" bg-white text-center p-2">
                            <p class="text-[14px]">How to Pray</p>
                            <p class="text-[17px] font-bold line-clamp-2 hover:text-primary-500">How To Pray Salat Al-Duha?
                                Importance, Benefits, Timing.</p>
                            <p class="text-[14px]">April 12, 2023</p>
                        </div>
                    </a>
                    <a href="#" class="shadow-md">
                        <img src="{{ asset('frontend/images/dua-dhikir/duha11-1024x575.jpg') }}" alt="img">
                        <div class=" bg-white text-center p-2">
                            <p class="text-[14px]">How to Pray</p>
                            <p class="text-[17px] font-bold line-clamp-2 hover:text-primary-500">How To Pray Salat Al-Duha?
                                Importance, Benefits, Timing.</p>
                            <p class="text-[14px]">April 12, 2023</p>
                        </div>
                    </a>
                    <a href="#" class="shadow-md">
                        <img src="{{ asset('frontend/images/dua-dhikir/duha11-1024x575.jpg') }}" alt="img">
                        <div class=" bg-white text-center p-2">
                            <p class="text-[14px]">How to Pray</p>
                            <p class="text-[17px] font-bold line-clamp-2 hover:text-primary-500">How To Pray Salat Al-Duha?
                                Importance, Benefits, Timing.</p>
                            <p class="text-[14px]">April 12, 2023</p>
                        </div>
                    </a> --}}

                    @php
                        if (isset($post) && $post->id) {
                            $recent_posts = getRecentNews(3, $post->id);
                        } else {
                            $recent_posts = getRecentNews(3);
                        }
                    @endphp
                    @foreach ($recent_posts as $item)
                        <a href="{{ route('post.details', $item->slug) }}" class="shadow-md">
                            <img src="{{ asset('placeholder.webp') }}" class="lazyload" data-src="{{ asset($item->image) }}" alt="img">
                            <div class=" bg-white text-center p-2">
                                <p class="text-[14px]">{{ $item->title }}</p>
                                <p class="text-[17px] font-bold line-clamp-2 hover:text-primary-500">
                                    {{ stringLimit($item->description, 80) }}
                                </p>
                                <p class="text-[14px]">{{ date('D m, Y', strtotime($item->created_at)) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="py-5 md:pt-14 md:pb-5">
                    <h1 class="text-[25px] font-medium dark:text-white mb-3">Categories</h1>
                    <div class="grid gap-2">
                        {{-- <a href="#"
                            class="flex justify-between border hover:text-primary-500 font-medium bg-white group">
                            <span class="p-3">99 Names of Allah</span>
                            <span class="p-3 bg-primary-500 text-white w-[100px]  group-hover:w-[120px] transition-all">99
                                Posts</span>
                        </a>
                        <a href="#"
                            class="flex justify-between border hover:text-primary-500 font-medium bg-white group">
                            <span class="p-3">Donate us</span>
                            <span class="p-3 bg-primary-500 text-white w-[100px]  group-hover:w-[120px] transition-all">9
                                Post</span>
                        </a>
                        <a href="#"
                            class="flex justify-between border  hover:text-primary-500 font-medium bg-white group">
                            <span class="p-3">Dua & Dhikr</span>
                            <span class="p-3 bg-primary-500 text-white w-[100px]  group-hover:w-[120px] transition-all">5
                                Posts</span>
                        </a>
                        <a href="#"
                            class="flex justify-between border hover:text-primary-500 font-medium bg-white group">
                            <span class="p-3">How to Pray</span>
                            <span class="p-3 bg-primary-500 text-white w-[100px]  group-hover:w-[120px] transition-all">9
                                Post</span>
                        </a> --}}
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
        </div>
    </div>
@endsection
