<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 700,'maxlength' => 700]) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Sura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sura', 'Sura:') !!}
    {!! Form::number('sura', null, ['class' => 'form-control']) !!}
</div>

<!-- Ayat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ayat', 'Ayat:') !!}
    {!! Form::number('ayat', null, ['class' => 'form-control']) !!}
</div>

<!-- Source Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source', 'Source:') !!}
    {!! Form::text('source', null, ['class' => 'form-control','maxlength' => 1000,'maxlength' => 1000]) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::text('tags', null, ['class' => 'form-control','maxlength' => 1000,'maxlength' => 1000]) !!}
</div>

<!-- Blog Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blog', 'Blog:') !!}
    {!! Form::number('blog', null, ['class' => 'form-control']) !!}
</div>