<!-- Sura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sura', 'Sura:') !!}
    {!! Form::number('sura', null, ['class' => 'form-control']) !!}
</div>

<!-- Verse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('verse', 'Verse:') !!}
    {!! Form::number('verse', null, ['class' => 'form-control']) !!}
</div>

<!-- Ayaht Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ayaht', 'Ayaht:') !!}
    {!! Form::textarea('ayaht', null, ['class' => 'form-control']) !!}
</div>