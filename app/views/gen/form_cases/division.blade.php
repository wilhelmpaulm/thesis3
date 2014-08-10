@extends('layouts.scaffold')

@section('main')

<h1>Show Form_case</h1>

<p>{{ link_to_route('form_cases.index', 'Return to all form_cases') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Case_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $form_case->case_id }}}</td>
                    <td>{{ link_to_route('form_cases.edit', 'Edit', array($form_case->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('form_cases.destroy', $form_case->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
