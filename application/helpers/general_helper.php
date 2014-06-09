<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Helper of System
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| function of name system
|--------------------------------------------------------------------------
*/
if ( ! function_exists('name_system')){
	function name_system(){
		$CI =& get_instance();
		return $CI->config->item('name_system');
	}
}

/*
|--------------------------------------------------------------------------
| function of company
|--------------------------------------------------------------------------
*/
if ( ! function_exists('company')){
	function company(){
		$CI =& get_instance();
		return $CI->config->item('company');
	}
}

/*
|--------------------------------------------------------------------------
| function of Address
|--------------------------------------------------------------------------
*/
if ( ! function_exists('address')){
	function address(){
		$CI =& get_instance();
		return $CI->config->item('address');
	}
}

/*
|--------------------------------------------------------------------------
| function of telepon
|--------------------------------------------------------------------------
*/
if ( ! function_exists('telepon')){
	function telepon(){
		$CI =& get_instance();
		return $CI->config->item('telepon');
	}
}

/*
|--------------------------------------------------------------------------
| function of version
|--------------------------------------------------------------------------
*/
if ( ! function_exists('version')){
	function version(){
		$CI =& get_instance();
		return $CI->config->item('version');
	}
}

/*
|--------------------------------------------------------------------------
| function of developer
|--------------------------------------------------------------------------
*/
if ( ! function_exists('developer')){
	function developer(){
		$CI =& get_instance();
		echo $CI->config->item('developer');
	}
}

/*
|--------------------------------------------------------------------------
| function of path css
|--------------------------------------------------------------------------
*/
if ( ! function_exists('path_css')){
	function path_css($file=''){
		$CI =& get_instance();
		echo $CI->config->item('path_css').$file;
	}
}

/*
|--------------------------------------------------------------------------
| function of path javascript
|--------------------------------------------------------------------------
*/
if ( ! function_exists('path_js')){
	function path_js($file=''){
		$CI =& get_instance();
		echo $CI->config->item('path_js').$file;
	}
}

/*
|--------------------------------------------------------------------------
| function of path images
|--------------------------------------------------------------------------
*/
if ( ! function_exists('path_img')){
	function path_img($file=''){
		$CI =& get_instance();
		echo $CI->config->item('path_img').$file;
	}
}

/*
|--------------------------------------------------------------------------
| function of path font
|--------------------------------------------------------------------------
*/
if ( ! function_exists('path_font')){
	function path_font($file=''){
		$CI =& get_instance();
		echo $CI->config->item('path_font').$file;
	}
}

/*
|--------------------------------------------------------------------------
| function of path upload
|--------------------------------------------------------------------------
*/
if ( ! function_exists('path_upload')){
	function path_upload($file=''){
		$CI =& get_instance();
		echo $CI->config->item('path_upload').$file;
	}
}

/*
 * -----------------------------------------------------------------------------
 * fungsi mengubah tanggal dari SQL ke format indonesia
 * by : yanun
 * update : 9 June 2014
 * -----------------------------------------------------------------------------
 */
if (!function_exists('dateToIndo')) {

    function dateToIndo($date = '') {
        $bagi = explode(" ", $date);
        if(count($bagi)>1){
            $pecah = explode('-', $bagi[0]);
            if (count($pecah) > 2) {
                $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
            } else {
                $pecah = explode('/', $date);
                if(count($pecah) > 2){
                    $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
                }else{
                    $getDate = $date;
                }
            }
            return $getDate.' '.$bagi[1];
        }else{
            $pecah = explode('-', $date);
            if (count($pecah) > 2) {
                $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
            } else {
                $pecah = explode('/', $date);
                if(count($pecah) > 2){
                    $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
                }else{
                    $getDate = $date;
                }
            }
            return $getDate;
        }
    }

}
/*
 * -----------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * fungsi filter string
 * by : yanun
 * update : 9 June 2014
 * -----------------------------------------------------------------------------
 */
if (!function_exists('filter_string')) {

    function filter_string($data) {
        $data = trim($data);
        $back = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
        return $back;
    }

}
/**
 * -----------------------------------------------------------------------------
 * fungsi filter numeric
 * by : yanun
 * update : 9 June 2014
 * -----------------------------------------------------------------------------
 */
if (!function_exists('filter_numeric')) {

    function filter_numeric($no = '') {
        $no = str_replace(',', '', $no);
        $nomor = filter_string($no);
        if ($no == '') {
            return 0;
        }
        return $nomor;
    }

}

/**
 * -----------------------------------------------------------------------------
 * fungsi random_str
 * by : yanun
 * update : 9 June 2014
 * -----------------------------------------------------------------------------
 */
if (!function_exists('random_str')) {

    function random_str($str = "") {
        $str = trim($str);
        $pengacak = "AJWKXLAJSCLWLWDAKDKSAJDADKEOIJEOQWENQWENQONEQWAJSNDKASO";
        $passEnkrip = md5($pengacak . md5($str) . $pengacak);
        return $passEnkrip;
    }

}

/*
 * -----------------------------------------------------------------------------
 * fungsi mengubah angka dalam bentuk rupiah
 * by : yanun
 * update : 9 June 2014
 * -----------------------------------------------------------------------------
 */
if (!function_exists("format_idr")) {

    function format_idr($angka = '') {
        return number_format($angka, 2, '.', ',');
    }

}

/**
 * -----------------------------------------------------------------------------
 * Kode Otomatis
 * by : yanun
 * -----------------------------------------------------------------------------
 */
if(!function_exists("numerator")){
    function numerator($prefix='',$range=5){  
        $CI =& get_instance();
        $CI->load->database();
        $sql = $CI->db->query("select value from numerator where code='$prefix' FOR UPDATE ");
        if($sql->num_rows()==0){
            $nomor = "";
            $CI->db->query("insert into numerator values ('$prefix', '0') ");
            $long    = 0;
        }else{
            $nomor = $prefix.$sql->row()->value;     
            $long    = strlen($nomor);
        }
        $integer='';         
        $shot    = strlen($prefix);
        $sisa    = ($long - $shot);       
        if($long == 0 ){
            $sufix = $range - $shot;
            for($i=1; $i<=$sufix; $i++){
                $integer .= '0';
            }
        }else{
            $integer = substr($nomor, $shot, $sisa);
        }
        $kode = (int) substr($integer, 0);
        $kode++;
        $newKode =  sprintf("%0".strlen($integer)."s", $kode);
        $CI->db->query("update numerator set value='$newKode' where code='$prefix' ");
        $auto_number = $prefix.$newKode;
        return $auto_number;
    }
}

/**
 * -----------------------------------------------------------------------------
 * Data tidak ditemukan
 * by : yanun
 * -----------------------------------------------------------------------------
 */
if(!function_exists("data_404")){
    function data_404(){
        echo "<h2>Data Not Found</h2>";
    }
}