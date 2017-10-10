<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();

        return response(['message' => 'Data successfully retrieved', 'data' => $persons]);
    }

    public function show($id)
    {
        if (!$person = Person::find($id)) {
            return response(['message' => 'data not found'], 404);
        }

        return response(['message' => 'Data found', 'data' => $person]);
    }

    public function store(Request $request)
    {
        $input = $request->input();

        $person = New Person($input);
        $person->save();

        return response(['message' => 'Data successfully created', 'data' => $person]);
    }

    public function update(Request $request, $id)
    {
        if (!$person = Person::find($id)) {
            return response(['message' => 'data not found'], 404);
        }

        $input = $request->input();

        $person->name = $input['name'];
        $person->birthdate = $input['birthdate'];
        $person->gender = $input['gender'];

        $person->save();

        return response(['message' => 'Data successfully updated', 'data' => $person]);
    }

    public function destroy($id)
    {
        if (!$person = Person::find($id)) {
            return response(['message' => 'data not found'], 404);
        }

        $person->delete();

        return response(['message' => 'Data successfully deleted']);
    }
}