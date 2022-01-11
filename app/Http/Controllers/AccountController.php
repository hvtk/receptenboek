<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    private static function getData() {
        return [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET

        return view('accounts.index', [
            'accounts' => Account::all(),
            'userInput' => '<script>allert("hello")</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone' => ['required', 'integer'],
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => ['required', 'integer'],
        ]);

        // POST
        $account = new Account();

        $account->full_name = strip_tags($request->input('fullName'));
        $account->email = strip_tags($request->input('email'));
        $account->phone = strip_tags($request->input('phone'));
        $account->street = strip_tags($request->input('street'));
        $account->city = strip_tags($request->input('city'));
        $account->state = strip_tags($request->input('state'));
        $account->zip_code = strip_tags($request->input('zipCode'));

        $account->save();

        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($account)
    {
        // GET
        return view('accounts.show', [
            'account' => Account::findOrFail($account)
        ]);

        //The code behind is an alternative from the code above
      //$record = Account:: find($account);
      //$accounts = self::getData();

      //$index = array_search($account, array_column($accounts, 'id'));

      //if ($index === false) {
      //    abort(404);
      //}

      //return view('accounts.show', [
      //    'account' => $record
      //]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($account)
    {
        // GET
        return view('accounts.edit', [
            'account' => Account::findOrFail($account)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $account)
    {
        // POST
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone' => ['required', 'integer'],
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);

        // POST
        $record = Account::findOrFail($account);

        $record->full_name = strip_tags($request->input('fullName'));
        $record->email = strip_tags($request->input('email'));
        $record->phone = strip_tags($request->input('phone'));
        $record->street = strip_tags($request->input('street'));
        $record->city = strip_tags($request->input('city'));
        $record->state = strip_tags($request->input('state'));
        $record->zip_code = strip_tags($request->input('zipCode'));

        $record->save();

        return redirect()->route('accounts.show', $account);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE
        $account = Account::where('id', $id)->firstOrFail()->delete();
        echo ("Account record deleted succesfully.");

        return redirect('/');
    }
}
