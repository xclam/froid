<?php

namespace App\Helpers;

use \Collective\Html\FormBuilder;

class FormHelper extends FormBuilder
{


    public function switchbox($name, $value = null, $options = array())
    {
		return '<label class="switch">' . $this->input('checkbox', $name, $value, $options) . '<span class="slider round"></span></label>';
    }
}