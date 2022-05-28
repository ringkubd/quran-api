<div class="table-responsive">
    <table class="table" id="audio-table">
        <thead>
        <tr>
            <th>Sura No</th>
        <th>Audio</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($audio as $audio)
            <tr>
                <td>{{ $audio->sura_no }}</td>
            <td>{{ $audio->audio }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['audio.destroy', $audio->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('audio.show', [$audio->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('audio.edit', [$audio->id]) }}"
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
