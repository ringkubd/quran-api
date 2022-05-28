<div class="table-responsive">
    <table class="table" id="tafsirs-table">
        <thead>
        <tr>
            <th>Title</th>
        <th>Content</th>
        <th>Sura</th>
        <th>Ayat</th>
        <th>Source</th>
        <th>Tags</th>
        <th>Blog</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tafsirs as $tafsir)
            <tr>
                <td>{{ $tafsir->title }}</td>
            <td>{{ $tafsir->content }}</td>
            <td>{{ $tafsir->sura }}</td>
            <td>{{ $tafsir->ayat }}</td>
            <td>{{ $tafsir->source }}</td>
            <td>{{ $tafsir->tags }}</td>
            <td>{{ $tafsir->blog }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tafsirs.destroy', $tafsir->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tafsirs.show', [$tafsir->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tafsirs.edit', [$tafsir->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
