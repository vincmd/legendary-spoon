@include('template.modal.modal-part.modal-parent')
<form action="{{ route('update_text') }}" method="post">
    @csrf
    @include('template.modal.modal-part.modal-body')
    @include('template.modal.modal-part.footer-button')
</form>

@include('template.modal.modal-part.close-parent')
