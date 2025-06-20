<?php 
function AssociativeArrayToStr($array, $key_to_concat, $sep) {
	$i = 0;
	$string = "";
	foreach ($array as $key => $values) {
		foreach ($values as $k => $v) {
			if($k == $key_to_concat) {
				if($i == 0)
					$string = $v;
				else
					$string .= $sep .$v;
				$i++;
			}
		}
	}
	return $string;
}

function generateRandomString($length = 10) 
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}

function get_random_number($digits_needed){
    $count=0;
    $random_number = '';
    while ( $count < $digits_needed ) {
        $random_digit = mt_rand(0, 9);
        $random_number .= $random_digit;
        $count++;
    }
    return $random_number;
}

function tj_array_column($assoc_array, $column) {
	$i = 0;
	$return_array = array();
	if (is_array($assoc_array)) {
		foreach ($assoc_array as $array) {
			$return_array[$i] = $array[$column];
			$i++;
		}
	}
	
	return $return_array;
}


function myUrlDecode($string) {
	$entities =     array('!26','!26', '!2A', '!27', '!28', '!29', '!3B', '!3A', '!40', '!3D', '!2B', '!24', '!2C', '!2F', '!3F', '!25', '!23', '!5B', '!5D', '!6A', '!6B');
	$replacements = array("&amp;",'&', '*',   "'",   "(",   ")",   ";",   ":",   "@",    "=",   "+",   "$",   ",",   "/",   "?",   "%",   "#",   "[",   "]",   ' '  , '.' );
	return str_replace($entities, $replacements, $string);
}

function myUrlEncode($string) {
	$replacements =  array('!26', '!26', '!2A', '!27', '!28', '!29', '!3B', '!3A', '!40', '!3D', '!2B', '!24', '!2C', '!2F', '!3F', '!25', '!23', '!5B', '!5D', '!6A', '!6B');
	$entities     =  array('&amp; ','&',   '*',   "'",   "(",   ")",   ";",   ":",   "@",    "=",   "+",   "$",   ",",   "/",   "?",   "%",   "#",   "[",   "]",   ' '  , '.' );
	return str_replace($entities, $replacements, $string);
}

function print_array($array){
	echo "<pre>";
	print_r($array);
	exit;
}

function print_view($array){
    echo "<pre>";
    print_r($array);
}

function getResultArray($Q){
	$data=array();
	if($Q->num_rows()>0){
		foreach($Q->result_array() as $row){
			$data[]=$row;
		}
	}
	return $data;
}

function flatten(array $array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}

function SimpleArray($search_array){
	$data=array();
	foreach($search_array as $row){
		foreach($row as $k => $v)
		$data[]=$v;
	}
	return $data;
}

function getResultArraySimpleArray($Q){
	$data=array();
	if($Q->num_rows()>0){
		foreach($Q->result_array() as $row){
			foreach($row as $k => $v) $data[]=$v;
		}
	}
	return $data;
}

function upto2Decimal($price=''){
   return number_format((float)$price, 2, '.', '');
}

function getCurrentDate() {
	$now = date("Y-m-d h:i:s");
	return $now;
}

function getMonthsDD() {
	$month_array=array(
			'0'=>"Month",
			'1'=>"January",
			'2'=>"February",
			'3'=>"March",
			'4'=>"April",
			'5'=>"May",
			'6'=>"June",
			'7'=>"July",
			'8'=>"August",
			'9'=>"September",
			'10'=>"October",
			'11'=>"November",
			'12'=>"December");
	return $month_array;
}

function getMonthsSmall(){
	$month_array=array(
			'6'=>"Jun",
			'7'=>"Jul",
			'8'=>"Aug",
			'9'=>"Sep",
			'10'=>"Oct",
			'11'=>"Nov",
			'12'=>"Dec",
			'1'=>"Jan",
			'2'=>"Feb",
			'3'=>"Mar",
			'4'=>"Apr",
			'5'=>"May",);
	return $month_array;
}



