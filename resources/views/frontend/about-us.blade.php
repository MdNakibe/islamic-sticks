@extends('frontend.app')

@section('content')
    <div class="bg-white dark:bg-slate-500/50">
        <div class="banner_wrap relative">
            <div class="relative max-w-5xl mx-auto pt-14 md:pt-20 pb-14 px-4 z-20">
                <h1 class="text-third-800 font-extrabold text-3xl sm:text-4xl lg:text-5xl text-center dark:text-white">
                    INNOVATIVE SOFTWARE SOLUTIONS. CUSTOMER-FOCUSED. </h1>
                <p
                    class="mt-6 text-lg text-center max-w-3xl mx-auto dark:text-white text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] xl:max-w-2xl">
                    ZealTechBD is an
                    independent branding and experience digital marketing agency based on worldwide. The team at ZealtechBD
                    provides fresh and creative designs. We are experienced graphic designers and make it our goal to bring
                    you success. Your passions and goals become our own. Call us to see how we can help! </p>
                <div class="flex justify-center py-5 gap-5">
                    <a href="{{ route('contact')}}"
                        class="bg-primary-600 text-white dark:font-black  text-center py-3 px-10 font-bold text-[18px] rounded hover:drop-shadow-2xl ">Contact
                        Us</a>
                </div>
            </div>
        </div>
    </div>

    <x-our_services.our-services></x-our_services.our-services>

    <div class="bg-white dark:bg-slate-500/50">
        <x-technologies.technologies></x-technologies.technologies>
    </div>

    <section class=" dark:bg-slate-700/50 body-font">
        <div class="max-w-screen-xl px-5 py-7 md:py-10 lg:py-14 mx-auto">
            <div class="grid justify-center text-center w-full mb-10 md:mb-14 lg:mb-20">
                <h1
                    class="text-35px font-[700] w-full uppercase text-[22px] md:text-[25px] xl:text-[35px] text-third-800 dark:text-white">
                    Our Team</h1>
                <p class=" text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] md:max-w-2xl dark:text-white">
                    Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke
                    farm-to-table. Franzen you probably haven't heard of them.</p>
            </div>
            <div class="flex flex-wrap -m-2">
                @foreach ($teams as $team)
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center shadow p-4 rounded-lg bg-white dark:bg-slate-500/50 ">
                            <img alt="team"
                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                src={{ asset($team->image) }}>
                            <div class="flex-grow">
                                <h2 class="text-third-800 dark:text-white title-font font-medium">{{ $team->name }}</h2>
                                <p class="text-third-700 dark:text-white">{{ $team->designation }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <div class="bg-white dark:bg-slate-500/50">

        <div class="max-w-screen-xl mx-auto grid gap-10 xl:gap-20 py-8 xl:py-14 px-5 xl:px-0 justify-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center justify-center gap-10">
                <img src={{ asset('frontend/images/our-mision.png') }} alt="our-mision">
                <div class="grid gap-2 text-third-800 dark:text-white text-justify justify-center">
                    <h1 class="text-35px font-[700] w-full uppercase text-[22px] md:text-[25px] xl:text-[35px] ">Our Mission
                    </h1>
                    <p
                        class=" text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] md:max-w-2xl dark:text-white">
                        SpaGreen Creative is the company to ensure a strong future through software development, with a
                        focus
                        on communication and networking.
                    </p>
                    <p
                        class=" text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] md:max-w-2xl dark:text-white">
                        We give priority to cutting-edge information skills/experiences as well as excellent human
                        resources. We promote business with a strong spirit of always fulfilling customers’ requests. Our
                        company also creates what customers require to realize their glamorous dreams. As a result, we
                        contribute to the creation of a prosperous society. These are our driving forces.
                    </p>
                    <p
                        class=" text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] md:max-w-2xl dark:text-white">
                        We have a team who have vast expertise to build custom software. Therefore, we help organizations to
                        scale and achieve a competitive advantage by providing powerful and adaptable web and mobile
                        solutions that meet the ultimate need of the clients worldwide.
                    </p>
                </div>
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto grid gap-10 xl:gap-20 py-8 xl:py-14 px-5 xl:px-0 justify-center">
            <div class="flex flex-col-reverse  sm:grid sm:grid-cols-1 lg:grid-cols-2 items-center justify-center gap-10">
                <div class="grid gap-2 text-third-800 dark:text-white text-justify justify-center">
                    <h1 class="text-35px font-[700] w-full uppercase text-[22px] md:text-[25px] xl:text-[35px] ">Our
                        Vision</h1>
                    <p
                        class=" text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] md:max-w-2xl dark:text-white">
                        SpaGreen Creative is the company to ensure a strong future through software development, with a
                        focus
                        on communication and networking.
                    </p>
                    <p
                        class=" text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] md:max-w-2xl dark:text-white">
                        We give priority to cutting-edge information skills/experiences as well as excellent human
                        resources. We promote business with a strong spirit of always fulfilling customers’ requests.
                        Our
                        company also creates what customers require to realize their glamorous dreams. As a result, we
                        contribute to the creation of a prosperous society. These are our driving forces.
                    </p>
                    <p
                        class=" text-[16px] md:text-[18px] font-[500] text-third-700 w-[100%] md:max-w-2xl dark:text-white">
                        We have a team who have vast expertise to build custom software. Therefore, we help
                        organizations to
                        scale and achieve a competitive advantage by providing powerful and adaptable web and mobile
                        solutions that meet the ultimate need of the clients worldwide.
                    </p>
                </div>
                <img src={{ asset('frontend/images/our-vision.png') }} alt="our-vision">
            </div>
        </div>

    </div>
@endsection
