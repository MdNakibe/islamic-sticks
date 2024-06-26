@push('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    function tinymce_init(selector=null) {
        if (!selector) {
            return;
        }
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
        const Ctinymce = tinymce.init({
            selector: selector,
            plugins: 'preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker editimage help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export footnotes mergetags autocorrect',
            tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
            tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
            tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
            tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
            mobile: {
                plugins: 'template preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable footnotes mergetags autocorrect'
            },
            menu: {
                tc: {
                    title: 'Comments',
                    items: 'addcomment showcomments deleteallconversations'
                }
            },
            menubar: 'template file edit view insert format tools table tc help',
            toolbar: 'boxtemplate undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment | footnotes | mergetags',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,

            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            templates: [{
                title: 'Story highlighter box',
                description: 'Box for highlight description',
                content: `
                            <div class="igniter_box">
                                Start writing highlight content
                            </div>
                        `,
            }, ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
            tinycomments_mode: 'embedded',
            content_style: `
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
                `,
            contextmenu: 'link image editimage table configurepermanentpen',
            a11y_advanced_options: true,
            setup: (editor) => {
                /* Menu items are recreated when the menu is closed and opened, so we need
                   a variable to store the toggle menu item state. */
                let toggleState = false;
                editor.ui.registry.addMenuButton('boxtemplate', {
                    text: 'Box Template',
                    fetch: (callback) => {
                        const items = [{
                                type: 'menuitem',
                                text: 'Add Template box',
                                onAction: (some) => {
                                    const selectedContent = editor.selection
                                .getContent({
                                        format: 'html'
                                    });
                                    console.log(selectedContent);
                                    if (selectedContent) {
                                        const wrappedContent =
                                            `<div class="igniter_box">${selectedContent}</div>`;
                                        editor.selection.setContent(wrappedContent);
                                    } else {
                                        return editor.insertContent(
                                            '<div class="igniter_box">Write highlighted content</div>'
                                            )
                                    }
                                }
                            },
                            {
                                type: 'menuitem',
                                text: 'Add Inline box',
                                onAction: (some) => {
                                    const selectedContent = editor.selection
                                .getContent({
                                        format: 'html'
                                    });
                                    console.log(selectedContent);
                                    if (selectedContent) {
                                        const wrappedContent =
                                            `<div class="igniter_box_inline">${selectedContent}</div>`;
                                        editor.selection.setContent(wrappedContent);
                                    } else {
                                        return editor.insertContent(
                                            '<div class="igniter_box_inline">Write highlighted content</div>'
                                            )
                                    }
                                }
                            },
                            {
                                type: 'menuitem',
                                text: 'Add Inline box Center',
                                onAction: (some) => {
                                    const selectedContent = editor.selection
                                .getContent({
                                        format: 'html'
                                    });
                                    console.log(selectedContent);
                                    if (selectedContent) {
                                        const wrappedContent =
                                            `
                                            <div class="inline_box_center">
                                                <div class="igniter_box_inline">${selectedContent}</div>
                                            </div>
                                            `;
                                        editor.selection.setContent(wrappedContent);
                                    } else {
                                        return editor.insertContent(
                                            `
                                            <div class="inline_box_center">
                                                <div class="igniter_box_inline">Write highlighted content</div>
                                            </div>`
                                            )
                                    }
                                }
                            },

                            {
                                type: 'menuitem',
                                text: 'Font josefin',
                                onAction: (some) => {
                                    const selectedContent = editor.selection
                                .getContent({
                                        format: 'html'
                                    });
                                    if (selectedContent) {
                                        const wrappedContent =
                                            `<span class="josefin_sans">${selectedContent}</span>`;
                                        editor.selection.setContent(wrappedContent);
                                    } else {
                                        return editor.insertContent(
                                            '<span class="josefin_sans"></span>')
                                    }
                                }
                            },
                            {
                                type: 'menuitem',
                                text: 'Font arabic',
                                onAction: (some) => {
                                    const selectedContent = editor.selection
                                .getContent({
                                        format: 'html'
                                    });
                                    if (selectedContent) {
                                        const wrappedContent =
                                            `<span class="font-arabic">${selectedContent}</span>`;
                                        editor.selection.setContent(wrappedContent);
                                    } else {
                                        return editor.insertContent(
                                            '<span class="font-arabic"></span>')
                                    }
                                }
                            },
                        ];
                        callback(items);
                    }
                });

            },
            // skin: useDarkMode ? 'oxide-dark' : 'oxide',
            // content_css: useDarkMode ? 'dark' : 'default',
            /*
            The following settings require more configuration than shown here.
            For information on configuring the mentions plugin, see:
            https://www.tiny.cloud/docs/tinymce/6/mentions/.
            */
            mentions_selector: '.mymention',
            // mentions_fetch: mentions_fetch,
            // mentions_menu_hover: mentions_menu_hover,
            // mentions_menu_complete: mentions_menu_complete,
            // mentions_select: mentions_select,
            mentions_item_type: 'profile',
            autocorrect_capitalize: true,
            mergetags_list: [{
                    title: 'Client',
                    menu: [{
                            value: 'Client.LastCallDate',
                            title: 'Call date'
                        },
                        {
                            value: 'Client.Name',
                            title: 'Client name'
                        }
                    ]
                },
                {
                    title: 'Proposal',
                    menu: [{
                        value: 'Proposal.SubmissionDate',
                        title: 'Submission date'
                    }]
                },
                {
                    value: 'Consultant',
                    title: 'Consultant'
                },
                {
                    value: 'Salutation',
                    title: 'Salutation'
                }
            ]
        })
    }
</script>
@endpush
