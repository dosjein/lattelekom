<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Currency;
use Illuminate\Http\Request;
use Session;

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
        $perPage = 25;

        if (!empty($keyword)) {
            $currency = Currency::where('message', 'LIKE', "%$keyword%")
				->orWhere('phone', 'LIKE', "%$keyword%")
				->orWhere('person_id', 'LIKE', "%$keyword%")
				->orWhere('timesheet_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $currency = Currency::paginate($perPage);
        }

        return view('moderator.currency.index', compact('currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('moderator.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|min:3'
		]);
        $requestData = $request->all();
        
        Currency::create($requestData);

        Session::flash('flash_message', 'Currency added!');

        return redirect('moderator/currency');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);

        return view('moderator.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'name' => 'required|min:3'
		]);
        $requestData = $request->all();
        
        $currency = Currency::findOrFail($id);
        $currency->update($requestData);

        Session::flash('flash_message', 'Currency updated!');

        return redirect('moderator/currency');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Currency::destroy($id);

        Session::flash('flash_message', 'Currency deleted!');

        return redirect('moderator/currency');
    }
}