function findKey($array, $keySearch) {
	foreach ($array as $key => $item) {
		if ($key == $keySearch) {
			return 1;
		} else {
			if (isset($array[$key]))
				findKey($array[$key], $keySearch);
		}
	}
	return 0;
}

function filter_unique_array($arrs, $id) {
    foreach($arrs as $k => $v) 
    {
        foreach($arrs as $key => $value) 
        {
            if($k != $key && $v[$id] == $value[$id])
            {
                 unset($arrs[$k]);
            }
        }
    }
    return $arrs;
}


function copyImage($imageSrc, $imageDest) {
	$src = urldecode($imageSrc);
	$len1 = strlen($src);
	$len2 = strlen(base_url());
	$fpath = substr($src, $len2 - 1, $len1);
	$pathParts = explode('/', $src);
	$oldFileName = $pathParts[count($pathParts) - 1];
	$ext = explode('.',$oldFileName);
	$newFileName = generateRandomCode().'.'.$ext[1];
	$srcCopy = $_SERVER['DOCUMENT_ROOT'].$fpath;
	$destCopy = $_SERVER['DOCUMENT_ROOT'].$imageDest.$newFileName;
	
	$copy = copy($srcCopy, $destCopy);
	unlink($srcCopy);
	if($copy == false) {
		return false;
	}
	return $newFileName;
}

function generateRandomCode() {
	$d=date ("d");
	$m=date ("m");
	$y=date ("Y");
	$t=time();
	$dmt=$d+$m+$y+$t;
	$ran= rand(0,10000000);
	$dmtran= $dmt+$ran;
	$un=  uniqid();
	$dmtun = $dmt.$un;
	$mdun = md5($dmtran.$un);
	$sort=substr($mdun, 16); // if you want sort length code.
	return $mdun;
}

/**
 *
 * Function to make URLs into links
 *
 * @param string The url string
 *
 * @return string
 *
 **/
function makeLink($string, $label){

	/*** make sure there is an http:// on all URLs ***/
	$string = preg_replace("/([^\w\/])(www\.[a-z0-9\-]+\.[a-z0-9\-]+)/i", "$1http://$2",$string);
	/*** make all URLs links ***/
	$string = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i","<a target=\"_blank\" href=\"$1\">.$label.</a>",$string);
	/*** make all emails hot links ***/
	$string = preg_replace("/([\w-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?))/i","<a href=\"mailto:$1\">$1</a>",$string);

	return $string;
}

function highlightkeyword($str, $search) {
    $highlightcolor = "#daa732";
    $occurrences = substr_count(strtolower($str), strtolower($search));
    $newstring = $str;
    $match = array();
 
    for ($i=0;$i<$occurrences;$i++) {
        $match[$i] = stripos($str, $search, $i);
        $match[$i] = substr($str, $match[$i], strlen($search));
        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
    }
 
    $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
    $newstring = str_replace('[@]', '</span>', $newstring);
    return $newstring;
 
}

function whatever($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}

function whatever_return($array, $key, $val) {
	foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return $item;
    return false;
}

function find_key_in_array($array, $key) {
	$result = array();
	foreach ($array as $item){
        if (isset($item[$key])){
            $result[]=$item;
        }
	}
    return $result;
}

function custom_sort($array,$order){ //length of order and array to be same
	usort($array, function ($a, $b) use ($order) {
        $pos_a = array_search($a, $order);
        $pos_b = array_search($b, $order);
        return $pos_a - $pos_b;
    });
    return $array;
}

function sortArrayByArray($array,$orderArray) {
    $ordered = array();
    foreach($orderArray as $key => $value) {
        if(array_key_exists($key,$array)) {
                $ordered[$key] = $array[$key];
                unset($array[$key]);
        }
    }
    return $ordered+$array;
}

function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}

