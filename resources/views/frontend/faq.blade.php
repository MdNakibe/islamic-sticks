@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0 py-14 md:py-24 lg:py-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-14 pb-5 gap-5 sm:gap-10 ">
                <div class="grid gap-10">
                    <div class="text-center dark:text-white">
                        <h1 class="text-[25px] font-bold">FAQ</h1>
                        <p class="">Answers to the most frequently asked questions.</p>
                    </div>
                    <div class="">
                        <ul class="flex flex-col">
                            @foreach ($faqs as $key => $item)  
                            <li class="bg-white my-2 shadow-lg" x-data="accordion({{ $key+1 }})">
                                <h2 @click="handleClick()"
                                    class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                    <span>{{ $item->question }}</span>
                                    <svg :class="handleRotate()"
                                        class="fill-current text-primary-500 h-6 w-6 transform transition-transform duration-500"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                        </path>
                                    </svg>
                                </h2>
                                <div x-ref="tab" :style="handleToggle()"
                                    class="border-l-2 border-primary-500 overflow-hidden max-h-0 duration-500 transition-all">
                                    <p class="p-3 text-gray-900">
                                        {!! $item->answer !!}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @include('components.right-sidebar')
            
        </div>
    </div>
@endsection




@push('js')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });

            Alpine.data('accordion', (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ?
                        `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })
    </script>
@endpush
