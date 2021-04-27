@push('scripts')
    <script>
        (function() {
            document.getElementById('title').addEventListener('blur', function(e) {
                let slug = document.getElementById('url');

                if( slug.value ) {
                    return;
                }

                slug.value = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            });
        })();
    </script>
@endpush