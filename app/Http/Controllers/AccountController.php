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
        // POST
        $account = new Account();

        $account->full_name = $request->input('fullName');
        $account->email = $request->input('email');
        $account->phone = $request->input('phone');
        $account->street = $request->input('street');
        $account->city = $request->input('city');
        $account->state = $request->input('state');
        $account->zip_code = $request->input('zipCode');

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
        $accounts = self::getData();

        $index = array_search($account, array_column($accounts, 'id'));

        if ($index === false) {
            abort(404);
        }

        return view('accounts.show', [
            'account' => $accounts[$index]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // POST
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
    }
}
