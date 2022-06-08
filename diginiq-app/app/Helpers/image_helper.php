<?php

function post_data($field, $data = false)
{
	$default = is_array($data) && isset($data[$field]) ? $data[$field] : (is_string($data) || is_numeric($data) ? $data : '');
	return old($field, $default);
}

function checked_data($field, $val, $data = false)
{
	$default = is_array($data) && isset($data[$field]) ? $data[$field] : (is_string($data) || is_numeric($data) ? $data : '');
	return old($field, $default) === $val ? 'checked' : '';
}

function multichecked_data($field, $val, $data = false)
{
	$list = [];

	if (is_array($data) && isset($data[$field]))
	{
		$list = explode(',', $data[$field]);
	}

	return in_array($val, $list) ? 'checked' : '';
}

function is_file_exist($file, $path)
{
	$exist = false;

	if (filter_var($file, FILTER_VALIDATE_URL))
	{
		$exist = @fopen($file, 'r');
	}
	else
	{
		$exist = is_file($path . $file);
	}

	return $exist;
}

function file_url($file, $path)
{
	if (filter_var($file, FILTER_VALIDATE_URL))
	{
		return $file;
	}

	return empty($file) ? $file : base_url($path . $file);
}

function remove_file($file, $path)
{
	if (filter_var($file, FILTER_VALIDATE_URL))
	{
		if (stripos($file, base_url()) != -1)
		{
			$file = str_replace(base_url() . '/', FCPATH, $file);

			if (is_file($file))
			{
				unlink($file);
			}
		}
	}
	else
	{
		if (is_file($path . $file))
		{
			unlink($path . $file);
		}
	}
}

// duplicate file and return new duplicate filename
function clone_file($file, $path)
{
	if (filter_var($file, FILTER_VALIDATE_URL))
	{
		if (stripos($file, base_url()) != -1)
		{
			$file = str_replace(base_url() . '/', FCPATH, $file);

			if (is_file($file))
			{
				$filename    = explode('.', basename($file));
				$newFilename = ($filename[0] . '_' . uniqid() . '.' . $filename[1]);

				$newFile = str_replace($filename[0], $newFilename, $file);

				copy($file, $newFile);

				return str_replace(FCPATH, base_url(), $newFile);
			}
		}

		return $file;
	}
	else
	{
		if (is_file($path . $file))
		{
			$filename    = explode('.', $file);
			$newFilename = ($filename[0] . '_' . uniqid() . '.' . $filename[1]);

			copy($path . $file, $path . $newFilename);

			return $newFilename;
		}

		return $file;
	}
}