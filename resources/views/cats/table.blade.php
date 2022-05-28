<div class="table-responsive">
    <table class="table" id="cats-table">
        <thead>
        <tr>
            <th>Sura</th>
        <th>Aya</th>
        <th>Cat</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr>
                <td>{{ $cat->sura }}</td>
            <td>{{ $cat->aya }}</td>
            <td>{{ $cat->cat }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cats.destroy', $cat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cats.show', [$cat->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cats.edit', [$cat->id]) }}"
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