function FindImageURL($image_url='',$imagename=''){
    //$imageurl = $image_url.$imagename;
    //$url=getimagesize($imageurl);
    $imageurl = '';
    list($width, $height, $type, $attr) = getimagesize($_SERVER['DOCUMENT_ROOT'] . '/contourtek/crawled_image/'.$imagename);  
    //echo 'height:'.$width; exit;
    //print_array($_SERVER['DOCUMENT_ROOT']);exit;

    if(isset($width) && $width!=''){
        $imageurl = $image_url.$imagename;//$_SERVER['DOCUMENT_ROOT'] . '/contourtek/crawled_image/'.$imagename;
    }else{
        $imageurl = base_url('assets/images').'/default_img.gif';
    }
    
    return $imageurl;
}

function calc_per($numerator="",$denomenator="",$precision='0'){
    if($denomenator>0){
        $res = round( ($numerator / $denomenator) * 100, $precision );
        return $res;
    }else{
        return 0;
    }
}

function get_product_drpdwn_qty($unit_id=""){
    $array_1000k = array('1','2','3','6'); //1:kg,2:Gram,3:Liter,6:Mili liter
    $array_1pcs = array('4','7'); //4:Piece, 7:Bunch,
    $array_12dozen = array('5'); //5:Dozen
    $str_option = "";
    if($unit_id!=""){
        if(in_array($unit_id, $array_1000k)){ 
            $str_option = '<option value="250">250 gm</option><option value="500">500 gm</option><option value="1000" selected>1 Kg</option>'; //<option value="100">100 gm</option>
        }else if(in_array($unit_id, $array_1pcs)){ 
            $str_option = '<option value="1" selected>1 pcs/pkt</option><option value="2">2 pcs/pkt</option><option value="3">3 pcs/pkt</option><option value="4">4 pcs/pkt</option><option value="5">5 pcs/pkt</option>';
        }else if(in_array($unit_id, $array_12dozen)){
            $str_option = '<option value="6">6 pcs</option><option value="12" selected>1 dozen</option>';
        }else{
            $str_option = '<option value="" selected>No Unit</option>';
        } 
    }else{
        $str_option = '';
    }
    return $str_option;
}

function gram_to_kg($unit_id='',$qty=''){
    $array_1000k = array('1','2','3','6'); //1:kg,2:Gram,3:Liter,6:Mili liter
    $array_1pcs = array('4','7'); //4:Piece, 7:Bunch,
    $array_12dozen = array('5'); //5:Dozen

    $kg_values = $qty;
    if($unit_id!='' && $qty>0){
        if(in_array($unit_id, $array_1000k)){
            $kg_values = upto2Decimal($qty / 1000);
        }else if(in_array($unit_id, $array_12dozen)){
            $kg_values = upto2Decimal($qty / 12);
        }
    }
    return $kg_values;
}

