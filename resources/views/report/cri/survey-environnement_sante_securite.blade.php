
<table cellspacing="0" border="0" width="100%">
	<tr>
		<td align="center" >QUESTIONS</td>
		<td align="center">NON</td>
		<td align="center">OUI</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_epi">1- Le port des EPIs (&eacute;quipements de protection individuels) est il respect&eacute; ?
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_epi" id="yn_epi" @if(isset($report) && $report->yn_epi) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_outil">2- L'outillage est il conforme et appropri&eacute; &agrave; l'intervention ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_outil" id="yn_outil" @if(isset($report) && $report->yn_outil) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_plan">3- Le plan de pr&eacute;vention est absent alors qu'il est necessaire ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_plan" id="yn_plan" @if(isset($report) && $report->yn_plan) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_danger">4- L'acc&egrave;s est il dangereux ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_danger" id="yn_danger" @if(isset($report) && $report->yn_danger) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_risk">5- Existe t'il un risque autour de l'unit&eacute; ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_risk" id="yn_risk" @if(isset($report) && $report->yn_risk) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_work_height">6- Le travail en hauteur comporte t'il des risques ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_work_height" id="yn_work_height" @if(isset($report) && $report->yn_work_height) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_confined">7- S'agit il d'un espace confin&eacute; ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_confined" id="yn_confined" @if(isset($report) && $report->yn_confined) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_isolated">8- L'intervenant est il isol&eacute; ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_isolated" id="yn_isolated" @if(isset($report) && $report->yn_isolated) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td valign=middle>
			<label for="yn_waste">9- L'enlevement des deschets n'est il pas g&eacute;rable ?</label>
		</td>
		<td align="center" valign=middle colspan=2>
			<label class="switch">
				<input type="checkbox" name="yn_waste" id="yn_waste" @if(isset($report) && $report->yn_waste) checked @endif)>
				<span class="slider round"></span>
			</label>
		</td>
	</tr>
</table>	
<div id="comment_if_needed">
	<textarea name="comment_if_needed">@if(isset($report)) {{$report->comment_if_needed}} @endif</textarea>
</div>