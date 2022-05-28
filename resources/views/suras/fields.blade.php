<!-- Sura No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sura_no', 'Sura No:') !!}
    {!! Form::number('sura_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Sura Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sura_name', 'Sura Name:') !!}
    {!! Form::text('sura_name', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Para Field -->
<div class="form-group col-sm-6">
    {!! Form::label('para', 'Para:') !!}
    {!! Form::number('para', null, ['class' => 'form-control']) !!}
</div>

<!-- Meaning Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meaning', 'Meaning:') !!}
    {!! Form::text('meaning', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Total Ayat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_ayat', 'Total Ayat:') !!}
    {!! Form::number('total_ayat', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Ruku Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_ruku', 'Total Ruku:') !!}
    {!! Form::number('total_ruku', null, ['class' => 'form-control']) !!}
</div>

<!-- Eng Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eng_name', 'Eng Name:') !!}
    {!! Form::text('eng_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Hindi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hindi', 'Hindi:') !!}
    {!! Form::text('hindi', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>