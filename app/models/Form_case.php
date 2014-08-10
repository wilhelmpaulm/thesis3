<?php

class Form_case extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'case_id' => 'required'
	);
}
