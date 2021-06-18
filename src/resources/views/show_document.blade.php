<html>

<head>
    <base href="{{ url('/') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        body,* {
            margin:0;
            padding:0;
        }
    </style>
</head>
<div style="height:200px">
    <p>
        <a href="{{ route('index') }}">Back to list of pdfs</a>
    </p>
    <h3>File: {{ $document->original_filename }}</h3>
    <form action="{{ route('save-watermark') }}" method="post">
        @csrf
        <input type="hidden" name="document_id" value="{{ $document->id }}">
        <input type="hidden" name="positions[]">
        @foreach ($document->images as $image)
            <input type="hidden" id="pos-x-{{ $image->page }}" name="pos_x_{{ $image->page }}">
            <input type="hidden" id="pos-y-{{ $image->page }}" name="pos_y_{{ $image->page }}">
        @endforeach
        <button type="submit">Save</button>
    </form>
</div>

@foreach ($document->images as $image)
    <div class="image-container" style="width: 1224px; border: 1px solid green; margin: 1em 0.3em">
        @if ($image->watermark_filepath)
            <img
                src="{{ $image->watermark_filepath }}"
                alt="{{ $document->original_filename . " watermarked page" }}"
                class="image"
                id="image-{{ $image->page }}"
                data-page="{{ $image->page }}"
                data-original-filename="{{ asset($image->filepath) }}"
                style="width: 100%;"
            >
        @else
            <img
                src="{{ $image->filepath }}"
                alt="{{ $document->original_filename . " page" }}"
                class="image"
                id="image-{{ $image->page }}"
                data-page="{{ $image->page }}"
                data-original-filename="{{ $image->filepath }}"
                style="width: 100%;max-width:1224px"
            >
        @endif
    </div>
@endforeach
