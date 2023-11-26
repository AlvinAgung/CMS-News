@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@push('before-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
@endpush
@push('after-css')
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Add News</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-create" method="POST" action="{{ route('perangkat-desa.update',$show->id) }}" enctype="multipart/form-data">

                                            @csrf
                                            @method('put')
                                            <div class="mb-1">
                                                <label class="form-label" for="name">NIP</label>
                                                <input type="text" id="nip" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Input NIP" aria-label="nip" aria-describedby="nip" name="nip" value="{{$show->nip}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Input Name" aria-label="name" aria-describedby="name" name="name" value="{{$show->name}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="address">Address</label>
                                                <input type="text" id="address" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Input Address" aria-label="address" aria-describedby="address" name="address" value="{{$show->address}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Gender</label>
                                                {{-- <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="input category name" aria-label="name" aria-describedby="name" name="name"> --}}
                                                    <select name="gender" class="form-control select-search" data-fouc>
                                                        @if ($show->gender == 'Perempuan')
                                                            <option value="Laki - Laki">Laki - Laki</option>
                                                            <option value="Perempuan" selected>Perempuan</option>
                                                        @else
                                                            <option value="Laki - Laki" selected>Laki - Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        @endif
                                                    </select>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="text" id="email" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Input Email" aria-label="email" aria-describedby="email" name="email" value="{{$show->email}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="telp">Telp</label>
                                                <input type="text" id="telp" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Input Telp" aria-label="telp" aria-describedby="telp" name="telp" value="{{$show->telp}}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="jabatan">Jabatan</label>
                                                {{-- <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="input category name" aria-label="name" aria-describedby="name" name="name"> --}}
                                                <select name="jabatan_id" id="jabatan_id" class="form-control @error('jabatan') is-invalid @enderror">
                                                   @foreach ($jabatan as $item)
                                                        <option value="{{$item->id}}" {{$show->jabatan_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                   @endforeach
                                                </select>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Photo</label>
                                                <br>
                                                {{-- <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="input category name" aria-label="name" aria-describedby="name" name="name"> --}}
                                                <img  id="preview" src="{{URL::to('storage/picture/perangkat-desa/'.$show->photo)}}" style="width: auto; height: 125px; border-radius: 2px; margin-bottom: 4px;" alt="">
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="input category name" aria-label="name" aria-describedby="name" name="picture2" value="{{$show->photo}}" hidden>
                                                <input id="fill" onchange="previewFile()" type="file" class="form-control" name="picture">
                                                <span class="help-block">Format : jpg, jpeg, png. Max file size 20Mb</span>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Simpan</button>
                                  
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
@endsection
@push('before-js')
@endpush
@push('after-js')
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.dt-responsive').DataTable();
            $('#btn-create').on('click', function() {
                $("#modal-create").modal('show');
            });
        });

        // This sample still does not showcase all CKEditor&nbsp;5 features (!)
            // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Masukkan Konten',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced'
                ]
            });


    </script>
@endpush
