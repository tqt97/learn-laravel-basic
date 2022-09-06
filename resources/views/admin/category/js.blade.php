<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('#name').mouseout(function(e) {
        $.get('{{ route('generate_slug.category') }}', {
                'name': $(this).val()
            },
            function(data) {
                $('#slug').val(data.slug);
            }
        );
    });

    $('#parent_id').select2({
        placeholder: 'Select category',
        allowClear: true
    });
</script>

<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
</script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
    const inputElement = document.querySelector('input[id="image"]');
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginImageValidateSize
    );
    const pond = FilePond.create(inputElement, {
        // labelIdle: `Kéo và thả hình vào đây hoặc <span class="filepond--label-action">Chọn từ thiết bị</span>`,
        // labelIdle: `{{ __('Drag and drop your files or browse your computer') }}`,
        labelFileProcessing: `{{ __('Processing...') }}`,
        labelFileProcessingComplete: `{{ __('Upload successfully') }}`,
        labelTapToUndo: `{{ __('Touch to undo') }}`,
        labelTapToCancel: `{{ __('Touch to cancel') }}`,
        imagePreviewHeight: 100,
        imageCropAspectRatio: '1:1',
        imageResizeTargetWidth: 300,
        imageResizeTargetHeight: 300,
        // stylePanelLayout: 'compact circle',
        styleLoadIndicatorPosition: 'center bottom',
        styleProgressIndicatorPosition: 'right bottom',
        styleButtonRemoveItemPosition: 'left bottom',
        styleButtonProcessItemPosition: 'right bottom',
        acceptedFileTypes: ['image/*'],
        labelFileTypeNotAllowed: "{{ __('Image type must beImage type must be') }} jpg, png, gif, jpeg",
        imageValidateSizeMaxWidth: 2048,
        imageValidateSizeMaxHeight: 2048,
        // imageValidateSizeMinWidth: 300,
        // imageValidateSizeMinHeight: 200,
    });
    FilePond.setOptions({
        server: {
            url: '/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>
