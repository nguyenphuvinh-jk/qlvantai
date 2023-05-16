<?php
namespace App\Helper;

class Helper
{
    public static function IDCustomize($model, $strow, $length, $prefix){
        $data = $model::orderBy($strow, 'desc')->first();
        if (!$data){
            $og_lenght = $length;
            $last_numer = '';
        }else{
            $code = substr($data->$strow, strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = $actial_last_number+1;
            $last_numer_lenght = strlen($increment_last_number);
            $og_lenght = $length - $last_numer_lenght;
            $last_numer = $increment_last_number;
        }

        $zeros = "";
        for ($i=0; $i<$og_lenght; $i++){
            $zeros.="0";
        }

        return $prefix.'-'.$zeros.$last_numer;
    }
}
?>
