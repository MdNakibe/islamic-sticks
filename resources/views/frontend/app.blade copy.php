<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The Heart Of Islam">
    <title>Muslim Soul</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}">
    <script>
        let theme = localStorage.getItem('zelatechStudioTheme')
        if (theme == 'dark') {
            document.querySelector('html').classList.add('dark')
        }
    </script>
    <script src="{{ asset('dist/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('frontend/alpine.min.js') }}" defer></script>

    <link href="/css/app.css" rel="stylesheet">
    @stack('css')

    <style>
        @font-face {
            font-family: 'default-font';
            url: url({{ asset('frontend/default.woff2') }}),
        }

        @font-face {
            font-family: 'Al Majeed Quranic';
            url: url({{ asset('frontend/font/Al Majeed Quranic Font_shiped.ttf') }}),
        }

        .mymention{ color: gray; }
        .igniter_box {
            display: block;
            padding: 20px;
            background: #F4E9B3;
        }
        .igniter_box_inline {
            display: inline-block;
            padding: 20px;
            background: #F4E9B3;
        }

        .inline_box_center {
            display: flex;
            justify-content: center;
        }
        
        .font-arabic {
            font-family: 'Al Majeed Quranic';
            /* Media query for macOS */
            @media screen and (-apple-system-font: inherit) {
                font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            }
        }
    </style>

    @stack('top_js')

</head>

