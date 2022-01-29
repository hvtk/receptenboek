<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    private static function getData() {
        return [];
    }

    public function index()
    {
        // GET
        return view('accounts.index', [
            'accounts' => Account::all(),
            'userInput' => '<script>allert("hello")</script>'
        ]);
    }

    public function create()
    {
        // GET
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => ['required'],
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

        $save = $account->save();

        if($save) {
            return back()->with('success', 'The User info has been successfully added to the database.');
        }
        else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

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

    public function edit($account)
    {
        // GET
        return view('accounts.edit', [
            'account' => Account::findOrFail($account)
        ]);
    }

    public function update(Request $request, $account)
    {
        // POST
        $request->validate([
            'fullName' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);

        $record = Account::findOrFail($account);

        $record->full_name = strip_tags($request->input('fullName'));
        $record->email = strip_tags($request->input('email'));
        $record->phone = strip_tags($request->input('phone'));
        $record->street = strip_tags($request->input('street'));
        $record->city = strip_tags($request->input('city'));
        $record->state = strip_tags($request->input('state'));
        $record->zip_code = strip_tags($request->input('zipCode'));

        $update = $record->save();

        if($update) {
            return back()->with('success', 'The User info has been successfully updated and added to the database.');
        }
        else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    public function destroy($id)
    {
        // DELETE
       $account = Account::where('id', $id)->firstOrFail()->delete();
       echo ("Account record deleted succesfully.");

       return redirect('/');
    }
}