function unit_wise_price($unit_id='',$price=''){
    $array_1000k = array(1,2,3,6); //1:kg,2:Gram,3:Liter,6:Mili liter
    $array_1pcs = array(4,7); //4:Piece, 7:Bunch,
    $array_12dozen = array(5); //5:Dozen

    //echo $unit_id.'='.$price;

    $price_data = array();
    if($unit_id!=""){
        if(in_array($unit_id, $array_1000k)){

            $str_option = array(250,500,1000); //100
            foreach ($str_option as $key => $qty_value) {
                if($qty_value==='1000'){
                     $st_array = array(
                        'price_title'=> ' 1 Kg for Rs. '.$price,
                        'price'=>upto2Decimal($price),
                        'qty'=>$qty_value
                    );
                }else{
                    $qty_price = upto2Decimal(($price / 1000) * $qty_value);
                    $st_array = array(
                        'price_title'=> $qty_value .' gm for Rs. '.$qty_price,
                        'price'=>upto2Decimal($qty_price),
                        'qty'=>$qty_value
                    );
                }
                $price_data[$key] = $st_array;
                //array_push($price_data,$st_array);
            }

        }else if(in_array($unit_id, $array_1pcs)){ 
            
            $str_option = array(1,2,3,4,5);
            foreach ($str_option as $key => $qty_value) {
                if($qty_value==='1'){ // for single 
                     $st_array = array(
                        'price_title'=> ' 1 pcs/pkt for Rs. '.upto2Decimal($price),
                        'price'=>upto2Decimal($price),
                        'qty'=>$qty_value
                    );
                }else{
                    $qty_price = upto2Decimal($price * $qty_value);
                    $st_array = array(
                        'price_title'=> $qty_value .' pcs/pkt for Rs. '.$qty_price,
                        'price'=>upto2Decimal($qty_price),
                        'qty'=>$qty_value
                    );
                }
                $price_data[$key] = $st_array;
            }


        }else if(in_array($unit_id, $array_12dozen)){
            
            $str_option = array(0.5,1,2,3,4,5); // 0.5=> half dozen, default 1=> dozen

            foreach ($str_option as $key => $qty_value) {
                if($qty_value==='1'){
                     $st_array = array(
                        'price_title'=> ' 1 dozen for Rs. '.upto2Decimal($price),
                        'price'=>upto2Decimal($price),
                        'qty'=>$qty_value
                    );
                }else{
                    $qty_price = (upto2Decimal($price) / 12) *($qty_value);
                    $st_array = array(
                        'price_title'=> $qty_value .' pcs for Rs. '.upto2Decimal($qty_price),
                        'price'=>upto2Decimal($qty_price),
                        'qty'=>$qty_value
                    );
                }
                $price_data[$key] = $st_array;
            }


        } 
    }
    return $price_data;
}

function access( $module ='' ,$permission ='' )
{
    $CI = get_instance();
    $CI->load->model('model');
    $role_id = $CI->session->userdata('op_user_role');
   
    $user_role = $CI->model->getData('op_user_role',array('role_id'=>$role_id));
    $role_access_level = $CI->model->getData('role_access_level',array('role_id'=>$role_id));

    $access = array();
    foreach ($role_access_level as $key => $value) {
        $access[$value['module_name']] = $value;
    }

    if(isset($access[$module][$permission]) && $access[$module][$permission] == '1'){
        return true;
    }
    else{
        return false;
    }
    
}


function accessModule( $module ){
    $CI = get_instance();
    $CI->load->model('model');
    $role_id = $CI->session->userdata('op_user_role');
   
    $user_role = $CI->model->getData('op_user_role',array('role_id'=>$role_id));
    $role_access_level = $CI->model->getData('role_access_level',array('role_id'=>$role_id));

    $access = array();
    foreach ($role_access_level as $key => $value) {
        $access[$value['module_name']] = $value;
    }

    if(isset($access[$module])){
        $mod = $access[$module];
        if((!isset($mod['view_access']) || $mod['view_access'] == 0) && 
            (!isset($mod['update_access']) || $mod['update_access'] == 0 ) && 
            (!isset($mod['full_access']) || $mod['full_access'] == 0 )) {
            return false;
        }
        else{
            return true;
        }
    }
    else{
        return false;
    }   
}

