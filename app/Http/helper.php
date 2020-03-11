<?php

use App\User;

function getAssignStaff($supervisor_id){

	$supervisor = User::findOrFail($supervisor_id);

	return $supervisor->appraisee_assign;
}
function appraisalInputText($question, $id, $appraial_ans, $submit = 0){

	if(null == $appraial_ans){
		return '
	<tr>
		<td>
			<div class="form-group">
		            <p class="form-control-static" style="padding-left:35px"><span>'.$id.'.</span> &nbsp;&nbsp;&nbsp;&nbsp;'.$question.'</p>
		    </div>
		</td>
		<td>
			<div class="form-group form-number-textarea-padding" >
		            <input type="number" name="rank['.$id.']" class="form-control" placeholder="rating" value="'.old('rank')[$id].'">
		    </div>
		</td>
		<td>
			<div class="form-group form-number-textarea-padding" >
		            <textarea name="comment['.$id.']" class="form-control" placeholder="Comment">'.old('comment')[$id].'</textarea>
		    </div>
		</td>
	</tr>
';
	}else{

		if($submit == 0){

			$build = '
			<tr>
				<td>
					<div class="form-group">
				            <p class="form-control-static" style="padding-left:35px"><span>'.$id.'.</span> &nbsp;&nbsp;&nbsp;&nbsp;'.$question.'</p>
				    </div>
				</td>
				<td>
					<div class="form-group form-number-textarea-padding" >
				            <input type="number" name="rank['.$id.']" class="form-control" placeholder="rating" ';
			if(!empty(old('rank')[$id])){
				$build .= 'value="'.old('rank')[$id].'"';
			}else{
				$build .= 'value="'.$appraial_ans[$id]['rank'].'"';
			}

			 $build .= '>
				    </div>
				</td>
				<td>
					<div class="form-group form-number-textarea-padding" >
				            <textarea name="comment['.$id.']" class="form-control" placeholder="Comment">';
			if(!empty(old('comment')[$id])){
				$build .= old('comment')[$id];
			}else{
				$build .= $appraial_ans[$id]['comment'];
			}

			$build .= '</textarea>
				    </div>
				</td>
			</tr>
		';
		}else{

			$build = '
			<tr>
				<td>
					<div class="form-group">
				            <p class="form-control-static" style="padding-left:35px"><span>'.$id.'.</span> &nbsp;&nbsp;&nbsp;&nbsp;'.$question.'</p>
				    </div>
				</td>
				<td>
					<div class="form-group " >
				            <p class="form-control-static">'.$appraial_ans[$id]['rank'].'</p>
				    </div>
				</td>
				<td>
					<div class="form-group " >
				            <p class="form-control-static">'.$appraial_ans[$id]['comment'].'</p></textarea>
				    </div>
				</td>
			</tr>
		';

		}

		return $build;
	}
}

function appraisalSection3($question, $name, $appraial_ans){

	if($appraial_ans->submit == 0){
	$build = '
	<tr>
		<td>
			<div class="form-group"> 
		            <p class="form-control-static" style="padding-left:35px">'.$question.'</p>
		    </div>
		</td>
		<td>
			<div class="form-group form-number-textarea-padding" >
		            <textarea name="'.$name.'" class="form-control" placeholder="Comment">';
	if(!empty(old($name))){
		$build .= old($name);
	}else{
		$build .= $appraial_ans->$name;
	}

	$build .= '</textarea>
		    </div>
		</td>
	</tr>
';
}else{

	$build = '
			<tr>
				<td>
					<div class="form-group"> 
			            <p class="form-control-static" style="padding-left:35px">'.$question.'</p>
			    	</div>
				</td>
				<td>
					<div class="form-group " >
				            <p class="form-control-static">'.$appraial_ans->$name.'</p></textarea>
				    </div>
				</td>
			</tr>
		';

}

return $build;
}

function ordinal($count)
{
    $number = $count > 0 ? $count : $count + 1;
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

function percentage($num, $den){
	$amount_div = ($num / $den);

	$amount = $amount_div > 0 ? $amount_div : 0;
	return number_format(($amount * 100), 2 );
}


?>