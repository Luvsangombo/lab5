<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\MySqlConnection;
use DB;
class TransactionController extends Controller
{
    public function list($id){
            $transactions=DB::select('select * from transaction where transaction_from = ? or transaction_to = ?', [$id, $id]);
            return view("tlist",['transactions'=>$transactions]);
    }
    public function doTransaction(Request $request){
        //Гүйлгээ хийх данс байгаа эсэхийг шалга 
        $resultfrom = DB::select('select * from account where account_number=?', [$request->transaction_from]);
        $resultto = DB::select('select * from account where account_number = ?', [$request->transaction_to]);
        if(!count($resultfrom) or !count($resultto) ){
            return redirect()->back()->withSuccess('Дансны мэдээлэл олдсонгүй !!');
        }
         //Үлдэгдэл хүрэлцэх эсэхийг шалга
        else {
            $amountCheck =  DB::table('account')->select('account_balance')->where('account_number', $request->transaction_from)->first()->account_balance;
            if($amountCheck<=intval($request->transaction_amount)){
                return redirect()->back()->withSuccess('Дансны үлдэгдэл хүрэлцэхгүй байна!!');
            }
            else {
                DB::transaction(function () use ($request) {
                    DB::insert('
                    insert into transaction (transaction_from, transaction_to, transaction_amount,
                    transaction_description, created_at) values(?,?,?,?,now())',
                    [$request->transaction_from, $request->transaction_to,$request->transaction_amount,$request->transaction_desc ]);
                    $updatedValueFrom = DB::table('account')->select('account_balance')->where('account_number', $request->transaction_from)->first()->account_balance;
                    $updatedValueFrom = $updatedValueFrom-intval($request->transaction_amount);
                    $updatedValueTo = DB::table('account')->select('account_balance')->where('account_number', $request->transaction_to)->first()->account_balance;
                    $updatedValueTo = $updatedValueTo + intval($request->transaction_amount);
                    DB::table('account')->where('account_number', $request->transaction_from)->update(array('account_balance' => $updatedValueFrom)); 
                    DB::table('account')->where('account_number', $request->transaction_to)->update(array('account_balance' => $updatedValueTo)); 
                });
                return redirect()->back()->with('congratulation','Гүйлгээ амжилттай хийгдлээ');
            }
        }

      
    }
}
