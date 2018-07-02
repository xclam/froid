<?php 

namespace App\Services;

use Collective\Html\FormFacade as Form;

class HtmlBuilder extends \Collective\Html\HtmlBuilder {


	public function modelTable(\Illuminate\Database\Eloquent\Collection $model, $fields = [])
	{
		if (sizeof($fields) <= 0) {
			return 0;
		}
		
		// dd($fields);
		
		$html = '<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">'.Form::checkbox( 'all', 1, false, ['data-onclick'=>'toggle_check'] ).'</th>';
					
		foreach($fields as $field){
			$html .= '<th scope="col">'.$field['label'].'</th>';
		}
					
		$html .= '</tr>
			</thead>
			<tbody>';
			
		foreach($model as $m){

			$html .= '<tr>
					<th scope="row"><input type="checkbox" name="'.strtolower(class_basename($m)).'_'.$m->id.'" value="'.$m->id.'" /></th>';
			foreach($fields as $field){
				if( isset($field['object']) )
						$val = $m->{$field['object']}->{$field['slug']};
				else
						$val = $m->{$field['slug']};
				$html .='<td data-href="'.strtolower(class_basename($m)).'/'.$m->id.'" class="clickable">'.$val.'</td>';
			}	
			$html .= '</tr>';
		}
		$html .= '</tbody>
			</table>';
			
		return $this->toHtmlString($html);
	}

}