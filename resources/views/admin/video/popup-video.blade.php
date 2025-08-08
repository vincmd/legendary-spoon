@include('template.modal.modal-part.modal-parent')
    <form action="{{ route('video_new') }}" enctype='multipart/form-data' method="post">
    @csrf
    @if($video && $video->id) <input type="text" name="id" id="" value="{{ $video->id }}" style="display:none;">
    @endif
        {{-- isi form --}}
        @include('admin.video.modal-video')

        {{-- button (close , submit) --}}
        @include('template.modal.modal-part.footer-button')
    </form>

@include('template.modal.modal-part.close-parent')
