<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Cookie;
use Illuminate\Contracts\Filesystem\FileNotFoundException;  


class MarketHistory extends Controller{
    public function getMarketHistory(Request $request){
        
        $symbol = $request->get("company_symbol");
        $sd = $request->get("start_date");
        $ed = $request->get("end_date");
        $email = $request->get("email");

        $data = $this->queryHistory($symbol,$sd, $ed);

        return Redirect::to('/')
        ->withInput()
        ->with(['data' => json_encode([
                        "market" => $data[0],
                        "chart" => $data[1],
                        "errors" => $data[2],       
                        "code" => $data[3]
                    ])]);
    }

    function queryHistory($symbol, $start_date, $end_date){
        /**
         * collects the csv from quandl.com api based on provided parameters
         */
        $code = 205; //load empty
        $hist = [];
        $chart = ["Open" => [],
                    "Close" => []];
        $error = "";

        $keys = [];
        $i = 0;
        $csv = [];
        /*set_error_handler(function ($err_severity, $err_msg, $err_file, $err_line, array $err_context) {
            throw new ErrorException( $err_msg, 0, $err_severity, $err_file, $err_line );
        }, E_WARNING);*/
        try{
            $url = "https://www.quandl.com/api/v3/datasets/WIKI/".strtoupper($symbol).".csv?order=asc&start_date=".$start_date."&&end_date=".$end_date;
            $error = $url;
            $csv = file($url);
            foreach($csv as $index => $line){
                $line = str_replace('"',"",$line);
                $row = explode(",",$line); 
                if(!$i){
                    $keys = $row;
                }else{
                    $record = [];
                    for($j = 0; $j < 6; ++ $j){ //collect the first 5 columns from the csv
                        $record[$keys[$j]] = $row[$j]; 
                    }
                    $hist[] = $record;
                    $chart["Open"][] = [strtotime($record["Date"])*1000,floatval($record["Open"])];
                    $chart["Close"][] = [strtotime($record["Date"])*1000,floatval($record["Close"])];
                }
                ++$i;
            }
        }catch(\Exception $e){
            $error = "not found ".$url;
            $code = 404; // not found error
        }
        $code = ($hist)? 200:$code; //@200 load is ok
        return [$hist, $chart, $error,$code];
    }
}
