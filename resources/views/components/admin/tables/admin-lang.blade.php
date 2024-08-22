<table id="admin_language" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Key</th>
            <th>English</th>
            <th>Arabic</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enTranslations as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>
                    <input type="text" class="language-input" data-key="{{ $key }}" data-lang="en" value="{{ $value }}">
                    <i class="status-icon"></i>
                </td>
                <td>
                    <input type="text" class="language-input" data-key="{{ $key }}" data-lang="ar" value="{{ $arTranslations[$key] }}">
                    <i class="status-icon"></i>
                </td>


            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Key</th>
            <th>English</th>
            <th>Arabic</th>

        </tr>
    </tfoot>
</table>

<x-slot:extra_script>
    <script>
        new DataTable('#admin_language');
    </script>
     <script>
        $(document).ready(function() {
            $(document).on('change', '.language-input', function() {
                console.log('aa');
                var input = $(this);
                var key = input.data('key');
                var lang = input.data('lang');
                var value = input.val();
                var icon = input.siblings('.status-icon');

                // Show loading icon
                icon.removeClass('fa-check fa-exclamation-circle').addClass('fa-spinner fa-spin');

                // Send AJAX request to update the language key
                $.ajax({
                    url: "{{ route('admin.admin_language.updateKey') }}",
                    method: "PUT",
                    data: {
                        key: key,
                        lang: lang,
                        value: value,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Show success icon
                        icon.removeClass('fa-spinner fa-spin fa-exclamation-circle').addClass('fa-check');
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if necessary
                        console.error(xhr.responseText); // Log error message
                        // Show error icon
                        icon.removeClass('fa-spinner fa-spin fa-check').addClass('fa-exclamation-circle text-danger');
                    }
                });
            });
        });
    </script>
</x-slot>
