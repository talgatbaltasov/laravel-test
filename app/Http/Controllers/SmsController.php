<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsRequest;
use App\Jobs\SendSms;
use Illuminate\Http\Request;
use App\Models\Account;

class SmsController extends Controller
{
    public function index()
    {
        $accounts = Account::whereHas('sim_cards', function($q){
            $q->where('is_active', true);
        })->pluck('name','id');
        return view('welcome', compact('accounts'));
    }

    public function send(SmsRequest $request)
    {
        SendSms::dispatch($request->account_id, $request->content);
    }
}
