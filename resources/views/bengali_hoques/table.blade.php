<div class="table-responsive">
    <table class="table" id="bengaliHoques-table">
        <thead>
        <tr>
            <th>Sura</th>
        <th>Aya</th>
        <th>Text</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bengaliHoques as $bengaliHoque)
            <tr>
                <td>{{ $bengaliHoque->sura }}</td>
            <td>{{ $bengaliHoque->aya }}</td>
            <td>{{ $bengaliHoque->text }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bengaliHoques.destroy', $bengaliHoque->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bengaliHoques.show', [$bengaliHoque->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bengaliHoques.edit', [$bengaliHoque->id]) }}"
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
