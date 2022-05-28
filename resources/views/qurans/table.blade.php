<div class="table-responsive">
    <table class="table" id="qurans-table">
        <thead>
        <tr>
            <th>Sura</th>
        <th>Verse</th>
        <th>Ayaht</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($qurans as $quran)
            <tr>
                <td>{{ $quran->sura }}</td>
            <td>{{ $quran->verse }}</td>
            <td>{{ $quran->ayaht }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['qurans.destroy', $quran->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('qurans.show', [$quran->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('qurans.edit', [$quran->id]) }}"
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
