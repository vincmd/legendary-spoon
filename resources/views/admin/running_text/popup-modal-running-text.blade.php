@include('template.modal.modal-part.modal-parent')
<form action="{{ route('update_text') }}" method="post">
    @csrf
    {{-- isi form --}}
    <x-modal title="Edit Text" desc_tag="Textarea" desc="{{ $running_text }}"></x-modal>
    {{-- button (close , submit) --}}
    @include('template.modal.modal-part.footer-button')
</form>

@include('template.modal.modal-part.close-parent')
