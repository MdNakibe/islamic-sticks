@extends('frontend.app')

@section('content')
    <!-- contact us -->
    <section class="relative z-10 overflow-hidden bg-white dark:bg-slate-700 py-32 lg:py-[50px] px-5 sm:px-0">
        <div class="max-w-[1200px] mx-auto">
            <div class="">
                <div class="w-full sm:px-4 lg:w-2/2 xl:w-12/12 dark:text-white">
                    <div class="mb-12 lg:mb-0">
                        <span class="text-primary mb-4 block text-base font-semibold">
                            Donate
                        </span>
                        <h2
                            class="text-dark mb-6 text-[20px] font-bold uppercase sm:text-[27px] lg:text-[36px] xl:text-[40px]">
                            YOU CAN MAKE A DONATION BY ONE OF THE FOLLOWING METHODS:</h2>
                        {{-- <p class=" dark:bg-slate-700 mb-9 text-base leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim adiqua
                            minim veniam quis nostrud exercitation ullamco
                        </p> --}}
                        <div class="mb-8 flex w-full">
                            <div
                                class="bg-primary-500 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]">
                                <img src="{{ asset('frontend/images/donate.png') }}" width="30" alt="">
                            </div>
                            <div class="w-full">
                                <h4 class="text-dark mb-1 text-xl font-bold">Donate directly to our UK bank account</h4>
                                <p class=" dark:bg-slate-700 text-base">
                                    Account Holder: <b>The Aid</b> <br>
                                    Account Number: <b>65257168</b> <br>
                                    Sort Code: <b>30-99-50</b> <br>
                                    Bank Name: <b>Lloyds Bank</b> <br>
                                    IBAN: <b>GB87LOYD 309950 65257168</b> <br>
                                    Swift Code: <b>LOYDGB21287</b> <br>
                                    </p>
                            </div>
                        </div>
                        <div class="mb-8 flex w-full">
                            <div
                                class="bg-primary-500 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]">
                                <img src="{{ asset('frontend/images/donate.png') }}" width="30" alt="">
                            </div>
                            <style>
                                .custom-button {
                                  background-color: #fe1500; /* bg-blue-500 */
                                  color: #fff; /* text-white */
                                  font-weight: bold; /* font-bold */
                                  padding: 0.5rem 1rem; /* py-2 px-4 */
                                  border: 1px solid #5b0606; /* border border-blue-700 */
                                  border-radius: 1.25rem; /* rounded */
                                  transition: background-color 0.3s ease; /* hover:bg-blue-700 */
                                }
                              
                                .custom-button:hover {
                                  background-color: #951d1d; /* hover:bg-blue-700 */
                                  border-color: #400707; /* hover:border-blue-700 */
                                }
                              </style>
                              
                            <div class="w-full">
                                <h4 class="text-dark mb-1 text-xl font-bold">PayPal:</h4>
                                <p class=" dark:bg-slate-700 text-base"> 
                                    <a href="https://paypal.me/MuslimSoul" target="_blank" style="color: #ff0000;">https://paypal.me/MuslimSoul</a> <br>
                                    <strong style="">or Click the below button
                                        PayPal </strong>
                                </p> <br>
                                <a href="https://paypal.me/MuslimSoul" target="_blank" class="custom-button">Donate</a>
                            </div>
                        </div>
                        <div class="mb-8 flex w-full">
                            <div
                                class="bg-primary-500 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]">
                                <svg width="28" height="19" viewBox="0 0 28 19" class="fill-current">
                                    <path
                                        d="M25.3636 0H2.63636C1.18182 0 0 1.16785 0 2.6052V16.3948C0 17.8322 1.18182 19 2.63636 19H25.3636C26.8182 19 28 17.8322 28 16.3948V2.6052C28 1.16785 26.8182 0 25.3636 0ZM25.3636 1.5721C25.5909 1.5721 25.7727 1.61702 25.9545 1.75177L14.6364 8.53428C14.2273 8.75886 13.7727 8.75886 13.3636 8.53428L2.04545 1.75177C2.22727 1.66194 2.40909 1.5721 2.63636 1.5721H25.3636ZM25.3636 17.383H2.63636C2.09091 17.383 1.59091 16.9338 1.59091 16.3499V3.32388L12.5 9.8818C12.9545 10.1513 13.4545 10.2861 13.9545 10.2861C14.4545 10.2861 14.9545 10.1513 15.4091 9.8818L26.3182 3.32388V16.3499C26.4091 16.9338 25.9091 17.383 25.3636 17.383Z" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-dark mb-1 text-xl font-bold">Email Address</h4>
                                <p class="text-base">info@muslimsoul.org</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="w-full sm:px-4 lg:w-1/2 xl:w-5/12">
                    <div class="relative rounded-lg bg-white dark:bg-slate-800 p-2 shadow-lg sm:p-12">
                        @if (session('success'))
                            <div class="bg-green-100 border border-green-600 py-2 px-5 mb-4 rounded-md text-green-800">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact-requests.store') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <input type="text" name="name" placeholder="Your Name"
                                    class=" dark:bg-slate-700 border-[f0f0f0] dark:text-white focus:border-primary-500 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
                                    required />
                                @error('name')
                                    <span class="text-primary-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <input type="email" name="email" placeholder="Your Email"
                                    class=" dark:bg-slate-700 border-[f0f0f0] dark:text-white focus:border-primary-500 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
                                    required />
                                @error('email')
                                    <span class="text-primary-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <input type="text" name="phone" placeholder="Your Phone"
                                    class=" dark:bg-slate-700 border-[f0f0f0] dark:text-white focus:border-primary-500 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
                                    required />
                                @error('phone')
                                    <span class="text-primary-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <textarea rows="6" name="message" placeholder="Your Message"
                                    class=" dark:bg-slate-700 border-[f0f0f0] dark:text-white focus:border-primary-500 w-full resize-none rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
                                    required></textarea>
                                @error('message')
                                    <span class="text-primary-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit"
                                    class="bg-primary-500 border-primary-500 w-full rounded border p-3 text-white transition hover:bg-opacity-90">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ====== Contact Section End -->





    <!--<div class="">-->
    <!--    <iframe-->
    <!--        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.953096120239!2d0.03881961597251333!3d51.53242011669415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a733770b126f%3A0x900ffc9c1563eee4!2sLam%20Aid!5e0!3m2!1sen!2sbd!4v1665429998951!5m2!1sen!2sbd"-->
    <!--        allowfullscreen="" loading="lazy"-->
    <!--        referrerpolicy="no-referrer-when-downgrade" class="w-full h-[400px]"></iframe>-->

    </div>
    </div>
@endsection
