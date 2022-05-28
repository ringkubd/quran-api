<div class="table-responsive">
    <table class="table" id="suras-table">
        <thead>
        <tr>
            <th>Sura No</th>
        <th>Sura Name</th>
        <th>Para</th>
        <th>Meaning</th>
        <th>Total Ayat</th>
        <th>Total Ruku</th>
        <th>Eng Name</th>
        <th>Hindi</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($suras as $sura)
            <tr>
                <td>{{ $sura->sura_no }}</td>
            <td>{{ $sura->sura_name }}</td>
            <td>{{ $sura->para }}</td>
            <td>{{ $sura->meaning }}</td>
            <td>{{ $sura->total_ayat }}</td>
            <td>{{ $sura->total_ruku }}</td>
            <td>{{ $sura->eng_name }}</td>
            <td>{{ $sura->hindi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['suras.destroy', $sura->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('suras.show', [$sura->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('suras.edit', [$sura->id]) }}"
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
