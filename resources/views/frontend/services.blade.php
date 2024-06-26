@extends('frontend.app')

@section('content')
    <div >
        <div class="bg-white dark:bg-slate-500/50 relative">
            <div class="relative">
                <span
                    class="absolute bg-gradient-to-r from-third-900 to-transparent z-10 w-full h-[450px] opacity-50"></span>
                <img src="{{ asset('frontend/images/services-page-bg.jpg') }}" alt="services-page-bg"
                    class="h-[450px] w-full object-cover">
                <div class="absolute top-1/2 left-1/2 md:left-0 -translate-y-1/2 -translate-x-1/2 ml-0 md:ml-52 z-20">
                    <h1 class="text-[40px] sm:text-[50px] text-white font-bold">Services</h1>
                    <div class="inline-flex items-center gap-2 bg-[#fff]/40 backdrop-blur py-2 px-4 rounded">
                        <a class="text-white" href="/">Home</a>
                        <span class="w-3 h-3 rounded-full bg-primary-400"></span>
                        <p class="text-third-200">Services</p>
                    </div>
                </div>
            </div>

            <div class="max-w-screen-xl mx-auto pt-14 grid gap-5 relative px-5 xl:px-0">
                <div class="absolute w-full h-full opacity-20 scale-100 hidden sm:block bg-cover bg-center"
                    style="background-image: url({{ asset('frontend/images/services-bg-gra2.png') }})"></div>
                {{-- <img src="{{ asset('frontend/images/services-bg-gra2.png') }}" alt="Bg services image"
                    class="absolute w-full h-full opacity-20 scale-100 hidden sm:block"> --}}
                <div class="z-10">
                    <div class="text-center pb-10 sm:pb-14">
                        <h2 class="text-primary-400 text-[18px] font-medium">OUR SERVICES</h2>
                        <h3 class="text-third-800 dark:text-white text-[30px] sm:text-[40px] font-bold">We Provide The
                            Best Services</h3>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 items-center gap-5 lg:gap-7">

                        <div
                            class="grid grid-cols-1 sm:grid-cols-4 gap-5 sm:gap-10 p-5 rounded-md shadow-md bg-white/50 dark:bg-slate-700/30 backdrop-blur-md">
                            <div
                                class="col-span-1 w-[70px] h-[70px] rounded-full border border-primary-400 shadow-md shadow-primary-400/20 relative bg-white">
                                <img src={{ asset('frontend/images/service-web-design-icon.png') }}
                                    alt="service-web-design-icon" class="w-full scale-50 z-10">
                            </div>
                            <div class="col-span-3 grid gap-3 text-third-800 dark:text-white">
                                <h1 class="text-[22px] sm:text-[28px] font-medium ">Web Design</h1>
                                <p class="text-justify font-medium">We provide professional web design services that are
                                    customized to meet your specific needs and objectives.</p>
                                <div>
                                    <a href="{{ route('serviceDetails', 'web') }}"
                                        class="py-1.5 rounded text-primary-400 hover:pl-2 duration-300 inline-flex items-center">
                                        <div class="flex items-center font-medium">
                                            <span>Read more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-narrow-right" width="30"
                                                height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M0 0h24v24H0z" stroke="none" />
                                                <path d="M5 12h14m-4 4 4-4m-4-4 4 4" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-1 sm:grid-cols-4 gap-5 sm:gap-10 p-5 rounded-md shadow-md bg-white/50 dark:bg-slate-700/30 backdrop-blur-md">
                            <div
                                class="col-span-1 w-[70px] h-[70px] rounded-full border border-primary-400 shadow-md shadow-primary-400/20 relative bg-white">
                                <img src={{ asset('frontend/images/service-web-development-icon.png') }}
                                    alt="service-web-development-icon" class="w-full scale-50 z-10">
                            </div>
                            <div class="col-span-3 grid gap-3 text-third-800 dark:text-white">
                                <h1 class="text-[22px] sm:text-[28px] font-medium ">Web Development</h1>
                                <p class="text-justify font-medium">We provide professional web design services that are customized to meet your specific needs and objectives.</p>
                                <div>
                                    <a href="{{ route('serviceDetails', 'web') }}"
                                        class="py-1.5 rounded text-primary-400 hover:pl-2 duration-300 inline-flex items-center">
                                        <div class="flex items-center font-medium">
                                            <span>Read more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-narrow-right" width="30"
                                                height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M0 0h24v24H0z" stroke="none" />
                                                <path d="M5 12h14m-4 4 4-4m-4-4 4 4" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-1 sm:grid-cols-4 gap-5 sm:gap-10 p-5 rounded-md shadow-md bg-white/50 dark:bg-slate-700/30 backdrop-blur-md">
                            <div
                                class="col-span-1 w-[70px] h-[70px] rounded-full border border-primary-400 shadow-md shadow-primary-400/20 relative bg-white">
                                <img src={{ asset('frontend/images/service-pos-icon.png') }} alt="service-pos-icon"
                                    class="w-full scale-50 z-10">
                            </div>
                            <div class="col-span-3 grid gap-3 text-third-800 dark:text-white">
                                <h1 class="text-[22px] sm:text-[28px] font-medium ">POS Softower</h1>
                                <p class="text-justify font-medium">We provide professional web design services that are
                                    customized to meet your specific needs and objectives.</p>
                                <div>
                                    <a href="https://zealtechpos.com/" target="_blank"
                                        class="py-1.5 rounded text-primary-400 hover:pl-2 duration-300 inline-flex items-center">
                                        <div class="flex items-center font-medium">
                                            <span>Read more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-narrow-right" width="30"
                                                height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M0 0h24v24H0z" stroke="none" />
                                                <path d="M5 12h14m-4 4 4-4m-4-4 4 4" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-1 sm:grid-cols-4 gap-5 sm:gap-10 p-5 rounded-md shadow-md bg-white/50 dark:bg-slate-700/30 backdrop-blur-md">
                            <div
                                class="col-span-1 w-[70px] h-[70px] rounded-full border border-primary-400 shadow-md shadow-primary-400/20 relative bg-white">
                                <img src={{ asset('frontend/images/service-graphic-design-icon.png') }}
                                    alt="service-graphic-design-icon" class="w-full scale-50 z-10">
                            </div>
                            <div class="col-span-3 grid gap-3 text-third-800 dark:text-white">
                                <h1 class="text-[22px] sm:text-[28px] font-medium ">Graphic Design</h1>
                                <p class="text-justify font-medium">We provide professional web design services that are
                                    customized to meet your specific needs and objectives.</p>
                                <div>
                                    <a href="{{ route('serviceDetails', 'graphic') }}"
                                        class="py-1.5 rounded text-primary-400 hover:pl-2 duration-300 inline-flex items-center">
                                        <div class="flex items-center font-medium">
                                            <span>Read more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-narrow-right" width="30"
                                                height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M0 0h24v24H0z" stroke="none" />
                                                <path d="M5 12h14m-4 4 4-4m-4-4 4 4" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-1 sm:grid-cols-4 gap-5 sm:gap-10 p-5 rounded-md shadow-md bg-white/50 dark:bg-slate-700/30 backdrop-blur-md">
                            <div
                                class="col-span-1 w-[70px] h-[70px] rounded-full border border-primary-400 shadow-md shadow-primary-400/20 relative bg-white">
                                <img src={{ asset('frontend/images/service-degital-markiting-icon.png') }}
                                    alt="service-degital-markiting-icon" class="w-full scale-50 z-10">
                            </div>
                            <div class="col-span-3 grid gap-3 text-third-800 dark:text-white">
                                <h1 class="text-[22px] sm:text-[28px] font-medium ">Digital Marketing</h1>
                                <p class="text-justify font-medium">We provide professional web design services that are
                                    customized to meet your specific needs and objectives.</p>
                                <div>
                                    <a href="{{ route('serviceDetails', 'digital-marketing') }}"
                                        class="py-1.5 rounded text-primary-400 hover:pl-2 duration-300 inline-flex items-center">
                                        <div class="flex items-center font-medium">
                                            <span>Read more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-narrow-right" width="30"
                                                height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M0 0h24v24H0z" stroke="none" />
                                                <path d="M5 12h14m-4 4 4-4m-4-4 4 4" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-1 sm:grid-cols-4 gap-5 sm:gap-10 p-5 rounded-md shadow-md bg-white/50 dark:bg-slate-700/30 backdrop-blur-md">
                            <div
                                class="col-span-1 w-[70px] h-[70px] rounded-full border border-primary-400 shadow-md shadow-primary-400/20 relative bg-white">
                                <img src={{ asset('frontend/images/web-icon/web-analytics.png') }} alt="web-analytics-icon"
                                    class="w-full scale-50 z-10">
                            </div>
                            <div class="col-span-3 grid gap-3 text-third-800 dark:text-white">
                                <h1 class="text-[22px] sm:text-[28px] font-medium ">Web Analytics</h1>
                                <p class="text-justify font-medium">We provide professional web design services that are
                                    customized to meet your specific needs and objectives.</p>
                                <div>
                                    <a href="{{ route('serviceDetails', 'web-analytics') }}"
                                        class="py-1.5 rounded text-primary-400 hover:pl-2 duration-300 inline-flex items-center">
                                        <div class="flex items-center font-medium">
                                            <span>Read more</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-narrow-right" width="30"
                                                height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M0 0h24v24H0z" stroke="none" />
                                                <path d="M5 12h14m-4 4 4-4m-4-4 4 4" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-14 grid lg:flex gap-10 items-center max-w-screen-xl mx-auto px-5 xl:px-0">
                <div class="grid gap-2 text-third-800 dark:text-white flex-1">
                    <h1 class="text-third-800 dark:text-white text-[30px] sm:text-[40px] font-bold leading-[45px]">Let
                        Us
                        Help You With Your Project</h1>
                    <br>
                    <p class="text-justify font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut
                        corporis
                        necessitatibus impedit recusandae repellendus! Nihil facilis dolorum debitis esse vero.</p>
                    <p class="text-justify font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut
                        corporis
                        necessitatibus impedit recusandae modi tenetur sunt sed ab, aut numquam! Lorem ipsum dolor
                        Distinctio id, velit quos perspiciatis debitis perferendis ad quam quae neque delectus, atque magni.
                        Dolores, repellendus! Nihil facilis dolorum debitis esse vero.</p>
                    <div >

                        <a href="#"
                            class="bg-primary-400 inline-block px-10 py-3 rounded hover:scale-95 duration-200 mt-5 font-medium text-white">Contact
                            Us</a>
                    </div>
                </div>
                <div class="flex-1 grid justify-center">
                    <img src="{{ asset('frontend/images/businessman-showing-changes-report_v2.webp') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
@endsection
