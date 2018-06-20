<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Currency;
use Illuminate\Http\Request;
use Session;

use Carbon\Carbon;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $currency = Currency::where('message', 'LIKE', "%$keyword%")
                ->whereDate('created_at' , '>' , Carbon::now()->isStartOfDay())
				->orWhere('price', 'LIKE', "%$keyword%")
				->orWhere('currency', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $currency = Currency::whereDate('created_at' , '>' , Carbon::now()->isStartOfDay())->paginate($perPage);
        }

        return view('moderator.currency.index', compact('currency'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $currency = Currency::findOrFail($id);

        return view('moderator.currency.show', compact('currency'));
    }

}
