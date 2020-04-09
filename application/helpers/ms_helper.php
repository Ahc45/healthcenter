<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('active_nav') ) {
 function active_nav($controller="", $maintain_controller = false)
	{
		$CI =& get_instance();
		$current = $CI->uri->uri_string();
		return ( $current == $controller  ) ? "active" : '';
	}
}


if ( ! function_exists('assets') ) {
 function assets($type, $file_name, $sub_folder="")
	{
		return $url = base_url() . $type . "/" . $file_name;
	}
}

// ============================== //>
// THUMBNAIL HELPER
// ============================== //>

function thumb($image_path, $width, $height) {
	
	// Get the CodeIgniter super object
	$CI = &get_instance();

	// get file extension
	$file = explode(".", $image_path);
	$ext = array_pop($file);
	$file_name = array_shift($file);
	$file_name = str_replace(dirname($image_path) . "/", "", $file_name);

	// Path to image thumbnail
	$image_thumb = dirname($image_path) . '/' . $file_name . "-" . $height . '-' . $width . "." . $ext;

	if (!file_exists($image_thumb)) {
		
		// LOAD LIBRARY
		$CI->load->library('image_lib');

		// CONFIGURE IMAGE LIBRARY
		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_path;
		$config['new_image'] = $image_thumb;
		$config['maintain_ratio'] = true;
		$config['master_dim'] = "width";
		
		if ($height > $width) {
			$config['master_dim'] = "height";
		}

		$config['width'] = $width;
		$config['height'] = $height;

		$CI->image_lib->initialize($config);
		$CI->image_lib->resize();
		$CI->image_lib->clear();

		// get our image attributes
		list($original_width, $original_height, $file_type, $attr) = getimagesize($image_thumb);

		// set our cropping limits.
		$crop_x = ($original_width / 2) - ($width / 2);
		$crop_y = ($original_height / 2) - ($height / 2);
		
		// initialize our configuration for cropping
		$config['source_image'] = $image_thumb;
		$config['new_image'] = $image_thumb;
		$config['x_axis'] = $crop_x;
		$config['y_axis'] = $crop_y;
		$config['maintain_ratio'] = true;

		$CI->image_lib->initialize($config);
		$CI->image_lib->crop();
		$CI->image_lib->clear();
		
	}

	// return dirname( $_SERVER['SCRIPT_NAME'] ) . '/' . $image_thumb;
	return base_url() . $image_thumb;

}

function thumb_moo($image_path, $width, $height, $method = 'resize_crop')
{
	// Get the CodeIgniter super object
	$CI = &get_instance();

	// get file extension
	$file = explode(".", $image_path);
	$ext = array_pop($file);
	$file_name = array_shift($file);
	$file_name = str_replace(dirname($image_path) . "/", "", $file_name);

	// Path to image thumbnail
	$image_thumb = dirname($image_path) . '/' . $file_name . "-" . $height . '-' . $width . "." . $ext;

	if (!file_exists($image_thumb)) {
		
		// LOAD LIBRARY
		$CI->load->library('image_moo');

		$CI->image_moo
			->load($image_path)
			->$method($width,$height)
			->set_jpeg_quality(90)
			->save($image_thumb);

		if($CI->image_moo->display_errors()){
			print $CI->image_moo->display_errors();
		}
	}
	return base_url() . $image_thumb;
}

function get_file_name($filepath)
{
	if ( $filepath !=null ) {
		$file = explode(".", $filepath);
		$ext = array_pop($file);
		$file_name = array_shift($file);
		$file_name = str_replace(dirname($filepath) . "/", "", $file_name);
		return $file_name . '.' . $ext;
	}
}


