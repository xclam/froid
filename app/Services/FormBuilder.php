<?php 

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class FormBuilder extends \Collective\Html\FormBuilder {

    public function switchbox($name, $value = 1, $checked = null, $options = array())
    {
		return $this->toHtmlString('<label class="switch">' . $this->checkbox( $name, $value, $checked, $options) . '<span class="slider round"></span></label>');
    }

}