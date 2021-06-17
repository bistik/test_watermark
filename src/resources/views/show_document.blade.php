<p>
    <a href="{{ route('index') }}">Back to list of pdfs</a>
</p>
<h3>File: {{ $document->original_filename }}</h3>

<form action="{{ route('save-watermark') }}" method="post">
    @csrf
    <input type="hidden" name="document_id" value="{{ $document->id }}">
    <input type="hidden" name="positions[]">
    <button type="submit">Save</button>
</form>

@foreach ($document->images as $image)
    <div class="image-container" style="width: 600px; border: 1px solid green; margin: 1em 0.3em">
        @if ($image->watermark_filepath)
            <img
                src="{{ asset($image->watermark_filepath) }}"
                alt="{{ $document->original_filename . " watermarked page" }}"
                style="width: 100%; max-width:600px"
            >
        @else
            <img
                src="{{ asset($image->filepath) }}"
                alt="{{ $document->original_filename . " page" }}"
                style="width: 100%; max-width:600px"
            >
        @endif
    </div>
@endforeach
