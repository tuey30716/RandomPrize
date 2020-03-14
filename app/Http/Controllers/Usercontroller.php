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
        return view('index')->with(['prizenum' =>  $number])->with(['prizetext' =>  " "]);
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

     return view('index')->with(['prizenum' =>  $number])->with(['prizetext' =>  ""]);
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
        $prizenum=unserialize(file_get_contents('prizenum.txt'));
        if($getnum==$prizenum['firstprize']){
            $text="ถูกรางวัลที่ 1";
        }
        elseif($getnum==$prizenum['secondprize1']){
            $text="ถูกรางวัลที่ 2";
        }
        elseif($getnum==$prizenum['secondprize2']){
            $text="ถูกรางวัลที่ 2";
        }
        elseif($getnum==$prizenum['secondprize3']){
            $text="ถูกรางวัลที่ 2";
        }
        elseif($getnum==$prizenum['nearfirst1']){
            $text="ถูกรางวัลเลขข้างเคียงรางวัลที่ 1";
        }
        elseif($getnum==$prizenum['nearfirst2']){
            $text="ถูกรางวัลเลขข้างเคียงรางวัลที่ 1";
        }
        elseif($getnum==$prizenum['lasttwo']){
            $text="ถูกรางวัลเลขท้าย 2 ตัว";
        }
        elseif($getnum==$prizenum['firstprize']&&$prizenum['lasttwo']==substr($getnum, -2)){
            $text="ถูกรางวัลที่ 1 และถูกรางวัลเลขท้าย 2 ตัว";
        }
        elseif($getnum==$prizenum['secondprize1']&&$prizenum['lasttwo']==substr($getnum, -2)){
            $text="ถูกรางวัลที่ 2 และถูกรางวัลเลขท้าย 2 ตัว";
        }
        elseif($getnum==$prizenum['secondprize2']&&$prizenum['lasttwo']==substr($getnum, -2)){
            $text="ถูกรางวัลที่ 2 และถูกรางวัลเลขท้าย 2 ตัว";
        }
        elseif($getnum==$prizenum['secondprize3']&&$prizenum['lasttwo']==substr($getnum, -2)){
            $text="ถูกรางวัลที่ 2 และถูกรางวัลเลขท้าย 2 ตัว";
        }
        elseif($getnum==$prizenum['nearfirst1']&&$prizenum['lasttwo']==substr($getnum, -2)){
            $text="ถูกรางวัลเลขข้างเคียงรางวัลที่ 1 และถูกรางวัลเลขท้าย 2 ตัว";
        }
        elseif($getnum==$prizenum['nearfirst2']&&$prizenum['lasttwo']==substr($getnum, -2)){
            $text="ถูกรางวัลเลขข้างเคียงรางวัลที่ 1 และถูกรางวัลเลขท้าย 2 ตัว";
        }
        else{
            $text="ไม่ถูกรางวัลใดเลย";
        }
        return view("index")->with(['prizetext' =>  $text])->with(['prizenum' =>  $prizenum]);
}
}
