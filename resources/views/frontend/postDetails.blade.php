@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0 relative">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-50 mt-10 md:mt-0 md:pt-14 pb-10 relative">
                <div class="">
                    <h1 class="text-[30px] font-bold text-center dark:text-white">{{ $post->title }}</h1>
                </div>
                <span class="w-full h-[1px] bg-slate-400 dark:bg-slate-200 inline-block my-8"></span>
                <div class="">
                    <div class="py-10">
                        {!! $post->details !!}
                    </div>
                    <div class="flex justify-between bg-primary-200 p-5 sm:p-8">
                        @php
                            $nextPrev = getNextPreviousPost($post->id);
                        @endphp
                        @if ($nextPrev['valid'])
                        <div class="grid gap-2">
                            <a href="{{ route('post.details', $nextPrev['previousPost']->slug) }}"
                                class="mb-2 font-medium hover:text-primary-600 text-[18px] uppercase">{{ $nextPrev['previousPost']->title }}</a>
                            <a href="{{ route('post.details', $nextPrev['previousPost']->slug) }}" class="flex items-center hover:text-primary-600 text-[15px]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-narrow-left" width="26" height="26"
                                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M5 12l4 4"></path>
                                    <path d="M5 12l4 -4"></path>
                                </svg>
                                <p class="">Previous</p>
                            </a>
                        </div>
                        <div class="grid gap-2">
                            <a href="{{ route('post.details', $nextPrev['nextPost']->slug) }}"
                                class="mb-2 font-medium hover:text-primary-600 text-[18px] uppercase">{{ $nextPrev['nextPost']->title }}</a>
                            <a href="{{ route('post.details', $nextPrev['nextPost']->slug) }}"
                                class="flex items-center justify-end float-right hover:text-primary-600 text-[15px]">
                                <p class="">Next</p>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-narrow-right" width="26" height="26"
                                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M15 16l4 -4"></path>
                                    <path d="M15 8l4 4"></path>
                                </svg>
                            </a>
                        </div>
                        @endif
                    </div>
                    @if (count($relatedPost))
                    <div class="py-10">
                        <h1 class="text-[25px] pb-5 dark:text-white">Related Posts</h1>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-5">
                            @foreach ($relatedPost as $item)
                                <div class="grid gap-2">
                                    <a href="{{ route('post.details', $item->slug) }}" class="bg-primary-200 text-center text-[20px] py-10 font-bold">
                                        {{ $item->title }}
                                    </a>
                                    <div>
                                        <a href="{{ route('post.details', $item->slug) }}" class="font-medium text-[18px] hover:text-primary-600  dark:text-white">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                    <div class=" dark:text-white">
                                        <span>
                                            {{ date('M d Y', strtotime($item->created_at)) }}
                                        /</span>
                                        <a href="{{ route('post.details', $item->slug) }}" class="hover:text-primary-600">{{ $item->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="">
                        @php
                            $query = getCommentQuery();
                            $query->where('post_id', $post->id);
                            $query->where('status', 1);
                            $count = $query->count();
                            $query->whereNull('parent_id')->with(['child']);
                            $comments = $query->get();
                        @endphp
                        <div class="border p-5 sm:p-10">
                            <h1 class="text-[20px] mb-10 font-medium dark:text-white ">{{ $count }} Comments</h1>
                            <div class="grid gap-5">
                                @foreach ($comments as $item)
                                    <div class="grid gap-5">
                                        <div class="">
                                            <div class="flex gap-5 p-5">
                                                <div>
                                                    <img src="{{ asset('frontend/images/8c9d878c466754f1bcc7f350c4ce6e78.png') }}"
                                                        alt="img" class="rounded-full">
                                                </div>
                                                <div class="grid gap-5">
                                                    <div>
                                                        <p class="uppercase text-[17px] font-bold">{{ $item->name }}</p>
                                                        <p class="text-[14px]">
                                                            {{ date('F d, Y', strtotime($item->created_at)) }} at
                                                            {{ date('h:m a', strtotime($item->created_at)) }}
                                                        </p>
                                                    </div>
                                                    <p class="font-medium">
                                                        {{ $item->comment }}
                                                    </p>
                                                    {{-- <div>
                                                        <button class="reply_btn inline-flex items-center py-2 px-5 rounded-md gap-3 cursor-pointer">
                                                            <img src="{{ asset('frontend/images/download.svg') }}" alt="img"
                                                                class="grayscale w-4">
                                                            Reply
                                                        </button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            {{-- <div class="flex ml-14 border-l gap-5 p-5">
                                                <div>
                                                    <img src="{{ asset('frontend/images/8c9d878c466754f1bcc7f350c4ce6e78.png') }}"
                                                        alt="img" class="rounded-full">
                                                </div>
                                                <div class="grid gap-5">
                                                    <div>
                                                        <p class="uppercase text-[17px] font-bold">Syusra</p>
                                                        <p class="text-[14px]">April 2, 2023 at 6:14 am</p>
                                                    </div>
                                                    <p class="font-medium">Amazing! loved this web and its use </p>
                                                    <button class="reply_btn flex gap-3 cursor-pointer">
                                                        <img src="{{ asset('frontend/images/download.svg') }}" alt="img"
                                                            class="grayscale w-4">
                                                        <p class="">Reply</p>
                                                    </button>
                                                </div>
                                            </div> --}}
                                        </div>

                                        {{-- <div class="reply_comment_box p-5 border sm:p-10 grid gap-5">
                                            <div class="flex justify-between">
                                                <h2 class="text-[22px] font-medium dark:text-white">Leave a comment</h2>
                                                <p class="cancel_reply cursor-pointer hover:underline hover:text-red-500">
                                                    Cancel Reply</p>
                                            </div>
                                            <p class=" dark:text-white">Your email address will not be published. Required
                                                fields are marked *</p>
                                            <div class="grid gap-2">
                                                <label for="comment" class="font-medium  dark:text-white">Comment *</label>
                                                <textarea name="" id="comment" cols="30" rows="10" class="replay_comment p-2 rounded"></textarea>
                                            </div>
                                            <div class="grid gap-2">
                                                <label for="name" class="font-medium  dark:text-white">Name *</label>
                                                <input type="text" id="name" class="replay_name p-2 rounded">
                                            </div>
                                            <div class="grid gap-2">
                                                <label for="email" class="font-medium  dark:text-white">Email *</label>
                                                <input type="email" id="email" class="replay_email p-2 rounded">
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" name="" id="checkbox2" class="cursor-pointer">
                                                <label for="checkbox2"
                                                    class="cursor-pointer select-none  dark:text-white">Save
                                                    my name, email, and website
                                                    in this browser for the next time I comment.</label>
                                            </div>
                                            <div>
                                                <button
                                                    class="bg-primary-500 hover:bg-primary-600 text-white py-3 px-6 rounded font-medium inline-block">Post
                                                    Comment</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <span class="w-full h-px bg-slate-300 inline-block"></span>
                                @endforeach
                            </div>
                        </div>

                        <form action="{{ route('comment.add') }}" id="commentForm" method="POST" class="main_comment_box border p-5 sm:p-10 grid gap-5">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <h2 class="text-[22px] font-medium dark:text-white">Leave a comment</h2>
                            <p class=" dark:text-white">Your email address will not be published. Required fields are
                                marked *</p>
                            <div class="grid gap-2">
                                <label for="comment" class="font-medium  dark:text-white">Comment *</label>
                                <textarea name="comment" id="comment" cols="30" rows="10" class="main_comment p-2 rounded" required></textarea>
                            </div>
                            <div class="grid gap-2">
                                <label for="name" class="font-medium  dark:text-white">Name *</label>
                                <input type="text" name="name" id="name" class="main_name p-2 rounded" required>
                            </div>
                            <div class="grid gap-2">
                                <label for="email" class="font-medium  dark:text-white">Email *</label>
                                <input type="email" name="email" id="email" class="main_email p-2 rounded" required>
                            </div>
                            {{-- <div class="flex items-center gap-2">
                                <input type="checkbox" name="" id="checkbox" class="cursor-pointer">
                                <label for="checkbox" class="cursor-pointer select-none  dark:text-white">Save my name,
                                    email, and website
                                    in this browser for the next time I comment.</label>
                            </div> --}}
                            <div>
                                <button type="submit"
                                    class="main_post_comment bg-primary-500 hover:bg-primary-600 text-white py-3 px-6 rounded font-medium inline-block">Post
                                    Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
                 <div class="sticky bottom-0"  id="bottomAd">
                    
                </div>
            </div>
            @include('components.right-sidebar', $post)

        </div>
    </div>
    <style>

        .mymention{ color: gray; }
        .igniter_box {
            display: block;
            padding: 20px;
            background: #F4E9B3;
        }

    </style>
@endsection


@push('js')
    <link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('frontend/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
    var responsedata = null;
  $(function () {
    advertise();
    });

    function advertise(){
        category_id = '{{ $post->category_id }}'
        $.ajax({
            url: `{{ route('news.advertise') }}`,
            method: 'GET',
            data: {category_id},
            success: function(response) {
                responsedata = response;
                 for(var i = 0; i < response.length; i++){
                    processAds(0, response);
                }
            },
        });
    }
    function processAds(index, response) {
        var APP_URL = {!! json_encode(url('/')) !!}
        if (index < response.length) {
            var imageUrl = APP_URL + '/' + response[index].image;
            var imageUrlPhone = APP_URL + '/' + response[index].image_phone;
            $('#bottomAd').html('<div class="mt-10 h-[100px] overflow-hidden hidden md:block border">' +
                '<button onclick="next(' + (index + 1) +')" class="py-0 px-2 bg-white border border-slate-400 text-[#00aecd] absolute right-0 -top-2 rounded">x</button>' +
                '<a href="'+ response[index].link +'" class="shadow-md w-full h-full" target="blank">' +
                    '<img src="'+imageUrl+'" class="lazyload block w-full h-full object-cover object-center" data-src="'+imageUrl+'" alt="img">' +
                '</a>' +
            '</div>'+
            '<div class="mt-10 h-[80px] overflow-hidden block md:hidden border">' +
                '<button onclick="next(' + (index + 1) +')" class="py-0 px-2 bg-white border border-slate-400 text-[#00aecd] absolute right-0 -top-2 rounded">x</button>' +
                        '<a href="'+ response[index].link +'" class="shadow-md w-full h-full" target="blank">' +
                            '<img src="'+imageUrlPhone+'" class="lazyload block w-full h-full object-cover object-center" data-src="'+imageUrlPhone+'" alt="img">' +
                        '</a> '  +
                    '</div>');

            setTimeout(function () {
               next(index + 1);
            },response[index].duration * 60 * 1000);
        }
    }
    function next(index) {
        response = responsedata;
        processAds(index,response);
        if(index == response.length){
            $("#bottomAd").hide();
        }
    }
       

        $('#commentForm').submit(function(e) {
            e.preventDefault();
            let formData = $('#commentForm').serializeArray();
            $.ajax({
                url: `{{ route('comment.add') }}`,
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Form data submitted successfully');
                    if (response?.errors) {
                        Swal.fire({
                            icon: 'error',
                            title: `Opps! Something went wrong. Please fill all input and try again.`,
                            showConfirmButton: true,
                        })
                    }
                    if (response?.message == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: `Thanks for comment. This will be pending for approval.`,
                            showConfirmButton: true,
                        })
                        $('.main_comment').val('')
                        $('.main_name').val('')
                        $('.main_email').val('')
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error submitting form data');
                    console.log(xhr.responseText);
                }
            });
        })
        $('.reply_btn').click(() => {
            $('.main_comment_box').hide()
        })
        $('.cancel_reply').click(() => {
            $('.reply_comment_box').hide()
        })
        $('.reply_btn').click(() => {
            $('.reply_comment_box').show()
        })
        $('.cancel_reply').click(() => {
            $('.main_comment_box').show()
        })
        $('.reply_comment_box').hide()



        // $('.main_post_comment').click(() => {
        //     var main_comment = $('.main_comment').val()
        //     var main_name = $('.main_name').val()
        //     var main_email = $('.main_email').val()

        //     $('.main_comment').val('')
        //     $('.main_name').val('')
        //     $('.main_email').val('')

        //     // console.log(main_comment, main_name, main_email);
        // })
    </script>
@endpush
