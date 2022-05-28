<!-- Sura No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sura_no', 'Sura No:') !!}
    {!! Form::number('sura_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Audio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('audio', 'Audio:') !!}
    {!! Form::text('audio', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>