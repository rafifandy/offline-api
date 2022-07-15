<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\IndexExport;

class C_index extends Controller
{
    public function index(Request $request)
    {
        $list = json_decode(Http::get('http://34.124.166.28:2922/check_domain'));
        return view('/index',compact('list'),['cust' => '']);
    }

    public function indexAll(Request $request)
    {
        $list = json_decode(Http::get('http://34.124.166.28:2922/check_domain'));
        $response = json_decode(Http::get('http://34.124.166.28:2922/offline?api=1'));
        //dd($response);
        return view('/index',compact('response','list'),['cust' => 'all']);
    }

    public function indexSearch(Request $request)
    {
        $cust = $request->customer;
        return redirect('/customer-'.$cust);
    }

    public function indexCustomer(Request $request, $cust)
    {
        $list = json_decode(Http::get('http://34.124.166.28:2922/check_domain'));
        $response = json_decode(Http::get('http://34.124.166.28:2922/offline?api=1&domain='.$cust));
        //dd($response);
        return view('/index',compact('response','list','cust'));
    }

    public function keterangan(Request $request, $imei)
    {
        $response = Http::get('http://34.124.166.28:2922/update_ket?active=f&imei='.$imei.'&ket='.$request->keterangan) ;
        //dd($url, $response->getStatusCode(),$request);
        return redirect('/customer-'.$request->customer); 
    }






    // public function export_excel()
	// {  
    //     $response = Http::get('http://34.124.166.28:2922/offline?api=1');
    //     $response = json_decode($response);
    //     // dd($response);
	// 	return Excel::download(new IndexExport($response), 'offline.xlsx');
	// }

}