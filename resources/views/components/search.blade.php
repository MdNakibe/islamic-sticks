<div class="custom-model-main">
    <div class="custom-model-inner">
        {{-- <div class="close-btn">×</div> --}}
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <div class="flex sticky top-0 justify-between items-center border px-[20px] py-4 bg-slate-100">
                    <input type="text" id="search_input" placeholder="I am looking for....."
                        class="outline-none border-none w-[100vh] bg-slate-100">
                    <svg id="search_icon" class="w-[100px] h-[30px] sm:w-[60px] sm:h-[60px] cursor-pointer sm:px-2"
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        strokeWidth="1" stroke="currentColor" fill="none" strokeLinecap="round"
                        strokeLinejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                        <path d="M21 21l-6 -6"></path>
                    </svg>
                    <div id="loading_icon">
                        <svg class="animate-spin -ml-1 h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
                <div class="" id="result_body">
                    {{-- <p class="py-4 border-b font-medium text-slate-700 text-[18px] px-[20px]">Recent</p>
                    <div
                        class="flex justify-between items-center py-4 border-b hover:bg-slate-50 cursor-pointer text-slate-700 px-[20px]">
                        <p class="text-[14px] sm:text-[14px]">Apple iPhone 11 </p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[25px] h-[25px] sm:w-[30px] sm:h-[30px]"
                            viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div
                        class="flex justify-between items-center py-4 border-b hover:bg-slate-50 cursor-pointer text-slate-700 px-[20px]">
                        <p class="text-[14px] sm:text-[14px]">Apple iPhone 13 Pro Max</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[25px] h-[25px] sm:w-[30px] sm:h-[30px]"
                            viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="bg-overlay backdrop-blur"></div>
</div>


@push('js')
<script>
function loading(load=true) {
    if (load) {
        $('#search_icon').hide();
        $('#loading_icon').show();
    } else {
        $('#search_icon').show();
        $('#loading_icon').hide();
    }
}
loading(false)
let search_input = document.querySelector('#search_input')
let blockTimeout;
search_input.addEventListener('input', function() {
    clearTimeout(blockTimeout)
    blockTimeout = setTimeout(() => {
        loading()
        let val = search_input.value;
        $.ajax({
            url: `{{ route('search') }}`,
            type: 'post',
            data: {
                token: val,
                _token: `{{ csrf_token() }}`,
            },
            success: function(data) {
                // console.log(data);
                loading(false)
                $('#result_body').html(data);
            }
        })
    }, 500)
    // console.log(val);
})
</script>
@endpush