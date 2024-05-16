<?php
use Carbon\Carbon;
use App\Models\Admin\WebLogs;
use App\Models\Admin\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


/**
 * Write code on Method
 *
 * @return response()
 */


// functions for remove html tags form input filed  created by laukesh 
if (!function_exists('clean_single_input')) {
	function clean_single_input($content_desc)
	{
		//$content_desc = trim($content_desc);
		$content_desc = Str::of($content_desc)->trim();
		$content_desc = str_replace('\'', '', $content_desc);
		$content_desc = str_replace('&lt;script', ' ', $content_desc);
		$content_desc = str_replace('&lt;iframe', ' ', $content_desc);
		$content_desc = str_replace('&lt;script&gt;', '', $content_desc);
		$content_desc = str_replace('&lt;SCRIPT&gt;', '', $content_desc);
		$content_desc = str_replace('&lt;SCRIPT', ' ', $content_desc);
		$content_desc = str_replace('&lt;ScRiPt&gt', '', $content_desc);
		$content_desc = str_replace('&lt;ScRiPt &gt', '', $content_desc);
		$content_desc = str_replace('&lt;IFRAME', ' ', $content_desc);
		$content_desc = str_replace('sleep', '', $content_desc);
		$content_desc = str_replace('waitfor delay', '', $content_desc);
		$content_desc = str_replace('iframe', '', $content_desc);
		$content_desc = str_replace('script', '', $content_desc);
		$content_desc = str_replace('window.', '', $content_desc);
		$content_desc = str_replace('prompt', '', $content_desc);
		$content_desc = str_replace('Prompt', '', $content_desc);
		$content_desc = str_replace('confirm', '', $content_desc);
		$content_desc = str_replace('CONTENT=', '', $content_desc);
		$content_desc = str_replace('HTTP-EQUIV', '', $content_desc);
		$content_desc = str_replace('&lt;meta', '', $content_desc);
		$content_desc = str_replace('&lt;META', '', $content_desc);
		$content_desc = str_replace('data:text/html', '', $content_desc);
		$content_desc = str_replace('document.', '', $content_desc);
		$content_desc = str_replace('url', '', $content_desc);
		$content_desc = str_replace('document.createTextNode', '', $content_desc);
		$content_desc = str_replace('document.writeln', '', $content_desc);
		$content_desc = str_replace('document.write', '', $content_desc);
		$content_desc = str_replace('alert', '', $content_desc);
		$content_desc = str_replace('javascript', '', $content_desc);
		$content_desc = str_replace('DROP', '', $content_desc);
		$content_desc = str_replace('CREATE', '', $content_desc);
		$content_desc = str_replace('onsubmit', '', $content_desc);
		$content_desc = str_replace('onblur', '', $content_desc);
		$content_desc = str_replace('onclick', '', $content_desc);
		$content_desc = str_replace('ondatabinding', '', $content_desc);
		$content_desc = str_replace('ondblclick', '', $content_desc);
		$content_desc = str_replace('ondisposed', '', $content_desc);
		$content_desc = str_replace('onfocus', '', $content_desc);
		$content_desc = str_replace('onkeydown', '', $content_desc);
		$content_desc = str_replace('onkeyup', '', $content_desc);
		$content_desc = str_replace('onload', '', $content_desc);
		$content_desc = str_replace('onmousedown', '', $content_desc);
		$content_desc = str_replace('onmousemove', '', $content_desc);
		$content_desc = str_replace('onmouseout', '', $content_desc);
		$content_desc = str_replace('onmouseover', '', $content_desc);
		$content_desc = str_replace('onmouseup', '', $content_desc);
		$content_desc = str_replace('onprerender', '', $content_desc);
		$content_desc = str_replace('onserverclick', '', $content_desc);
		$content_desc = str_replace('[removed]', '', $content_desc);
		$content_desc = str_replace('A=A', '', $content_desc);
		$content_desc = str_replace('1=1', '', $content_desc);
		$content_desc = str_replace('<', '', $content_desc);
		$content_desc = str_replace('>', '', $content_desc);
		$content_desc = str_replace('< >', '', $content_desc);
		$content_desc = str_replace("<''>", "", $content_desc);
		$content_desc = str_replace("%", "", $content_desc);
		$content_desc = str_replace("'or'", "", $content_desc);
		$content_desc = str_replace("'OR'", "", $content_desc);
		$content_desc = str_replace('"OR"', '', $content_desc);
		$content_desc = str_replace('"or"', '', $content_desc);
		$content_desc = str_replace("'A", "", $content_desc);
		$content_desc = str_replace("A'", "", $content_desc);
		$content_desc = str_replace('"A', '', $content_desc);
		$content_desc = str_replace('A"', '', $content_desc);
		$content_desc = str_replace("'1", "", $content_desc);
		$content_desc = str_replace("1'", "", $content_desc);
		$content_desc = str_replace('"1', '', $content_desc);
		$content_desc = str_replace('1"', '', $content_desc);
		$content_desc = str_replace('(', '', $content_desc);
		$content_desc = str_replace(')', '', $content_desc);
		//$content_desc = str_replace("(", "",$content_desc);
		//$content_desc = str_replace(")", "",$content_desc);
		$content_desc = str_replace('||', '', $content_desc);
		$content_desc = str_replace('|', '', $content_desc);
		$content_desc = str_replace('&&', '', $content_desc);
		$content_desc = str_replace('&', '', $content_desc);
		$content_desc = str_replace(';', '', $content_desc);
		$content_desc = str_replace('%', '', $content_desc);
		$content_desc = str_replace('$', '', $content_desc);
		$content_desc = str_replace('"', '', $content_desc);
		$content_desc = str_replace("'", '', $content_desc);
		$content_desc = str_replace('\"', '', $content_desc);
		$content_desc = str_replace("\'", "", $content_desc);
		$content_desc = str_replace('+', '', $content_desc);
		//$content_desc = preg_replace('#[^\w()/.%\-&]#','',$content_desc);
		//$content_desc = str_replace('LF','',$content_desc);
		$content_desc = str_replace('*', '', $content_desc);
		$content_desc = str_replace("'<", "", $content_desc);
		$content_desc = str_replace("'>", "", $content_desc);
		$content_desc = str_replace("<'", "", $content_desc);
		$content_desc = str_replace("'>'", "", $content_desc);
		$content_desc = str_replace("#40", "", $content_desc);
		$content_desc = str_replace("#41", "", $content_desc);
		//$content_desc = preg_replace("/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s","",$content_desc);

		return $content_desc;

	}

}
if ( ! function_exists('primary_menu')){
	function primary_menu( $cat_id='')
	{
		$selected = "";
		if($cat_id != '')
		{
			if( $cat_id == 0 )
				$selected="selected";
		}

		$returnValue = '<div class="">
							<div class="form-group">
								<select name="parent_id" class="input_class form-control" id="menucategory" autocomplete="off">
									<option value=""> Select </option>
									<option value ="0" '.$selected.'>It is Root Category</option>';
			
			$whEre = array(	
							'parent_id'			=> 0
						);
			$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
			foreach($nav_query as $row)
			{
				$selected = "";
				if($cat_id != '')
				{
					if($row->id == $cat_id)
						$selected="selected";
				}
				$returnValue .= '<option value="'.$row->id.'" '.$selected.'><strong>'.$row->title.'</strong></option>';

                                $returnValue .= cat_build_child_one($row->id,  $tempReturnValueAnother='', $cat_id);
			}
		$returnValue .=    		'</select>
							</div>
						</div>';

		return $returnValue;
	}
	
}
if ( ! function_exists('cat_build_child_one'))
{
	function cat_build_child_one($parent_id, $tempReturnValue, $cat_id)
	{
            
		$tempReturnValue .= $tempReturnValue;
		$whEre = array(	
						'parent_id'			=> $parent_id
						);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach($nav_query as $row)
		{
			$selected = "";
			if($cat_id != '')
			{
				if($row->id == $cat_id)
					$selected="selected";
			}
			$tempReturnValue .= '<option value="'.$row->id.'" '.$selected.'><strong>&nbsp;--&nbsp;'.$row->title.'</strong></option>';
			$tempReturnValue .= build_child_two($row->id, $tempReturnValueAnother='', $cat_id);
		}

		return $tempReturnValue;
	}
}
if ( ! function_exists('build_child_two'))
{
	function build_child_two($parent_id, $tempReturnValue, $cat_id)
	{
            
		$tempReturnValue .= $tempReturnValue;
		$whEre = array(	
						'parent_id'			=> $parent_id
						);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach($nav_query as $row)
		{
			$selected = "";
			if($cat_id != '')
			{
				if($row->id == $cat_id)
					$selected="selected";
			}
			$tempReturnValue .= '<option value="'.$row->id.'" '.$selected.'><strong>&nbsp;---&nbsp;'.$row->title.'</strong></option>';
			$tempReturnValue .= build_child_three($row->id, $tempReturnValueAnother='', $cat_id);
		}

		return $tempReturnValue;
	}
}
if ( ! function_exists('build_child_three'))
{
	function build_child_three($parent_id, $tempReturnValue, $cat_id)
	{
            
		$tempReturnValue .= $tempReturnValue;
		$whEre = array(	
						'parent_id'			=> $parent_id
						);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach($nav_query as $row)
		{
			$selected = "";
			if($cat_id != '')
			{
				if($row->id == $cat_id)
					$selected="selected";
			}
			$tempReturnValue .= '<option value="'.$row->id.'" '.$selected.'><strong>&nbsp;---&nbsp;'.$row->title.'</strong></option>';
			//$tempReturnValue .= build_child_two($row->id, $tempReturnValueAnother='', $menu_positions);
		}

		return $tempReturnValue;
	}

}
if (!function_exists('check_menu')) {
	function check_menu($pid)
	{

		$fetchResult = DB::table('menus')->where('parent_id', $pid)->exists();
		return $fetchResult;

	}
}
if (!function_exists('get_status')) {
	function get_status()
	{

		$status = array(
			'1' => "Draft",
			'2' => "Approval",
			'3' => "Publish"
		);
		return $status;
	}
}
if (!function_exists('get_types')) {
	function get_types()
	{
		$fetchResult = DB::table('menus')->where('type', 'Gallery')->get();
		return $fetchResult;
	}
}
?>