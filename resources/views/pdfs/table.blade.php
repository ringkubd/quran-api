<div class="table-responsive">
    <table class="table" id="pdfs-table">
        <thead>
        <tr>
            <th>Sura No</th>
        <th>Pdf</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pdfs as $pdf)
            <tr>
                <td>{{ $pdf->sura_no }}</td>
            <td>{{ $pdf->pdf }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pdfs.destroy', $pdf->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pdfs.show', [$pdf->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pdfs.edit', [$pdf->id]) }}"
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
