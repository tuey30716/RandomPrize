
@extends('layouts.temp')

@section('title', 'Page Title')

@section('table')
<p>ตารางแสดงผลรางวัล</p>
    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead>
              <tr>
                <th scope="col">รางวัลที่ 1</th>
                <td colspan="3">{{str_pad($prizenum['firstprize'], 3, '0', STR_PAD_LEFT)}}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">รางวัลที่ 2</th>
                <td>{{str_pad($prizenum['secondprize1'], 3, '0', STR_PAD_LEFT)}}</td>
                <td>{{str_pad($prizenum['secondprize2'], 3, '0', STR_PAD_LEFT)}}</td>
                <td>{{str_pad($prizenum['secondprize3'], 3, '0', STR_PAD_LEFT)}}</td>
              </tr>
              <tr>
                <th scope="row">รางวัลที่เลขข้างเคียงรางวัลที่ 1</th>
                <td >{{str_pad($prizenum['nearfirst1'], 3, '0', STR_PAD_LEFT)}}</td>
                <td colspan="2">{{str_pad($prizenum['nearfirst2'], 3, '0', STR_PAD_LEFT)}}</td>
                
              </tr>
              <tr>
                <th scope="row">รางวัลเลขท้าย 2 ตัว</th>
                <td colspan="3">{{str_pad($prizenum['lasttwo'], 3, '0', STR_PAD_LEFT)}}</td>
              </tr>

            </tbody>
          </table>

      </div>
      <a href="/randomprize" class="btn btn-success">ดำเนินการสุ่มรางวัล</a>
    
      <form action="{{ url('/check') }}" method="post">
        <div class="container">
          <div class="row">
            <div class="col-sm">
              <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
              <input type="number" name="typenum" class="form-control">
            </div>
            <div class="col-sm">
               <button type="submit" class="btn btn-primary">ตรวจรางวัลอัตโนมัติ</button>
            </div>
          </div>  
        </div>       
         </form>
@endsection