function sendEmail1($from,$to,$subject,$message,$attach=''){
    // echo  $message;
    $CI = get_instance();
    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => '', 
      'smtp_pass' => '', 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );


    $CI->load->library('email',$config);
    $CI->email->set_newline("\r\n");
    $CI->email->from($from);
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    if(!empty($attach)){
         $CI->email->attach($attach);
    }
    if($CI->email->send())
    {
     // echo 'Email send.';
    }
    else
    {
     show_error($this->email->print_debugger());
    }

}
function sendEmail_31_01_2022($from,$to,$subject,$message,$attach=''){ 

    $CI = get_instance();
    $CI->load->library('email'); 
   
    $mail_config['smtp_host'] = 'smtp.gmail.com';
    $mail_config['smtp_port'] = '587';
    $mail_config['smtp_user'] = 'mamata.tiwar@microlan.in';
    $mail_config['_smtp_auth'] = TRUE;
    $mail_config['smtp_pass'] = 'microlan@123';
    $mail_config['smtp_crypto'] = 'tls';
    $mail_config['protocol'] = 'smtp';
    $mail_config['mailtype'] = 'html';
    $mail_config['send_multipart'] = FALSE;
    $mail_config['charset'] = 'utf-8';
    $mail_config['wordwrap'] = TRUE;
    $CI->email->initialize($mail_config);

    $CI->email->set_newline("\r\n");
    //$CI->email->initialize($config);
    //echo '<pre>';print_r($message);
   // $CI->load->library('email',$config);
    
    $CI->email->set_newline("\r\n");
    $CI->email->from('mamata.tiwar@microlan.in');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    if(!empty($attach)){
         $CI->email->attach($attach);
    }
    if($CI->email->send())
    {
     // echo 'Email send.';
    }
    else
    {
     show_error($CI->email->print_debugger());
    }
    $CI->email->print_debugger();
    
}
function sendEmail12($from,$to,$subject,$message,$attach=''){   
    echo '<pre>';print_r($from);die;
    $CI = get_instance();
    $CI->load->library('email'); 
    $config = Array(
      'protocol' => 'sendmail',
      'smtp_host' => 'smtp.googlemail.com',
      'smtp_port' => 587,
      'smtp_user' => 'snehabpatil15@gmail.com', 
      'smtp_pass' => 'sneha@8kkar', 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

// echo '<pre>';print_r($message);
//    $CI->load->library('email',$config);
    $CI->email->set_newline("\r\n");
    $CI->email->from('snehabpatil15@gmail.com');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    $CI->email->set_mailtype('html');
    if(!empty($attach)){
         $CI->email->attach($attach);
    }
    if($CI->email->send())
    {
      //echo 'Email send.';
    }
    else
    {
     show_error($CI->email->print_debugger());
    }

}


function emailTemplate($HTML){
    $CI =& get_instance();
    return $CI->load->view("emailer/layout", array("HTML" => $HTML), TRUE);
}

/*------------------------------*/  
/*------------------------------*/  
function sendEmail($from,$to,$subject,$message,$attach=''){ 
//echo $to; die;
    $CI = get_instance();
    $CI->load->library('email'); 
   
    $mail_config['smtp_host'] = 'smtp.gmail.com';
   
$mail_config['smtp_port'] = 587;
$mail_config['smtp_user'] = 'vaibhavi.more@microlan.in';
$mail_config['_smtp_auth'] = TRUE;
$mail_config['smtp_pass'] = 'Vaibhavi@Mic23';
$mail_config['smtp_crypto'] = 'tls';
$mail_config['protocol'] = 'mail';
$mail_config['mailtype'] = 'html';
$mail_config['send_multipart'] = FALSE;
$mail_config['charset'] = 'utf-8';
$mail_config['wordwrap'] = TRUE; 
$CI->email->initialize($mail_config);
$CI->email->set_newline("\r\n");
    //$CI->email->initialize($config);
    
   // $CI->load->library('email',$config);
    
    $CI->email->set_newline("\r\n");
    $CI->email->from('vaibhavi.more@microlan.in');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    
     //echo '<pre>';print_r($CI->email->send());die;
    if(!empty($attach)){
         $CI->email->attach($attach);
    }
    if($CI->email->send())
    {
     return true;
    }
    else
    {
     //show_error($CI->email->print_debugger());
        return false;
    }
   // $CI->email->print_debugger();
    
    

}
/*----------------Amount in word convert---------------------*/
function amount_convert_to_word($num)
{
   $number = $num;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 100] . " " . 
          $words[$point = $point % 100] : '';
          if($points){
            $Paise=" paise";
        }else{
           $Paise='';
       }
  return $result. "rupees ".$points.$Paise;
        
}


  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
/*$number = 190908100.25;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo $result . "Rupees  " . $points . " Paise";
*/


/*------------------------------*/



?>