if ( !function_exists('get_image') ) {
	function get_image($image_path, $size)
	{
		$full_image_path = base_url($image_path);
		$file = explode(".", $full_image_path);
		$ext = array_pop($file);
		// $file_name = array_shift($file);
		// $file_name = str_replace(dirname($full_image_path) . "/", "", $file_name);
		$path = parse_url($image_path, PHP_URL_PATH);  
		$file_name = basename($path, '.' . $ext);
		
		$dirname_path = dirname($full_image_path);
			
		switch ($size) {
			case 'thumbnail':
				$output = $dirname_path . '/' . $file_name . "-150-150." . $ext;
				// return ( read_file($output) ) ? $output : $full_image_path;
				return $output;
				break;
			case 'normal':
				$output = $dirname_path . '/' . $file_name . "-510-825." . $ext;
				// return ( read_file($output) ) ? $output : $full_image_path;
				return $output;
				break;
			case 'medium':
				$output = $dirname_path . '/' . $file_name . "-200-300." . $ext;
				// return ( read_file($output) ) ? $output : $full_image_path;
				return $output;
				break;
			case 'large':
				$output = $dirname_path . '/' . $file_name . "-800-1200." . $ext;
				// return ( read_file($output) ) ? $output : $full_image_path;
				return $output;
				break;
			case 'avatar_crop':
				$output = $dirname_path . '/' . $file_name . "-300-500." . $ext;
				// return ( read_file($output) ) ? $output : $full_image_path;
				return $output;
				break;
			case 'avatar':
				$output = $dirname_path . '/' . $file_name . "-avatar." . $ext;
				// return ( read_file($output) ) ? $output : $full_image_path;
				return $output;
				break;
			default:
				return $full_image_path;
				break;
		}
	}
}

// ============================== //>
// FORM HELPER
// ============================== //>

