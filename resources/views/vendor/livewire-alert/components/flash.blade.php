@if (session()->has('livewire-alert'))
    <script nonce="{{ csp_nonce() }}">
        window.onload = event => {
            flashAlert(
                @json(session('livewire-alert'))
            )
        }
    </script>
@endif
