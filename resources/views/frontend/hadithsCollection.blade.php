@extends('frontend.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="flex flex-wrap flex-col md:flex-row gap-5 lg:gap-14 px-5 xl:px-0">
            <div class="flex-1 max-w-screen-xl md:mx-auto pt-14 pb-5 gap-5 sm:gap-10 ">
                <select id="collection_category"
                    class="bg-gray-50 rounded-md border cursor-pointer border-gray-300 text-gray-900 text-[16px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($hadith_categories as $item)
                        <option
                            value="{{ route('hadiths_collection', [
                                'id' => $item->id,
                                'slug' => Str::slug($item->collection_name),
                            ]) }}"
                            @if ($hadith_category->id == $item->id) selected @endif>{{ $item->collection_name }}</option>
                    @endforeach
                </select>
                <div class="mt-5 grid gap-5">
                    @foreach ($hadith_collections as $item)
                        <div class="p-5 border border-[#F4E9B3] grid gap-5 bg-[#fffade]">
                            {{-- fffade --}}
                            <p class="text-center font-medium text-[18px]">
                                {{ $item->chapter_info }}
                            </p>
                            <div class="grid gap-5">
                                <div class="text-center">
                                    <p class="bg-primary-300 inline-block py-2 px-5 rounded font-medium">
                                        {{ $item->book_name }}
                                    </p>
                                </div>
                                {{-- <p class="font-medium">Narrated 'Umar bin Al-Khattab:</p> --}}
                                <div class="grid gap-5 text-justify">
                                    <div class="text-[25px] leading-[45px] font-arabic">
                                        {!! $item->ar !!}
                                    </div>
                                    <div class="text-[18px]">
                                        {!! $item->en !!}
                                    </div>
                                    {{-- <span class="hidden sm:block w-px h-full bg-slate-400"></span> --}}

                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if(count($hadith_collections) == 0)
                    <div class="flex items-center justify-center font-bold text-xl text-slate-500">
                        No item found
                    </div>
                    @endif

                </div>
            </div>

            @include('components.right-sidebar')
        </div>
    </div>

    @push('js')
        <script>
            $('#collection_category').on('change', function() {
                location.href = $(this).val();
            })
        </script>
    @endpush
@endsection