<body class="bg-white dark:bg-slate-700 group/body" x-data="{ open: true, darkOpen: false, searchModal: false }">

    <div class="hidden lg:block">
        <div class=" flex flex-col items-center justify-center pt-5 pb-2 dark:bg-slate-800 dark:border-slate-600">
            <a href="{{ route('home') }}" class="px-5 text-[44px] text-primary-600 font-default-font">
                Muslim Soul
            </a>
            <span class="font-poppins tracking-[0.4em] text-[14px] uppercase text-black dark:text-white">
                The heart of Islam
            </span>
        </div>
    </div>







    {{-- mobile nav --}}
    <div
        class="flex justify-between items-center dark:bg-slate-800 dark:border-slate-600 lg:hidden px-5 lg:px-0 shadow sticky top-0 z-[99] bg-white w-full">
        <div class="flex flex-col items-center justify-center py-2 ">
            <a href="{{ route('home') }}" class=" text-[25px] md:text-[44px] text-primary-600 font-default-font">
                Muslim Soul
            </a>
            <span
                class="text-[10px] md:text-[14px] font-poppins tracking-[0.2em] md:tracking-[0.4em] uppercase text-black dark:text-white">
                The heart of Islam
            </span>
        </div>
        <div class="block lg:hidden">
            <div class="flex items-center gap-2">
                <div class="flex items-center gap-2">
                    <div
                        class="w-[30px] h-[30px] md:w-[40px] md:h-[40px] dark:bg-slate-400/20 hover:dark:bg-slate-200/20 bg-slate-400/20 dark:text-white hover:bg-slate-800/20 active:scale-95 rounded-full flex items-center justify-center dark_toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 dark_icon cursor-pointer hidden "
                            width="36" height="36" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 light_icon cursor-pointer" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </div>

                    <div class="navbar_search Click-here flex justify-between cursor-pointer dark:text-white ">
                        <svg class="nav_search_btn" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            viewBox="0 0 24 24" strokeWidth="1" stroke="currentColor" fill="none"
                            strokeLinecap="round" strokeLinejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </div>
                    {{-- <div
                        class="w-[40px] h-[40px] bg-slate-800/20 rounded-full flex items-center justify-center dark_toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 dark_icon cursor-pointer"
                    width="36" height="36" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 light_icon cursor-pointer"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>
                </div> --}}

                    <div class="flex items-center navToggle w-[30px] h-[30px] md:w-[40px] md:h-[40px] dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-9 h-9 block group-[.isNavShow]/body:hidden cursor-pointer text-primary-500"
                            width="40" height="40" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-9 h-9 hidden group-[.isNavShow]/body:block cursor-pointer width='40' text-primary-500"
                            height="40" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path d="M18 6 6 18M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <nav
        class="bg-white text-slate-900 shadow dark:bg-slate-900/60 backdrop-blur dark:text-slate-100 sticky top-0 z-[999]">
        <div class="flex justify-between items-center max-w-[1200px] mx-auto px-5 xl:px-0">
            <div class="hidden xl:block cursor-pointer py-5 md:py-0">
                <div class="font-extrabold text-3xl flex gap-4">
                    <a href="https://www.facebook.com/MuslimSoulCommunity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 dark:text-white hover:text-[#2374e1] hover:border-2 border-[#2374e1] p-1 rounded" width="33" height="33" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                         </svg>
                    </a>
                    <a href="https://www.instagram.com/muslimsoulcommunity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 dark:text-white hover:text-[#f60091] hover:border-2 border-[#f60091] p-1 rounded" width="33" height="33"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M16.5 7.5l0 .01"></path>
                         </svg>
                    </a>
                    <a href="https://twitter.com/lamaidlimited">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 dark:text-white hover:text-[#1da1f2] hover:border-2 border-[#1da1f2] p-1 rounded" width="33" height="33"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path>
                         </svg>
                    </a>
                    <a href="https://www.youtube.com/channel/UCOvbMf8sxwUseHua49_lzaw">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 dark:text-white hover:text-[#ff0101] hover:border-2 border-[#ff0101] p-1 rounded" width="33" height="33"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </a>
                    <a href="https://www.linkedin.com/in/lamaidlimited/">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 dark:text-white hover:text-[#0077b5] hover:border-2 border-[#0077b5] p-1 rounded" width="33" height="33"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                            <path d="M8 11l0 5"></path>
                            <path d="M8 8l0 .01"></path>
                            <path d="M12 16l0 -5"></path>
                            <path d="M16 16v-3a2 2 0 0 0 -4 0"></path>
                         </svg>
                    </a>
                    <a href="https://www.tiktok.com/@muslimsoulcommunity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 dark:text-white hover:text-[#000] hover:border-2 border-[#000] p-1 rounded" width="33" height="33"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z"></path>
                         </svg>
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="flex items-center">
                    <ul class="flex items-center gap-4">
                        <li class="group">
                            <a class="px-2 py-4 block text-[17px] font-[500] border-b-2 border-transparent hover:border-primary-500 hover:text-primary-600"
                                href="/">Home</a>
                        </li>
                        <li class="group">
                            <a class="px-2 py-4 block text-[17px] font-[500] border-b-2 border-transparent hover:border-primary-500 hover:text-primary-600"
                                href="/qaida">Qaida</a>
                        </li>
                        <li class="group">
                            <a class="px-2 py-4 block text-[17px] font-[500] border-b-2 border-transparent hover:border-primary-500 hover:text-primary-600"
                                href="/dua-dhikir">Dua & Dhikr</a>
                        </li>
                        <li class="group">
                            <a class="px-2 py-4 block text-[17px] font-[500] border-b-2 border-transparent hover:border-primary-500 hover:text-primary-600"
                                href="/prophets-stories">Prophets Stories</a>
                        </li>
                        <li class="group">
                            <a class="px-2 py-4 block text-[17px] font-[500] border-b-2 border-transparent hover:border-primary-500 hover:text-primary-600"
                                href="/prayer-time">Prayer Time</a>
                        </li>
                        <li class="group">
                            <a class="px-2 py-4 block text-[17px] font-[500] border-b-2 border-transparent hover:border-primary-500 hover:text-primary-600"
                                href="{{ url('surah/english/1') }}">Quran</a>
                        </li>
                        <li class="group">
                            <a class="px-2 py-4 block text-[17px] font-[500] border-b-2 border-transparent hover:border-primary-500 hover:text-primary-600"
                                href="/i-am-feeling">Emotion</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="hidden lg:block">
                <div class="flex items-center gap-2">
                    <div
                        class="w-[40px] h-[40px] dark:bg-slate-400/20 hover:dark:bg-slate-200/20 bg-slate-400/20  hover:bg-slate-800/20 active:scale-95 rounded-full flex items-center justify-center dark_toggle ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 dark_icon cursor-pointer hidden"
                            width="36" height="36" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 light_icon cursor-pointer"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </div>

                    <div class="navbar_search Click-here flex justify-between cursor-pointer">
                        <svg class="nav_search_btn" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            viewBox="0 0 24 24" strokeWidth="1" stroke="currentColor" fill="none"
                            strokeLinecap="round" strokeLinejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </div>

                </div>
            </div>
        </div>



    </nav>

    <div
        class="fixed select-none z-[1000] top-[69px] border-t md:top-[105px] hidden group-[.isNavShow]/body:block lg:hidden w-full bg-white dark:bg-slate-900">
        <div class="grid">
            <ul class="grid justify-center text-center py-5 items-center gap-2">
                <li><a class="p-2 block font-[500]" href="/">Home</a></li>
                <li><a class="p-2 block font-[500]" href="/qaida">Qaida</a></li>
                <li><a class="p-2 block font-[500]" href="/dua-dhikir">Dua & Dhikr</a></li>
                <li><a class="p-2 block font-[500]" href="/prophets-stories">Prophets Stories</a></li>
                <li><a class="p-2 block font-[500]" href="/prayer-time">Prayer Time</a></li>
                <li><a class="p-2 block font-[500]" href="/surah/english/1">Quran</a></li>
                <li><a class="p-2 block font-[500]" href="/i-am-feeling">Emotion</a></li>
            </ul>
        </div>
    </div>




    @include('components.search')


    @yield('content')




    <!-- ====== Footer Section Start -->
    <footer>
        <div class="pt-10 sm:pt-16 xl:pt-20 pb-7 text-[17px] sm:pb-10 xl:pb-14 bg-[#f4e9b3] text-[#000]">
            <div class="max-w-[1200px] mx-auto grid text-center gap-6 sm:gap-5 px-5 xl:px-0 dark:text-white">

                <!--Sign-up form section-->
                <div class="grid items-center">
                    <!--<h1 class="font-medium text-[22px]">Newsletter</h1>-->
                    <form action="{{ route('subscriber.store') }}" class="flex items-center justify-center mt-5"
                        method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Your Email Address"
                            class="p-2 outline-none w-[180px] sm:w-[300px]" required>
                        <button type="submit" class="bg-primary-500 py-2 px-2 sm:px-5 text-white font-medium">Join
                            Us</button>
                    </form>
                </div>


                <div class="">
                    FREE LIVE MAKTAB & Business Enquiries, mail us on -> <a
                        href="mailto:info@muslimsoul.org">info@muslimsoul.org</a>
                </div>
                <div class="flex flex-wrap gap-10 justify-center">
                    <a href="/" class="hover:text-primary-500 dark:hover:text-slate-800">Home</a>
                    <a href="/faq" class="hover:text-primary-500 dark:hover:text-slate-800">FAQ</a>
                    <a href="/about" class="hover:text-primary-500 dark:hover:text-slate-800">About us</a>
                    <a href="/privacy-policy" class="hover:text-primary-500 dark:hover:text-slate-800">Privacy
                        Policy</a>
                    <a href="/contact" class="hover:text-primary-500 dark:hover:text-slate-800">Contact us</a>
                </div>
                {{-- <div class="">
                    <select name="" id="" class="py-2 outline-none px-3 cursor-pointer">
                        <option value="">English</option>
                        <option value="">Bangla</option>
                        <option value="">Hindi</option>
                        <option value="">Ordu</option>
                    </select>
                </div> --}}


            </div>
            <div class="text-center mt-10">
                Copyright© 2023 all right reserved to <b class="text-primary-500">Muslim Soul</b>
            </div>
        </div>
    </footer>
    <!-- ====== Footer Section End -->

    <div class="trans_wrap">
        <button onclick="toogleTranslator()"
            class="clos_trans fixed right-2 top-5 z-[9990] w-[40px] h-[40px] bg-slate-50 text-red-500 rounded-full">
            &times;
        </button>
        <div
            class="bg-white rounded-md p-5 max-w-[400px] w-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            <div class="text-black z-[99990] text-center">
                <svg class="w-14 h-14 mx-auto" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418">
                    </path>
                </svg>
            </div>

            {{-- <div class="flex gap-5 !justify-center mt-5 select-none">
                <label class="flex gap-2 !text-black select-none">
                    <input class="lan_inp l1" type="radio" value="English" name="lang" checked />
                    English
                </label>
                <label class="flex gap-2 !text-black select-none">
                    <input class="lan_inp l2" type="radio" value="Bangla" name="lang" />
                    Bangla
                </label>
            </div> --}}
            <select id="language-select">
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
                <!-- Add other language options as needed -->
            </select>
        </div>
        <div id='translatorWrapper' class="w-[100px] opacity-0 pointer-events-none">
            <div id="google_translate_element"></div>
        </div>
    </div>
    <span onclick="toogleTranslator()"
        class="trans_btn z-[99990] text-center shadow cursor-pointer fixed top-1/2 right-2 bg-slate-700 text-white p-3 rounded-full flex items-center justify-center">
        <svg class="flex w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" width="200" height="200"
            viewBox="796 796 200 200" xml:space="preserve">
            <path
                d="M973.166 818.5H818.833c-12.591 0-22.833 10.243-22.833 22.833v109.333c0 12.59 10.243 22.833 22.833 22.833h154.333c12.59 0 22.834-10.243 22.834-22.833V841.333c0-12.59-10.244-22.833-22.834-22.833zM896 961.5h-77.167c-5.973 0-10.833-4.859-10.833-10.833V841.333c0-5.974 4.86-10.833 10.833-10.833H896v131zm82.58-89.371c-.547 9.145-5.668 27.261-20.869 39.845 4.615 1.022 9.629 1.573 14.92 1.573v12c-10.551 0-20.238-1.919-28.469-5.325-7.689 3.301-16.969 5.325-28.125 5.325v-12c5.132 0 9.924-.501 14.366-1.498-8.412-7.016-13.382-16.311-13.382-26.78h11.999c0 8.857 5.66 16.517 14.884 21.623 4.641-2.66 8.702-6.112 12.164-10.351 5.628-6.886 8.502-14.521 9.754-20.042h-49.785v-12h22.297v-11.986h12V864.5h21.055c1.986 0 3.902.831 5.258 2.28a7.213 7.213 0 0 1 1.933 5.349z" />
            <path
                d="m839.035 914.262-4.45 11.258h-15.971l26.355-61.09h15.971l25.746 61.09h-16.583l-4.363-11.258h-26.705zm13.44-34.386-8.902 22.604h17.629l-8.727-22.604z" />
        </svg>
    </span>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }

        function toogleTranslator() {
            // translatorWrapper.classList.toggle('-right-[0px]')
            document.querySelector('.trans_wrap').classList.toggle('active')
            initListener()

        }
        if (localStorage.getItem('lng')) {
            if (localStorage.getItem('lng') == 'en') {
                document.querySelector('.l1').checked = true
                document.querySelector('.l2').checked = false
            } else {
                document.querySelector('.l1').checked = false
                document.querySelector('.l2').checked = true
            }
        }
        document.querySelectorAll('.lan_inp').forEach(item => {
            item.addEventListener('change', function() {
                if (this.value == 'Bangla') {
                    console.log('Bangla');
                    localStorage.setItem('lng', 'bn')
                    document.querySelector('.goog-te-combo').value = 'bn';
                    document.querySelector('.goog-te-combo').dispatchEvent(new Event('change'));
                    // new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                } else {
                    localStorage.setItem('lng', 'en')
                    document.querySelector('.goog-te-combo').value = 'en';
                    document.querySelector('.goog-te-combo').dispatchEvent(new Event('change'));
                    // new google.translate.TranslateElement({pageLanguage: 'no'}, 'google_translate_element');
                }
            })
        })

        function initListener() {
            if (document.querySelector('#translatorWrapper select')) {
                document.querySelector('#translatorWrapper select').addEventListener('change', () => {
                    toogleTranslator()
                })
            }
        }
    </script>
    <style>
        .skiptranslate {
            display: none;
        }

        #google_translate_element .skiptranslate {
            display: block;
        }

        .trans_wrap {
            display: none;
        }

        .trans_wrap.active {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            z-index: 999;
            display: block;
        }

        #translatorWrapper {
            position: fixed;
            z-index: 999;
            top: 50%;
            left: 50%;
        }

        .trans_btn {
            display: block !important;
        }

        #goog-gt- {
            display: none !important;
        }

        html body {
            top: 0 !important;
        }
    </style>


    @stack('js')
    <script>
        $(".dark_toggle").click(() => {
            $("html").toggleClass("dark");
            $(".dark_toggle").toggleClass("active");
            console.log($("html").hasClass('dark'));
            if ($("html").hasClass('dark')) {
                localStorage.setItem('zelatechStudioTheme', 'dark')
            } else {
                localStorage.removeItem('zelatechStudioTheme')
            }
        });

        $('.navToggle').click(function() {
            $('body').toggleClass("isNavShow");
        })




        // search bar model popup
        $(".Click-here").on('click', function() {
            $(".custom-model-main").addClass('model-open');
            $('#search_input').focus();
        });
        $(".close-btn, .bg-overlay").click(function() {
            $(".custom-model-main").removeClass('model-open');
        });


        const lazyImages = document.querySelectorAll('.lazyload');
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const img = entry.target;
                const src = img.getAttribute('data-src');
                img.setAttribute('src', src);
                img.classList.remove('lazyload');
                observer.unobserve(img);
            });
        });

        lazyImages.forEach((img) => {
            observer.observe(img);
        });


        // function getBrowser() {
        //     let userAgent = navigator.userAgent;
        //     let browserName;
        //     if (userAgent.match(/chrome|chromium|crios/i)) {
        //         browserName = "Chrome";
        //     } else if (userAgent.match(/firefox|fxios/i)) {
        //         browserName = "Firefox";
        //     } else if (userAgent.match(/safari/i)) {
        //         browserName = "Safari";
        //     } else if (userAgent.match(/opr\//i)) {
        //         browserName = "Opera";
        //     } else if (userAgent.match(/edg/i)) {
        //         browserName = "Edge";
        //     } else {
        //         browserName = "No browser detection";
        //     }
        //     return browserName;
        // }
        // const getDevice = () => {
        //     let device = "Unknown";
        //     const ua = {
        //         "Generic Linux": /Linux/i,
        //         "Android": /Android/i,
        //         "BlackBerry": /BlackBerry/i,
        //         "Bluebird": /EF500/i,
        //         "Chrome OS": /CrOS/i,
        //         "Datalogic": /DL-AXIS/i,
        //         "Honeywell": /CT50/i,
        //         "iPad": /iPad/i,
        //         "iPhone": /iPhone/i,
        //         "iPod": /iPod/i,
        //         "macOS": /Macintosh/i,
        //         "Windows": /IEMobile|Windows/i,
        //         "Zebra": /TC70|TC55/i,
        //     }
        //     Object.keys(ua).map(v => navigator.userAgent.match(ua[v]) && (device = v));
        //     return device;
        // }

        // fetch('https://ipinfo.io/geo').then(res => res.json()).then(data => {
        //     $.ajax({
        //         type: 'POST',
        //         url: `{{ route('visitors.store') }}`,
        //         data: {
        //             _token: `{{ csrf_token() }}`,
        //             ...data,
        //             url: window.location.href,
        //             device: getDevice(),
        //             browser: getBrowser(),
        //         },
        //         success: function(output) {}
        //     })
        // })
    </script>


    {{-- <script>
        function toggleActive(){
    const button1 = document.getElementById('button1');
    const button2 = document.getElementById('button2');


    if (button1.style.display !== 'none') {
        button1.style.display = 'none';
        button2.style.display = 'block';
      } else {
        button1.style.display = 'block';
        button2.style.display = 'none';
      }
}
    </script> --}}

    @if (session('subscribed_msg'))
        {{ session('subscribed_msg') }}
        <link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
        <script src="{{ asset('frontend/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: `Thanks for joining with us`,
                showConfirmButton: true,
            })
        </script>
    @endif

</body>

</html>
