<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function setnum(){
        $number['firstprize']= "000";
    
        $number['secondprize1']= "000";
    
        $number['secondprize2']= "000";
    
        $number['secondprize3']= "000";
    
        $number['nearfirst1']= "000";
    
        $number['nearfirst2']= "000";
    
        $number['lasttwo']= "00";
        return view('index')->with(['prizenum' =>  $number]);
    }

    public function randomnumber(){

        $number['firstprize']= rand(0,999);
        $this->zerofill($number['firstprize'],3);
    
        $number['secondprize1']= rand(0,999);
        $this->zerofill($number['secondprize1'],3);
    
        $number['secondprize2']= rand(0,999);
        $this->zerofill($number['secondprize2'],3);
    
        $number['secondprize3']= rand(0,999);
        $this->zerofill($number['secondprize3'],3);
    
        $number['nearfirst1']= $number['firstprize']-1;
        $this->zerofill($number['nearfirst1'],3);
    
        $number['nearfirst2']= $number['firstprize']+1;
        $this->zerofill($number['nearfirst2'],3);
    
        $number['lasttwo']= rand(0,99);
        $this->zerofill($number['lasttwo'],2);
        file_put_contents("prizenum.txt", serialize($number));

     return view('index')->with(['prizenum' =>  $number]);;
    }
    
    public function zerofill($num,$count){
    
        if($num<1000&&$count==3){
            $num = sprintf("%03d", $num);
        }
        elseif($num<100&&$count==2){
            $num = sprintf("%02d", $num);
        }
    
        return $num;
    }

    public function check(Request $request) {
        $getnum = $request->input('typenum');
        $prizenum=file_get_contents("prizenum.txt", unserialize($number));
        return view("/",$getnum);
}
}
