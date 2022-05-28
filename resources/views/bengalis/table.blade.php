<div class="table-responsive">
    <table class="table" id="bengalis-table">
        <thead>
        <tr>
            <th>Sura</th>
        <th>Aya</th>
        <th>Text</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bengalis as $bengali)
            <tr>
                <td>{{ $bengali->sura }}</td>
            <td>{{ $bengali->aya }}</td>
            <td>{{ $bengali->text }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bengalis.destroy', $bengali->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bengalis.show', [$bengali->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bengalis.edit', [$bengali->id]) }}"
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
