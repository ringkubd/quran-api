<!-- Sura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sura', 'Sura:') !!}
    {!! Form::number('sura', null, ['class' => 'form-control']) !!}
</div>

<!-- Aya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aya', 'Aya:') !!}
    {!! Form::number('aya', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>