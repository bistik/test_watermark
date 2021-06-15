<h1>Upload PDF</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" enctype="multipart/form-data" action="{{ route('save-document') }}">
    @csrf
    <input type="file" name="document" required="required">
    <button type="submit">Save document</button>
</form>

@if (count($documents) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>Filename</th>
                <th>Upload date</th>
                <th>Filetype</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td><a href="#">{{ $document->original_filename }}</a></td>
                    <td>{{ $document->created_at->format('Y-m-d') }}</td>
                    <td>{{ $document->filetype }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
