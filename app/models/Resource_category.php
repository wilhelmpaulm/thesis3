<?php

class Resource_category extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);
}
