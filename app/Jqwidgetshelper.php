<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace App;

use Illuminate\Http\Request;

/**
 * Description of jqwidgetshelper
 *
 * @author cfyl
 */
class Jqwidgetshelper {
    //put your code here
    
    public static function prepareCondition(Request $request){
        
        //\App\Jqwidgetshelper::writeDataToFile($request);
        
        if(isset($request->filterscount))        
	{
            
          //\App\Jqwidgetshelper::writeDataToFile($request->filtercondition.'0');
            
	$filterscount = $request->filterscount;
	if ($filterscount > 0)
		{
		$where = " and (";
		$tmpdatafield = "";
		$tmpfilteroperator = "";
		$valuesPrep = "";
		$values = [];
		for ($i = 0; $i < $filterscount; $i++){                                        
			// get the filter's value.
                        $filtervalue = $request->{'filtervalue'.$i};
			// get the filter's condition.
                        $filtercondition = $request->{'filtercondition'.$i};
			// get the filter's column.
                        $filterdatafield = $request->{'filterdatafield'.$i};
			// get the filter's operator.
                        $filteroperator = $request->{'filteroperator'.$i};
			if ($tmpdatafield == "")
				{
				$tmpdatafield = $filterdatafield;
				}
			  else if ($tmpdatafield <> $filterdatafield)
				{
				$where.= ")AND(";
				}
			  else if ($tmpdatafield == $filterdatafield)
				{
				if ($tmpfilteroperator == 0)
					{
					$where.= " AND ";
					}
				  else $where.= " OR ";
				}
			// build the "WHERE" clause depending on the filter's condition, value and datafield.
			switch ($filtercondition)
				{
			case "CONTAINS":
				$condition = " LIKE ";
				$value = "'%{$filtervalue}%'";
				break;
			case "DOES_NOT_CONTAIN":
				$condition = " NOT LIKE ";
				$value = "'%{$filtervalue}%'";
				break;
			case "EQUAL":
				$condition = " = ";
				$value ="'". $filtervalue."'";
				break;
			case "NOT_EQUAL":
				$condition = " <> ";
				$value ="'". $filtervalue."'";
				break;
			case "GREATER_THAN":
				$condition = " > ";
				$value ="'". $filtervalue."'";
				break;
			case "LESS_THAN":
				$condition = " < ";
				$value = "'".$filtervalue."'";
				break;
			case "GREATER_THAN_OR_EQUAL":
				$condition = " >= ";
				$value ="'". $filtervalue."'";
				break;
			case "LESS_THAN_OR_EQUAL":
				$condition = " <= ";
				$value ="'". $filtervalue."'";
				break;
			case "STARTS_WITH":
				$condition = " LIKE ";
				$value = "'{$filtervalue}%'";
				break;
			case "ENDS_WITH":
				$condition = " LIKE ";
				$value = "'%{$filtervalue}'";
				break;
			case "NULL":
				$condition = " IS NULL ";
				$value = "";
				break;
			case "NOT_NULL":
				$condition = " IS NOT NULL ";
				$value = "";
				break;
				}
			$where.= " " . $filterdatafield . $condition ." ".$value; //"? ";
//			$valuesPrep = $valuesPrep . "s";
//			$values[] = & $value;
			if ($i == $filterscount - 1)
				{
				$where.= ")";
				}
			$tmpfilteroperator = $filteroperator;
			$tmpdatafield = $filterdatafield;
			}
		// build the query.
		return $where.' ';
	}
        }
    }
    
    
    public static function writeDataToFile($data){
//        $myfile = fopen("testLog.txt", "wb") or die("Unable to open file!");
//        $txt = $data."\n";
//        fwrite($myfile, $txt);
//   
//        fclose($myfile);
        file_put_contents("testLog.txt", $data."\n",FILE_APPEND);
    }
    
    public function writeToConsole( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo("<script>console.log('PHP: ".$output."');</script>");
    }
}
