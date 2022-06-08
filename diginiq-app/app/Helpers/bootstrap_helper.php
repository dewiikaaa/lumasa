<?php

function alert($type, $title, $message)
{
	$tpl = '
	<div class="alert alert-%type% alert-dismissible fade show" role="alert">
	  <strong>%title%!</strong> %message%
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>';

	return str_replace(
		[
			'%type%',
			'%title%',
			'%message%',
		],
		[
			$type,
			$title,
			$message,
		],
		$tpl
	);
}

function active($a, $b)
{
	return $a === $b;
}

function activeClass($a, $b, $class = 'active')
{
	return active($a, $b) ? $class : '';
}