<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalData;

class PersonalDataController extends Controller
{
    private static function getData() {
        return [];
    }

    public function index()
    {
        // GET
        return view('personalData.index', [
            'personalData' => PersonalData::all(),
            'userInput' => '<script>allert("hello")</script>'
        ]);
    }

    public function create()
    {
        // GET
        return view('personalData.create');
    }

    public function store(Request $request)
    {
        $request->validate( [
            'fullName' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);

        // POST
        $personalData = new PersonalData();

        $personalData->full_name = strip_tags($request->input('fullName'));
        $personalData->email = strip_tags($request->input('email'));
        $personalData->phone = strip_tags($request->input('phone'));
        $personalData->street = strip_tags($request->input('street'));
        $personalData->city = strip_tags($request->input('city'));
        $personalData->state = strip_tags($request->input('state'));
        $personalData->zip_code = strip_tags($request->input('zipCode'));

        $save = $personalData->save();

        if($save) {
            return back()->with('success', 'The User info has been successfully added to the database.');
        }
        else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    public function show($personalData)
    {
        // GET
        return view('personalData.show', [
            'personalData' => PersonalData::findOrFail($personalData)
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

    public function edit($personalData)
    {
        // GET
        return view('personalData.edit', [
            'personalData' => PersonalData::findOrFail($personalData)
        ]);
    }

    public function update(Request $request, $personalData)
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

        $record = PersonalData::findOrFail($personalData);

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
       $personalData = PersonalData::where('id', $id)->firstOrFail()->delete();
       echo ("PersonalData record deleted succesfully.");

       return redirect('/');
    }
}
