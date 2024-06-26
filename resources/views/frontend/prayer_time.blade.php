@extends('frontend.app')

@section('content')
    <div style="background-image: url({{ asset('frontend/banners/prayer-time-cover.webp') }});"
        class="w-full min-h-[75vh] bg-slate-800/30 bg-cover bg-center flex items-center justify-center relative py-24 lg:py-0">
        <div class="text-white text-center flex flex-col justify-center gap-5 md:gap-16">
            <h1 class="text-white mt-14 font-extrabold text-3xl sm:text-4xl lg:text-5xl tracking-tight text-center">
                Prayer Time
            </h1>
            <div class="flex justify-center">
                <iframe class="rounded-md w-full h-[358px]" scrolling="no" src="https://www.islamicfinder.org/prayer-widget/"> </iframe>
            </div>
            {{-- <div
                class="py-5 px-10 bg-white/80 backdrop-blur text-slate-900 mt-5 rounded-md md:flex items-center justify-between text-3xl gap-5">
                <div class="flex md:grid justify-between gap-2 md:gap-0 ">
                    <span class="text-[18px]">Fajar Time</span>
                    <div id="fajrTime"></div>
                </div>
                <div class="h-[60px] w-px hidden md:block bg-slate-500"></div>
                <div class="h-px w-full md:hidden block bg-slate-500"></div>
                <div class="flex md:grid justify-between gap-2 md:gap-0 ">
                    <span class="text-[18px]">Dhuhr Time</span>
                    <div id="dhuhrTime"></div>
                </div>
                <div class="h-[60px] w-px hidden md:block bg-slate-500"></div>
                <div class="h-px w-full md:hidden block bg-slate-500"></div>
                <div class="flex md:grid justify-between gap-2 md:gap-0 ">
                    <span class="text-[18px]">Asr Time</span>
                    <div id="asrTime"></div>
                </div>
                <div class="h-[60px] w-px hidden md:block bg-slate-500"></div>
                <div class="h-px w-full md:hidden block bg-slate-500"></div>
                <div class="flex md:grid justify-between gap-2 md:gap-0 ">
                    <span class="text-[18px]">Maghrib Time</span>
                    <div id="maghribTime"></div>
                </div>
                <div class="h-[60px] w-px hidden md:block bg-slate-500"></div>
                <div class="h-px w-full md:hidden block bg-slate-500"></div>
                <div class="flex md:grid justify-between gap-2 md:gap-0 ">
                    <span class="text-[18px]">Isha Time</span>
                    <div id="ishaTime"></div>
                </div>
            </div> --}}
        </div>
    </div>


    @push('js')
        <script src="{{ asset('frontend/aladhanapi.jquery.js') }}"></script>
        <script src="{{ asset('frontend/PrayTimes.js') }}"></script>
        <script>
            let date = new Date();
            // navigator.geolocation.getCurrentPosition(function(position) {
            //     var latitude = position.coords.latitude;
            //     var longitude = position.coords.longitude;
            //     letlong(latitude, longitude)

                // Call API to get prayer times
                // var apiURL = "http://api.aladhan.com/v1/timings/" + `${d.getDate()}-${d.getMonth()}-${d.getFullYear()}` + "?latitude=" + latitude + "&longitude=" + longitude + "&method=2";
                // fetch(apiURL)
                //   .then(response => response.json())
                //   .then(data => {
                //     // Extract prayer times from API response
                //     var prayerTimes = data.data.timings;
                //     var fajrTime = prayerTimes.Fajr;
                //     var dhuhrTime = prayerTimes.Dhuhr;
                //     var asrTime = prayerTimes.Asr;
                //     var maghribTime = prayerTimes.Maghrib;
                //     var ishaTime = prayerTimes.Isha;
                //   //   console.log(prayerTimes);

                //     // Display prayer times on page
                //     document.getElementById("fajrTime").innerHTML = fajrTime;
                //     document.getElementById("dhuhrTime").innerHTML = dhuhrTime;
                //     document.getElementById("asrTime").innerHTML = asrTime;
                //     document.getElementById("maghribTime").innerHTML = maghribTime;
                //     document.getElementById("ishaTime").innerHTML = ishaTime;
                //   })
                //   .catch(error => console.error(error));
            // });

            letlong()
            async function letlong(lat=0, lang=0) {
                let ipinfo = await fetch('https://ipinfo.io/json').then(res=>res.json()); 
                // fetch(`https://api.aladhan.com/v1/timingsByAddress/18-04-2023?address=${data.city}&method=8&tune=2,3,4,5,2,3,4,5,-3`)
                fetch(`https://api.aladhan.com/v1/calendarByAddress/2023/7?address=${ipinfo.city}&method=2&month=07&year=2023&latitudeAdjustmentMethod=3&tune=0%2C0%2C0%2C0%2C0%2C0%2C0%2C0%2C0&school=1&annual=false&adjustment=1&_=1690085393454`)
                    .then(res => res.json())
                    .then(result => {
                        let data = result.data[date.getDate()-1];
                        console.log(data);
                        const {
                            Fajr,
                            Dhuhr,
                            Asr,
                            Maghrib,
                            Isha
                        } = data.timings;

                        document.getElementById("fajrTime").innerHTML = Fajr;
                        document.getElementById("dhuhrTime").innerHTML = Dhuhr;
                        document.getElementById("asrTime").innerHTML = Asr;
                        document.getElementById("maghribTime").innerHTML = Maghrib;
                        document.getElementById("ishaTime").innerHTML = Isha;
                    })


                    // fetch(`https://api.aladhan.com/v1/calendar/2023/4?latitude=${lat}&longitude=${lang}&method=2`)
                    //   .then(res => res.json())
                    //   .then(data => {
                    //     console.log(data);
                    //   })
            }

        </script>
    @endpush
@endsection
