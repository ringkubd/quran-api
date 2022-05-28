<div class="table-responsive">
    <table class="table" id="englishes-table">
        <thead>
        <tr>
            <th>Sura</th>
        <th>Aya</th>
        <th>Text</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($englishes as $english)
            <tr>
                <td>{{ $english->sura }}</td>
            <td>{{ $english->aya }}</td>
            <td>{{ $english->text }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['englishes.destroy', $english->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('englishes.show', [$english->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('englishes.edit', [$english->id]) }}"
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
