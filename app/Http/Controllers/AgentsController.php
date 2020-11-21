<?php

namespace App\Http\Controllers;

use App\Agent;
use App\AgentBank;
use App\AgentHistory;
use App\AgentOrder;
use App\AgentWallet;
use App\Bank;
use App\Category;
use App\CategorySub;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

        if ($checkUser < 1) 
            {
                return redirect()->route('get.started')->with('success_message', 'You are not yet an agent, click the Get Started button');
            }

        $agent = Agent::where('user_id', auth()->user()->id)->first();
        //this is for the analytics

        //the sales for today
        $nowToday = Carbon::now();
        $dayStartDate = $nowToday->today()->format('Y-m-d H:i');
        $dayEndDate = $nowToday->tomorrow()->format('Y-m-d H:i');

        $todaySales = AgentOrder::where('agent_id', $agent->id)->where('created_at', '>', $dayStartDate)->where('created_at', '<', $dayEndDate);
        $todayTotal = count($todaySales->get());
        $todayProfit = $todaySales->sum('profit');

        //sales for one week  
        $nowWeek = Carbon::now();
        $weekStartDate = $nowWeek->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $nowWeek->endOfWeek()->format('Y-m-d H:i');

        $weekSales = AgentOrder::where('agent_id', $agent->id)->where('created_at', '>', $weekStartDate)->where('created_at', '<', $weekEndDate);
        $weekTotal = count($weekSales->get());
        $weekProfit = $weekSales->sum('profit');

        //the sales for one month
        $nowMonth = Carbon::now();
        $monthStartDate = $nowMonth->startOfMonth()->format('Y-m-d H:i');
        $monthEndDate = $nowMonth->endOfMonth()->format('Y-m-d H:i');

        $monthSales = AgentOrder::where('agent_id', $agent->id)->where('created_at', '>', $monthStartDate)->where('created_at', '<', $monthEndDate);
        $monthTotal = count($monthSales->get());
        $monthProfit = $monthSales->sum('profit');

        //the sales for this year
        $nowYear = Carbon::now();
        $yearStartDate = $nowYear->startOfYear()->format('Y-m-d H:i');
        $yearEndDate = $nowYear->endOfYear()->format('Y-m-d H:i');

        $yearSales = AgentOrder::where('agent_id', $agent->id)->where('created_at', '>', $yearStartDate)->where('created_at', '<', $yearEndDate);
        $yearTotal = count($yearSales->get());
        $yearProfit = $yearSales->sum('profit');

        //for the graph
        $then = Carbon::now();       
    
        $newSales = array();
        $newAmount = array();
       for ($i=1; $i < 13; $i++) 
            { 
                $monthStart = $then->startOfMonth()->setMonths($i)->format('Y-m-d H:i');
                $monthEnd = $then->endOfMonth()->setMonths($i)->format('Y-m-d H:i');

                $theMonth = AgentOrder::where('agent_id', $agent->id)->where('created_at', '>', $monthStart)->where('created_at', '<', $monthEnd);
                $theSales = count($theMonth->get());
                $theAmount = $theMonth->sum('profit');
                
                $newSales[] = array($theSales);
                $newAmount[] = array($theAmount);
            }
        $singleSales = call_user_func_array('array_merge', $newSales); 
        $singleAmount = call_user_func_array('array_merge', $newAmount); 

        $salesData = implode(', ', $singleSales);
        $AmountData = implode(', ', $singleAmount);

        return view('agent-index')->with([
            'todayTotal' => $todayTotal,
            'todayProfit' => $todayProfit,
            'weekTotal' => $weekTotal,
            'weekProfit' => $weekProfit,
            'monthTotal' => $monthTotal,
            'monthProfit' => $monthProfit,
            'yearTotal' => $yearTotal,
            'yearProfit' => $yearProfit,
            'salesData' => $salesData,
            'AmountData' => $AmountData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

        if ($checkUser > 0) 
            {
                return redirect()->route('agent.index')->with('success_message', 'You are already an Agent');
            }

        return view('get-started');
    }

    public function bank()
    {
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

        if ($checkUser < 1) 
            {
                return redirect()->route('get.started')->with('success_message', 'You are not yet an agent, click the Get Started button');
            }

        $agent = Agent::where('user_id', auth()->user()->id)->first();
        $checkAgentBank = AgentBank::where('agent_id', $agent->id)->get()->count();
        $bank = AgentBank::where('agent_id', $agent->id)->first();
        $banks = Bank::all()->sortBy('name');

        return view('agent-bank')->with([
            'checkAgentBank' => $checkAgentBank,
            'bank' => $bank,
            'banks' => $banks,
        ]);
    }

    public function orders()
    {
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

        if ($checkUser < 1) 
            {
                return redirect()->route('get.started')->with('success_message', 'You are not yet an agent, click the Get Started button');
            }

        $agent = Agent::where('user_id', auth()->user()->id)->first();
        $orders = AgentOrder::where('agent_id', $agent->id)->get();

        return view('agent-orders')->with([
                    'orders' => $orders,
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

        if ($checkUser > 0) 
            {
                return redirect()->route('agent.index')->with('success_message', 'You are already an Agent');
            }
            
        $agent = Agent::create([
            'user_id' => auth()->user()->id,
            'user_email' => auth()->user()->email,
        ]);

        AgentWallet::create([
            'agent_id' => $agent->id,
            'balance' => 500,
        ]);

        return redirect()->route('agent.index')->with('success_message', 'You are now Ziksales Agent!');
    }

     public function storeBank(Request $request)
        {
            $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

            if ($checkUser < 1) 
                {
                    return redirect()->route('get.started')->with('success_message', 'You are not yet an agent, click the Get Started button');
                }

            $request->validate([
                'accountName' => 'required|string',
                'bankName' => 'required|string',
                'accountNumber' => 'required|string',
                'g-recaptcha-response' => 'required|captcha',
            ]);
                
            
            $agent = Agent::where('user_id', auth()->user()->id)->first();

            AgentBank::create([
                'agent_id' => $agent->id,
                'accountName' => $request->input('accountName'),
                'bankName' => $request->input('bankName'),
                'accountNumber' => $request->input('accountNumber'),
            ]);

            return back()->with('success_message', 'You have successfully submitted your bank detail(s)');
        }

    public function wallet()
    {
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

        if ($checkUser < 1) 
            {
                return redirect()->route('get.started')->with('success_message', 'You are not yet an agent, click the Get Started button');
            }

        $agent = Agent::where('user_id', auth()->user()->id)->first();
        $wallet = AgentWallet::where('agent_id', $agent->id)->first();
        $checkHistory = AgentHistory::where('agent_id', $agent->id)->where('cleared', 0)->get()->count();
        $historys = AgentHistory::where('agent_id', $agent->id)->orderBy('id', 'desc')->get();

        return view('agent-wallet')->with([
                    'wallet' => $wallet,
                    'checkHistory' => $checkHistory,
                    'historys' => $historys,
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function withdraw(Request $request)
    {
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

        if ($checkUser < 1) 
            {
                return redirect()->route('get.started')->with('success_message', 'You are not yet an agent, click the Get Started button');
            }            
        
        $request->validate([
            'amount' => 'required|integer|min:1000',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $agent = Agent::where('user_id', auth()->user()->id)->first();
        $amount = $request->input('amount');
        $wallet = AgentWallet::where('agent_id', $agent->id)->first();
        if ($wallet->balance < $amount) 
            {
                return back()->with('error_message', 'Insufficient Balance!');
            }


        AgentHistory::create([
            'agent_id' => $agent->id,
            'amount' => $amount,
        ]);

        return back()->with('success_message', 'Your request has been sent successfully, we are processing it.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bankUpdate(Request $request)
    {
        $checkUser = Agent::where('user_id', auth()->user()->id)->get()->count();

            if ($checkUser < 1) 
                {
                    return redirect()->route('get.started')->with('success_message', 'You are not yet an agent, click the Get Started button');
                }

            $request->validate([
                'accountName' => 'required|string',
                'bankName' => 'required|string',
                'accountNumber' => 'required|string',
                'g-recaptcha-response' => 'required|captcha',
            ]);
                
            
            $agent = Agent::where('user_id', auth()->user()->id)->first();

            AgentBank::where('agent_id', $agent->id)->update([
                'accountName' => $request->input('accountName'),
                'bankName' => $request->input('bankName'),
                'accountNumber' => $request->input('accountNumber'),
            ]);

            return back()->with('success_message', 'You have successfully updated your bank detail(s)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
