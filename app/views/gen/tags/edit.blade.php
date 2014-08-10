@extends('layouts.scaffold')

@section('main')

<h1>Edit Tag</h1>
{{ Form::model($tag, array('method' => 'PATCH', 'route' => array('tags.update', $tag->id))) }}
	<ul>
        <li>
            {{ Form::label('reference_id', 'Reference_id:') }}
            {{ Form::input('number', 'reference_id') }}
        </li>

        <li>
            {{ Form::label('table', 'Table:') }}
            {{ Form::text('table') }}
        </li>

        <li>
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::textarea('tags') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('tags.show', 'Cancel', $tag->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
