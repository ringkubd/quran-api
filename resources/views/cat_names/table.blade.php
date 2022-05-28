<div class="table-responsive">
    <table class="table" id="catNames-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Eng</th>
        <th>Hindi</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($catNames as $catName)
            <tr>
                <td>{{ $catName->name }}</td>
            <td>{{ $catName->eng }}</td>
            <td>{{ $catName->hindi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['catNames.destroy', $catName->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catNames.show', [$catName->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('catNames.edit', [$catName->id]) }}"
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