if (!function_exists('_form_common'))
{
	function _form_common($type='', $data='', $value='', $label='', $extra='', $error_msg = '', $label_class = '', $input_wrap_class = '' )
	{
		$defaults = array('type' => $type, 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		$highlight = '';
		$label_tpl = '';
		// If name is empty at this point, try to grab it from the $data array
		if (empty($defaults['name']) && is_array($data) && isset($data['name']))
		{
			$defaults['name'] = $data['name'];
			unset($data['name']);
		}

		if (form_error($defaults['name'])){
			$highlight = "has-error";
		}
		if ( $label !=null ) {
			$label_tpl = '<label class="control-label '.$label_class.'" for="'.$defaults['name'].'">'.$label.'</label>';
		}

		$output = _parse_form_attributes($data, $defaults);

		$output = <<<EOL

	<div class="form-group {$highlight}">
		{$label_tpl}
		<div class="{$input_wrap_class}">
			<input {$output} {$extra} id="{$defaults['name']}" />
		 	<span class="help-block"> {$error_msg} </span>
		</div>
	</div>

EOL;

		return $output;
	}
}

//--------------------------------------------------------------------

if (!function_exists('my_form_input'))
{
	function my_form_input($data='', $value='', $label='', $extra='', $error_msg = '', $label_class = '', $input_wrap_class = '' )
	{
		return _form_common('text', $data, $value, $label, $error_msg, $extra, $label_class, $input_wrap_class);
	}
}



// ============================== //>
// SESSION, POST, GET
// ============================== //>

if (!function_exists('session'))
{
	function session($item){ 
		$CI =&get_instance();
		return $CI->session->userdata($item); 
	}
}

if (! function_exists('post')) {
	function post($post, $clean = false){
		$CI =&get_instance();
		$input_post = $CI->input->post($post, $clean);
		return ( empty($input_post) ) ? '' : $input_post;	
	}
}

if (! function_exists('get')) {
	function get($get){
		$CI =&get_instance();
	    return $CI->input->get($get, true);	
	}
}


// ============================== //>
// UTILITIES
// ============================== //>

if (!function_exists('format_number'))
{
	function format_number($n = '', $decimal = 0){
		if ($n == '' || $n == 0)
		{
			return 0;
		}

		// Remove anything that isn't a number or decimal point.
		$n = trim(preg_replace('/([^0-9\.])/i', '', $n));
		return number_format($n, $decimal, '.', ',');
	}
}


if (!function_exists('set_meta'))
{
	function set_meta ( $attach_id, $params = null, $serialize = false, $meta_id = 0 ){
		$CI =&get_instance();
		if ( $attach_id != 0 ) {

			$meta_data = array(
				'tb_id' => $attach_id,
				'key' => (array_key_exists('key', $params)) ? $params['key'] : '',
				'value' => (array_key_exists('value', $params)) ? $params['value'] : '',
				'type' => (array_key_exists('type', $params)) ? $params['type'] : '',
				'created' => date('Y-m-d H:i:s'),
				'modified' => date('Y-m-d H:i:s'),
			);

			if ( $serialize ) {
				$meta_data['value'] = (array_key_exists('value', $params)) ? serialize($params['value']) : '';
			}

			if ( $meta_id ) {
				$CI->db->where('id', $meta_id);
				$CI->db->update('meta', $meta_data);
			}else{
		 		return $CI->db->insert('meta', $meta_data);
			}
		}
	}
}

if (!function_exists('get_meta'))
{
	function get_meta ( $attach_id, $key, $type, $single = 1, $limit = null){
		$CI =&get_instance();
		if ( $attach_id != 0 ) {
			
			$CI->db->select('value');
			$CI->db->where('tb_id', $attach_id);
			$CI->db->where('key', $key);
			$CI->db->where('type', $type);
				
			$CI->db->order_by('created', 'desc');

			if ( $limit !=null ) {
				$CI->db->limit($limit);
			}
			if ( $single === 1 ) {
				$method = 'row';
			}elseif ( $single === 0 ) {
				$method = 'result';
			}else{
				$method = 'row';
			}

			$q = $CI->db->get('meta');
	 		return $q->$method();
		}
	}
}

if (!function_exists('add_post_count'))
{
	function add_post_count ( $attach_id ){
		$CI =&get_instance();

		if ( $attach_id != 0 ) {

			$meta = check_post_count($attach_id);

			if ( $meta ) {

				$count = (int)$meta->value + 1;
				set_meta($attach_id, array(
					'key' => 'post_count',
					'value' => $count,
					'type' => 'page',
				), false, $meta->id);

			}else{

				set_meta($attach_id, array(
					'key' => 'post_count',
					'value' => 1,
					'type' => 'page',
				), false);

			}
		}
	}
}

if (!function_exists('check_post_count'))
{
	function check_post_count ( $attach_id ){
		$CI =&get_instance();
		if ( $attach_id != 0 ) {
			$CI->db->select('value, id');
			$CI->db->where('tb_id', $attach_id);
			$CI->db->where('key', 'post_count');
			$CI->db->where('type', 'page');
			$q = $CI->db->get('meta');
			if ( $q->num_rows() != 0 ) {
				return $q->row();
			}
			return false;
		}
	}
}

// ============================== //>
// ATTACHMENTS
// ============================== //>

if (!function_exists('get_media'))
{
	function get_media ( $attach_id, $for, $params = null ){
		$CI =&get_instance();
		if ( $attach_id != 0 ) {
			
			$CI->db->select('*');
	 		$CI->db->where('attach_id', $attach_id);
	 		$CI->db->where('attachment_for', $for);
	 		$CI->db->order_by('id', 'desc');
	 		if ( $params !=null && array_key_exists('limit', $params) ) {
	 			$CI->db->limit($params['limit']);
	 		}

	 		$q = $CI->db->get('media');
	 		return $q->result_array();
		}
	}
}


// ============================== //>
// SCRIPT HELPER
// ============================== //>
if (!function_exists('load_assets'))
{
	function load_assets ( $type, $scripts = array(), $production = FALSE ){
		$CI =&get_instance();

		$CI->load->helper('string');
		$random_string = random_string('numeric');
	     // $random_string = '07-28-19-v15';

		$paths = array(
			'js' => array(
				
				'session_out' => assets('js', 'session-out.js?v=') . $random_string,
			),
			'css' => array(
				'datatables'=> assets('assets','bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'),
				'bootstrap' => assets('css', 'bootstrap.css'),
				'datepicker' => assets('css', 'bootstrap-datepicker.min.css'),
				'quill' => assets('css', 'quill.base.css'),
				'chartjs' => assets('css', 'Chart.min.css'),
				'nouislider' => assets('css', 'nouislider.css'),
				'slick' => assets('css', 'slick.css'),
				'slick_theme' => assets('css', 'slick-theme.css'),
				'color_picker' => assets('css', 'bootstrap-colorpicker.min.css'),
				'fullpage' => assets('css', 'jquery.fullpage.min.css'),
				'selectize' => assets('css', 'selectize.css'),
				'ktypeahead' => assets('css', 'ktypeahead.css'),
				'session' => assets('css', 'session.css?v=') . $random_string,
				'session_out' => assets('css', 'session-out.css?v=') . $random_string,
				'ionicons' => assets('css', 'ionicons.min.css'),
				'jcrop' => assets('css', 'jquery.Jcrop.min.css'),
				'jquery_ui' => assets('css', 'jquery-ui.min.css'),
				'chartist' => assets('css', 'chartist.min.css'),
				'cropper' => assets('css', 'cropper.css'),
				'media' => assets('css', 'media.css'),
				'videocss' => 'https://vjs.zencdn.net/5.16.0/video-js.css',
				'main' => assets('css', 'main.css?v=')  . $random_string,
				'main_t1' => assets('css', 'main-t1.css'),
				'welcome' => assets('css', 'welcome.css?v=') . $random_string,
				'welcome_t1' => assets('css', 'welcome-t1.css'),
				'welcome_t3' => assets('css', 'welcome_t3.css'),
				'smartform' => assets('css', 'smartform.css?v=') . $random_string,
			),
		);

		$js_str = '';
		$css_str = '';

		if ( count($scripts) && array_key_exists('css', $scripts) && !empty($scripts['css']) ) {
			foreach ($paths['css'] as $i => $val) {
				if ( in_array($i, $scripts['css']) ) {
					$css_str .= '<link rel="stylesheet" href="'.$val.'">' . "\n";
				}
			}
		}

		if ( count($scripts) && array_key_exists('js', $scripts) && !empty($scripts['js']) ) {
			foreach ($paths['js'] as $i => $val) {
				if ( in_array($i, $scripts['js']) ) {
					$js_str .= "<script src=" . $val . "></script>\n";
				}
			}
		}

		if ( $type == "css" ) {
			return $css_str;
		}
		elseif ( $type == "js" ) {
			return $js_str;
		}else{
			return false;
		}

	}
}


if (!function_exists('kb_to_mb'))
{
	function kb_to_mb ( $kb, $decimal = 2 ){		
		return format_number($kb * 0.001, $decimal);
	}
}


if (!function_exists('get_file_icon'))
{
	function get_file_icon ( $file_type ){
		
		$image = '';
		if ( $file_type == "image/jpeg" ) {
			$image = '<img src="'. base_url('img/webart/svg/file-picture.svg') .'" class="icon-placeholder">';			
		}
		elseif ( $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ) {
			$image = '<img src="'. base_url('img/webart/svg/file-excel.svg') .'" class="icon-placeholder">';
		}
		elseif ( $file_type == "application/pdf" ) {
			$image = '<img src="'. base_url('img/webart/svg/file-pdf.svg') .'" class="icon-placeholder">';
		}
		elseif ( $file_type == "application/x-rar" || $file_type == "application/x-zip" ) {
			$image = '<img src="'. base_url('img/webart/svg/file-zip.svg') .'" class="icon-placeholder">';
		}
		elseif ( $file_type == "video/mp4" || $file_type == "video/quicktime" ) {
			$image = '<img src="'. base_url('img/webart/svg/file-video.svg') .'" class="icon-placeholder">';
		}
		else{
			$image = '<img src="'. base_url('img/webart/svg/file-empty.svg') .'" class="icon-placeholder">';
		}

		return $image;

	}
}

if (!function_exists('get_author'))
{
	function get_author ( $id ){
		$CI =&get_instance();

		if ( $id != 0) {
			$CI->db->where('id', $id);
			$CI->db->select('first_name, last_name, username, email');
			$q = $CI->db->get('users', 1);
			return $q->row();
		}
	}
}

if (!function_exists('full_url')) {
	function full_url()
	{
	    $CI =& get_instance();

	    $url = $CI->config->site_url($CI->uri->uri_string());
	    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
	}
}





// ============================== //>
// PAGE HELPER
// ============================== //>

if (!function_exists('get_child_pages')) {
	function get_child_pages($params)
	{
	    $CI =& get_instance();
	    $CI->db->where('parent', $params['parent']);
	    $CI->db->order_by('order', 'asc');
	    // $CI->db->where('type', $params['parent']);
	    
	    if ( array_key_exists('limit', $params) && array_key_exists('offset', $params) ) {
	    	$CI->db->limit($params['limit'], $params['offset']);
	    }

	    $q = $CI->db->get('pages');

	    return $q->result();
	}
}

// ============================== //>
// IMAGE ASPECT RATIO CLASS
// ============================== //>

if (!function_exists('get_aspect_ratio_class')) {
	function get_aspect_ratio_class($aspect_ratio)
	{
	 	switch ($aspect_ratio) {
	 		case 'Auto':
	 			return "ar-auto";
	 			break;
	 		case '1:1 Square':
	 			return "ar-square";
	 			break;
	 		case '3:2 Standard':
	 			return "ar-standard";
	 			break;
	 		case '2:3 Standard (Vertical)':
	 			return "ar-standard-vertical";
	 			break;
	 		case '4:3 Four-Three':
	 			return "ar-four-three";
	 			break;
	 		case '3:4 Three-Four (Vertical)':
	 			return "ar-three-four-vertical";
	 			break;
	 		case '16:9 Widescreen':
	 			return "ar-widescreen";
	 			break;
	 		case '2.40 Anamorphic Widescreen':
	 			return "ar-anomorphic-widescreen";
	 			break;
	 		default:
	 			return '';
	 			break;
	 	}
	}
}



if (!function_exists('get_total')) {
	function get_total($params)
	{
	    $CI =& get_instance();

	    $CI->db->select_sum('data');

	    if ( array_key_exists('id', $params) && $params['id'] !=0 ) {
	    	$CI->db->where('id', $params['id']);
	    }

	    if ( array_key_exists('parent_id', $params) && $params['parent_id'] !=0 ) {
	    	$CI->db->where('parent_id', $params['parent_id']);
	    	$CI->db->group_by('parent_id');
	    }
	    if ( array_key_exists('pulse_id', $params) && $params['pulse_id'] !=0 ) {
	    	$CI->db->where('pulse_id', $params['pulse_id']);
	    	$CI->db->group_by('pulse_id');
	    }
	    if ( array_key_exists('slant', $params) ) {
	    	$CI->db->where('slant', $params['slant']);
	    }

	    $q = $CI->db->get('pulse_content');

	    if ( $q->num_rows() !=0 ) {
			$q_arr = $q->row();	    	
			return $q_arr->data;
	    }

	    
	}
}

if (!function_exists('get_question_choices')) {	
	
	function get_question_choices($q_id)
	{

		$CI =& get_instance();

		$CI->load->model('questions_m');

		$questions_params = array(
			'id' => $q_id,
			'order_by'=> 'order',
			'ob'=> 1,
			'select' => 'type, metadata'
		);
		return $CI->questions_m->get_questions($questions_params)->row();

	}	
}




/* End of file ms_helper.php */
/* Location: ./application/helpers/ms_helper.php */