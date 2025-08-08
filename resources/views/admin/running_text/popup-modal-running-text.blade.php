@include('template.modal.modal-part.modal-parent')
<form action="{{ route('update_text') }}" method="post">
    @csrf
    {{-- isi form --}}
    @include('admin.running_text.modal-runnign-text-body')

    {{-- button (close , submit) --}}
    @include('template.modal.modal-part.footer-button')
</form>

@include('template.modal.modal-part.close-parent')
