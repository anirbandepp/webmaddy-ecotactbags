<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \App\State,Str;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\ProductRepository;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    protected function selectStates($value='')
    {
        return $states = \App\State::pluck('state_name','id')->all();
    }
    public function getCategories()
    {
        return Category::whereNull('parent_id')->with('childs')
        ->get();
    }
    public function amountToWord($num)
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
            "." . $words[$point / 10] . " " . 
                  $words[$point = $point % 10] : '';
        return $result . "Rupees  " . $points ;
    }

    public function indexPage()
    {	
        // return \Hash::make('ecotact@#2021');
        $exporter = \App\Product::whereHas('categories', function (Builder $query)  {
			    $query->where('name', 'Exporter');
			})->with(['productDetails' => function($q)
        {
            $q->where('language_id',config('app.lang')->id);
        },'productImages' => function($qI)
        {
            $qI->where('ideal',1);
        }])->orderBy('priority','asc')->get()->take(5);
        $farmer = \App\Product::whereHas('categories', function (Builder $query)  {
			    $query->where('name', 'Farmer');
			})->with(['productDetails' => function($q)
        {
            $q->where('language_id',config('app.lang')->id);
        },'productImages' => function($qI)
        {
            $qI->where('ideal',1);
        }])->orderBy('priority','asc')->get()->take(5);
        $importer = \App\Product::whereHas('categories', function (Builder $query)  {
			    $query->where('name', 'Importer');
			})->with(['productDetails' => function($q)
        {
            $q->where('language_id',config('app.lang')->id);
        },'productImages' => function($qI)
        {
            $qI->where('ideal',1);
        }])->orderBy('priority','asc')->get()->take(5);
        $explorer = \App\Product::whereHas('categories', function (Builder $query)  {
			    $query->where('name', 'Explorer');
			})->with(['productDetails' => function($q)
        {
            $q->where('language_id',config('app.lang')->id);
        },'productImages' => function($qI)
        {
            $qI->where('ideal',1);
        }])->orderBy('priority','asc')->get()->take(5);
        return view('welcome',[ 'exporters' => $exporter, 'farmers' => $farmer, 'importers' => $importer, 'explorers' => $explorer]);
    }
    
}
