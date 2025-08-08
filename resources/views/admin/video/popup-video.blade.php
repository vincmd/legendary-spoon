@include('template.modal.modal-part.modal-parent')
<form action="{{ route('video_new') }}" enctype="multipart/form-data" method="post">
    @csrf
    {{-- isi form --}}
    @include('admin.video.modal-video')

    {{-- button (close , submit) --}}
    @include('template.modal.modal-part.footer-button')
</form>

@include('template.modal.modal-part.close-parent')
