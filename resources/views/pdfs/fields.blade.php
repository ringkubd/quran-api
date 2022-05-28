<!-- Sura No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sura_no', 'Sura No:') !!}
    {!! Form::number('sura_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Pdf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pdf', 'Pdf:') !!}
    {!! Form::text('pdf', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>