@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-fluid">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Post
                        </h2>
                        <div class="page-pretitle">
                            Post Create
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admin.posts.index') }} " class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"></path>
                                </svg> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-fluid">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                                Create Post:
                                <a target="_blank" href="{{ route('post.details', $post->slug) }}" class="btn btn-info btn-sm">Veiw</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                                    enctype="multipart/form-data" id="post_edit_form">
                                    @csrf
                                    <input type="hidden" name="width" id="width">
                                    <input type="hidden" name="height" id="height">
                                    <input type="hidden" name="x" id="x">
                                    <input type="hidden" name="y" id="y">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Title</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ $post->title }}" placeholder="Input placeholder">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                value="{{ $post->slug }}" placeholder="Input placeholder">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Post Category</label>
                                            <select name="category_id" class="form-control select2"
                                                style="width: 100%; padding: 7px; border: 1px solid #ddd; border-radius: 5px;">
                                                <option value="volvo" disabled>--Select category--</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($post->category_id == $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3" style="display: flex; align-items: center;">
                                            <label class="form-check">
                                                <input class="form-check-input" name="for_nav" type="checkbox"
                                                    @if ($post->status == 1) checked @endif>
                                                <span class="form-check-label">Post Publish Status</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label required">Image</label>
                                            <input type="file" class="form-control" id="file-input" name="image"
                                                value="" placeholder="Input placeholder" accept="image/*">
                                            <div id='img_contain'>
                                                <img id="image_preview" src="{{ asset($post->image) }}"
                                                    style="width: 300px;margin-top: 10px; margin-bottom: 10px;" />
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <textarea name="details" id="description">{{ $post->details }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 d-flex justify-content-end">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                </div>
            </footer>
        </div>
    @endsection
    @include('components.tinyamc')

    @push('js')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
        <script src="{{ asset('frontend/sweetalert2/sweetalert2.min.js') }}"></script>
        <link href="{{ asset('dist/css/cropper.min.css') }}" rel="stylesheet">
        <script src="{{ asset('dist/js/cropper.min.js') }}"></script>
        <script>
            $(function() {
                $('.select2').select2();
            })

            tinymce_init("#description");

            $('#post_edit_form').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let action = $(this).attr('action');
                $.ajax({
                    url: action,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if (data?.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success', 
                                text: data.message
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Opps! Something went wrong. Try again', 
                                text: data.message
                            })
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            })

            // const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            // const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
            // const Ctinymce = tinymce.init({
            //     selector: 'textarea#description',
            //     plugins: 'preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker editimage help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export footnotes mergetags autocorrect',
            //     // tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
            //     // tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
            //     // tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
            //     // tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
            //     mobile: {
            //         plugins: 'template preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable footnotes mergetags autocorrect'
            //     },
            //     menu: {
            //         tc: {
            //             title: 'Comments',
            //             items: 'addcomment showcomments deleteallconversations'
            //         }
            //     },
            //     menubar: 'template file edit view insert format tools table tc help',
            //     toolbar: 'boxtemplate undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment | footnotes | mergetags',
            //     font_formats: 'Arial=arial,helvetica,sans-serif; Courier New=courier new,courier,monospace; AkrutiKndPadmini=Akpdmi-n',
            //     toolbar_sticky: true,
            //     toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            //     autosave_ask_before_unload: true,
            //     autosave_interval: '30s',
            //     autosave_prefix: '{path}{query}-{id}-',
            //     autosave_restore_when_empty: false,
            //     autosave_retention: '2m',
            //     image_advtab: true,

            //     // link_list: [{
            //     //         title: 'My page 1',
            //     //         value: 'https://www.tiny.cloud'
            //     //     },
            //     //     {
            //     //         title: 'My page 2',
            //     //         value: 'http://www.moxiecode.com'
            //     //     }
            //     // ],
            //     // image_list: [{
            //     //         title: 'My page 1',
            //     //         value: 'https://www.tiny.cloud'
            //     //     },
            //     //     {
            //     //         title: 'My page 2',
            //     //         value: 'http://www.moxiecode.com'
            //     //     }
            //     // ],
            //     // image_class_list: [{
            //     //         title: 'None',
            //     //         value: ''
            //     //     },
            //     //     {
            //     //         title: 'Some class',
            //     //         value: 'class-name'
            //     //     }
            //     // ],
            //     importcss_append: true,
            //     templates: [{
            //         title: 'Story highlighter box',
            //         description: 'Box for highlight description',
            //         content: `
            //                 <div class="igniter_box">
            //                     Start writing highlight content
            //                 </div>
            //             `,
            //     }, ],
            //     template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            //     template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            //     height: 600,
            //     image_caption: true,
            //     quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            //     noneditable_class: 'mceNonEditable',
            //     toolbar_mode: 'sliding',
            //     spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
            //     tinycomments_mode: 'embedded',
                
            //     content_style: `
            //         .mymention{ color: gray; }
            //         .igniter_box {
            //             display: block;
            //             padding: 20px;
            //             background: #F4E9B3;
            //         }
            //         .igniter_box_inline {
            //             display: inline-block;
            //             padding: 20px;
            //             background: #F4E9B3;
            //         }
            //         .josefin_sans {
            //             font-family: 'Josefin Sans', sans-serif;
            //         }
            //         .font-arabic {
            //             font-family: 'Al Majeed Quranic';
            //         }
            //     `,
            //     contextmenu: 'link image editimage table configurepermanentpen',
            //     a11y_advanced_options: true,
            //     setup: (editor) => {
            //         /* Menu items are recreated when the menu is closed and opened, so we need
            //            a variable to store the toggle menu item state. */
            //         let toggleState = false; 
            //         editor.ui.registry.addMenuButton('boxtemplate', {
            //             text: 'Box Template',
            //             fetch: (callback) => {
            //                 const items = [{
            //                         type: 'menuitem',
            //                         text: 'Add Template box',
            //                         onAction: (some) => {
            //                             const selectedContent = editor.selection.getContent({ format: 'html' });
            //                             console.log(selectedContent);
            //                             if (selectedContent) {
            //                                 const wrappedContent = `<div class="igniter_box">${selectedContent}</div>`;
            //                                 editor.selection.setContent(wrappedContent);
            //                             } else {
            //                                 return editor.insertContent('<div class="igniter_box">Write highlighted content</div>')
            //                             }
            //                         }
            //                     },
            //                     {
            //                         type: 'menuitem',
            //                         text: 'Add Inline box',
            //                         onAction: (some) => {
            //                             const selectedContent = editor.selection.getContent({ format: 'html' });
            //                             console.log(selectedContent);
            //                             if (selectedContent) {
            //                                 const wrappedContent = `<div class="igniter_box_inline">${selectedContent}</div>`;
            //                                 editor.selection.setContent(wrappedContent);
            //                             } else {
            //                                 return editor.insertContent('<div class="igniter_box_inline">Write highlighted content</div>')
            //                             }
            //                         }
            //                     },
                                
            //                     {
            //                         type: 'menuitem',
            //                         text: 'Font josefin',
            //                         onAction: (some) => {
            //                             const selectedContent = editor.selection.getContent({ format: 'html' });
            //                             if (selectedContent) {
            //                                 const wrappedContent = `<span class="josefin_sans">${selectedContent}</span>`;
            //                                 editor.selection.setContent(wrappedContent);
            //                             } else {
            //                                 return editor.insertContent('<span class="josefin_sans"></span>')
            //                             }
            //                         }
            //                     },
            //                     {
            //                         type: 'menuitem',
            //                         text: 'Font arabic',
            //                         onAction: (some) => {
            //                             const selectedContent = editor.selection.getContent({ format: 'html' });
            //                             if (selectedContent) {
            //                                 const wrappedContent = `<span class="font-arabic">${selectedContent}</span>`;
            //                                 editor.selection.setContent(wrappedContent);
            //                             } else {
            //                                 return editor.insertContent('<span class="font-arabic"></span>')
            //                             }
            //                         }
            //                     },
            //                 ];
            //                 callback(items);
            //             }
            //         }); 
            //     },
            //     // skin: useDarkMode ? 'oxide-dark' : 'oxide',
            //     // content_css: useDarkMode ? 'dark' : 'default',
            //     /*
            //     The following settings require more configuration than shown here.
            //     For information on configuring the mentions plugin, see:
            //     https://www.tiny.cloud/docs/tinymce/6/mentions/.
            //     */
            //     mentions_selector: '.mymention',
            //     // mentions_fetch: mentions_fetch,
            //     // mentions_menu_hover: mentions_menu_hover,
            //     // mentions_menu_complete: mentions_menu_complete,
            //     // mentions_select: mentions_select,
            //     mentions_item_type: 'profile',
            //     autocorrect_capitalize: true,
            //     mergetags_list: [{
            //             title: 'Client',
            //             menu: [{
            //                     value: 'Client.LastCallDate',
            //                     title: 'Call date'
            //                 },
            //                 {
            //                     value: 'Client.Name',
            //                     title: 'Client name'
            //                 }
            //             ]
            //         },
            //         {
            //             title: 'Proposal',
            //             menu: [{
            //                 value: 'Proposal.SubmissionDate',
            //                 title: 'Submission date'
            //             }]
            //         },
            //         {
            //             value: 'Consultant',
            //             title: 'Consultant'
            //         },
            //         {
            //             value: 'Salutation',
            //             title: 'Salutation'
            //         }
            //     ]
            // })
            // Ctinymce.
            // console.log(Ctinymce);activeEditor.execCommand('mceInsertTemplate', false, '<p>This is my template text.</p>');
        </script>


        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_preview').attr('src', e.target.result);
                        $('#image_preview').hide();
                        $('#image_preview').fadeIn(650);
                        // cropperSetup()
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file-input").change(function() {
                readURL(this);
            });

            function cropperSetup() {
                $('#image_preview').cropper({
                    aspectRatio: 29 / 19,
                    crop: function(event) {
                        $('#width').val(event.detail.width)
                        $('#height').val(event.detail.height)
                        $('#x').val(event.detail.x)
                        $('#y').val(event.detail.y)
                    }
                });
            }
            // $('#title').on('change input',function(){
            //     $('#slug').val(slug($(this).val()));
            // })
            $('#slug').on('change input', function() {
                $('#slug').val(slug($(this).val()));
            })

            function slug(text) {
                const separator = '-';
                const op = String(text ? text : '')
                    .toLowerCase()
                    .replace(/\s+/g, separator)
                    .replace(/[^a-z0-9]+/g, separator)
                    .replace(/-+/g, separator);

                return op;
            }
        </script>
    @endpush
