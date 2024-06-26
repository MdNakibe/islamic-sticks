@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0 py-14 md:py-24 lg:py-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-14 pb-5 gap-5 sm:gap-10 ">
                <div class="grid gap-10">
                    <h1 class="text-[16px] font-medium dark:text-white">All the Prophet stories given below are from the
                        Quran and Hadiths</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 justify-between gap-5 sm:gap-10">
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/adam1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/aramaya1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/ayyub1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/daniel1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/dawood1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/dhul_kifl1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/elyas1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/hizqeel_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/idris_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/ibrahim_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/isa1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/isaq_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/ismail1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/lut_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/Muhammad1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/Nuh_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/salih_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/shammil1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/shia1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/shuaib_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/sulaiman1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/uzair1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/yahya1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/yaqub_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/yunus1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/yusuf_as1-870x570.jpg') }}" alt="img">
                        </a>
                        <a href="#" class="drop-shadow">
                            <img src="{{ asset('frontend/images/stories-of-prophets/zakariyah1-870x570.jpg') }}" alt="img">
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-[250px] lg:w-[300px] pb-[50px]">
                <div class="py-5 md:pt-14 md:pb-5 relative ">
                    <h1 class="text-[25px] font-medium dark:text-white bg-white dark:bg-slate-700 pr-5 inline-block z-10">Recent Posts</h1>
                    <span class="w-full h-[1px] bg-slate-500 dark:bg-slate-200 block absolute  bottom-[45%] md:bottom-[30%] -z-10"></span>
                </div>
                <div class="grid gap-5">
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
                </div>
                <div class="py-5 md:pt-14 md:pb-5">
                    <h1 class="text-[25px] font-medium dark:text-white mb-3">Categories</h1>
                    <div class="grid gap-2">
                        <a href="#"
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
                        </a>
                    </div>
                </div>
                <div class="py-5 md:pt-14 md:pb-5">
                    <h1 class="text-[25px] font-medium dark:text-white mb-3">Popular Posts</h1>
                    <div class="grid gap-2">
                        <a href="#"
                            class="flex justify-between border hover:text-primary-500 font-medium gap-1 bg-white group">
                            <img src="{{ asset('frontend/images/dua-dhikir/depressed-150x150.jpg') }}" class="w-[80px]"
                                alt="img">
                            <div class="p-2 flex flex-col">
                                <span class="">I am feeling Depressed</span>
                                <span class="text-[14px] font-normal">March 11, 2023</span>
                            </div>
                        </a>
                        <a href="#"
                            class="flex justify-between border hover:text-primary-500 font-medium gap-1 bg-white group">
                            <img src="{{ asset('frontend/images/dua-dhikir/depressed-150x150.jpg') }}" class="w-[80px]"
                                alt="img">
                            <div class="p-2 flex flex-col">
                                <span class="">I am feeling Depressed</span>
                                <span class="text-[14px] font-normal">March 11, 2023</span>
                            </div>
                        </a>
                        <a href="#"
                            class="flex justify-between border  hover:text-primary-500 font-medium gap-1 bg-white group">
                            <img src="{{ asset('frontend/images/dua-dhikir/depressed-150x150.jpg') }}" class="w-[80px]"
                                alt="img">
                            <div class="p-2 flex flex-col">
                                <span class="">I am feeling Depressed</span>
                                <span class="text-[14px] font-normal">March 11, 2023</span>
                            </div>
                        </a>
                        <a href="#"
                            class="flex justify-between border hover:text-primary-500 font-medium gap-1 bg-white group">
                            <img src="{{ asset('frontend/images/dua-dhikir/depressed-150x150.jpg') }}" class="w-[80px]"
                                alt="img">
                            <div class="p-2 flex flex-col">
                                <span class="">I am feeling Depressed</span>
                                <span class="text-[14px] font-normal">March 11, 2023</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
