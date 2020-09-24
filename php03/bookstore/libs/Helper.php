<?php
class Helper
{
	public static function randomString($length = 8)
	{
		$arrCharacter = array_merge(range('a', 'z'), range(0, 9), range('A', 'Z'));
		$arrCharacter = implode('', $arrCharacter);
		$arrCharacter = str_shuffle($arrCharacter);

		$result       = substr($arrCharacter, 0, $length);
		return $result;
	}

	// Create Selectbox
	public static function cmsSelectbox($name, $arrValue, $keySelect = 'default', $class = null, $style = null, $id = null, $dataID = null)
	{
		$id     = ($id != null) ? 'id="' . $id . '"' : '';
		$dataID = ($dataID != null) ? 'data-id="' . $dataID . '"' : '';
		$name   = ($name != null) ? 'name="' . $name . '"' : '';
		$class  = ($class != null) ? 'class="' . $class . '"' : '';
		$style  = ($style != null) ? 'style="' . $style . '"' : '';

		$xhtml = "<select $name $id $class $style $dataID>";
		// if (!empty($arrData)) {
			foreach ($arrValue as $key => $value) {
				if ($key == $keySelect && is_numeric($keySelect)) {
					// if ($key == $keySelect) {
					$xhtml .= "<option selected='selected' value = $key>$value</option>";
				} else {
					$xhtml .= "<option value = $key>$value</option>";
				}
			}
		// }

		$xhtml .= '</select>';
		return $xhtml;
	}

	// Create Button
	public static function cmsButton($typeButton, $lblName, $id, $type = null, $class = null, $link = null, $value = null, $classIcon = null)
	{
		$xhtml = '';
		if ($typeButton == 'add') {
			$xhtml .= '<a href="' . $link . '" class="' . $class . '"><i class="' . $classIcon . '"></i>' . $lblName . '</a>';

			} else if ($typeButton == 'noIcon') {
				$xhtml .= '<a href="#" onclick="javascript:submitForm(\'' . $link . '\');" class="' . $class . '">' . $lblName . '</a>';

			} elseif ($typeButton == 'apply') {
				$xhtml = '
				<button id="' . $id . '" class="' . $class . '">' . $lblName . '
					<span class="badge badge-pill badge-danger navbar-badge"></span>
				</button>
				';
				
			} elseif ($typeButton == 'button') {
				$xhtml = '<button type="' . $type . '" class="' . $class . '" id="' . $id . '" name="' . $id . '" value="' . $value . '">' . $lblName . '</button>';
		}
		return $xhtml;
	}

	// Create Input
	public static function cmsInput($type, $name, $id, $class = null, $value = null, $size = null, $style = null, $readonly = null, $dataID=null)
	{
		$strClass	=	($class == null) ? '' : "class='$class' $readonly";
		$strValue	=	($value == null) ? '' : "value='$value'";
		$strSize	=	($size == null) ? '' : "size='$size'";
		$strStyle	=	($style == null) ? '' : "style='$style'";

		$dataID = ($dataID == null) ? '' : 'data-id="' . $dataID . '"';

		$xhtml 		= "<input type='$type' name='$name' id='$id' $strClass $strValue $strSize $strStyle $dataID>";
		return $xhtml;
	}

	public static function cmscheckAll($input)
	{
		$xhtml = '
		<div class="custom-control custom-checkbox">
			'.$input.'
			<label for="check-all" class="custom-control-label"></label>
		</div>
		';
		return $xhtml;
	}

	// Create Row - ADMIN
	public static function cmsRowForm($lblName, $input, $submit = false, $forLabel, $classLabel)
	{
		if ($submit == false) {
			$xhtml = '
			<div class="form-group row">
				<label for="' . $forLabel . '" class="' . $classLabel . '">' . $lblName . '</label>
				<div class="col-xs-12 col-sm-8">
					' . $input . '
				</div>
			</div>
			';
		} else {
			$xhtml = '<div class="form-group row">' . $input . '</div>';
		}
		return $xhtml;
	}

	// Formate Date
	public static function formatDate($format, $value)
	{
		$result = '';
		if (!empty($value)) {
			$result = date($format, strtotime($value));
		}
		return $result;
	}

	// HighLight Search Value
	public static function highLight($searchValue, $input)
	{
		$result = $input;
		if ($searchValue != '') {
			$result = preg_replace("/" . preg_quote($searchValue, "/") . "/i", "<mark>$0</mark>", $input);
		}
		return $result;
	}

	// Create Title sort
	public static function cmsLinkSort($name, $column, $columnPost, $orderPost)
	{
		$order	= ($orderPost == 'desc') ? 'asc' : 'desc';
		if ($column == $columnPost) {
			$img	= '<img style="width: 30px;" src="' . TEMPLATE_URL . 'admin/adminlte/images/sort-' . $orderPost . '.png">';
		}
		$xhtml = '<a href="#" onclick="javascript:sortList(\'' . $column . '\',\'' . $order . '\')">' . $name . $img . '</a>';
		return $xhtml;
	}

	public static function createNotify($type, $message)
	{
		return ['type' => $type, 'message' => $message];
	}


}
