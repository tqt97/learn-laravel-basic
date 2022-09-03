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
