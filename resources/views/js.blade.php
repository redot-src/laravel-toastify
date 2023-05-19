<script src="{{ config('toastify.cdn.js') }}"></script>

<script>
    (() => {
        const config = @json(config('toastify'));

        // Merge defaults with user options
        Toastify.defaults = { ...Toastify.defaults, ...config.defaults };

        const toastifiers = {};
        for (const [toastifier, opts] of Object.entries(config.toastifiers)) {

            // Append toastifier to the list
            toastifiers[toastifier] = (text, options = {}) => {
                return Toastify({ text, ...opts, ...options }).showToast();
            };

            // Register toastifier as a jQuery function if jQuery is available
            if (window.$) window.$[toastifier] = toastifiers[toastifier];
        }

        // Register toastify function
        window.toastify = () => toastifiers;
    })();

    // Read toastify messages from session
    document.addEventListener('DOMContentLoaded', () => {
        const toastifies = @json(session('toastify') ?? []);

        toastifies.forEach(({ type, message, options = [] }) => {
            window.toastify()[type](message, options);
        });
    });
</script>

{{ session()->forget('toastify') }}