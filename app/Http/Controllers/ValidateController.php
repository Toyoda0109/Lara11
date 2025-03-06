<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Rules\RequiredIfNamashi;
// use Illuminate\Http\Request;
// use Symfony\Contracts\Service\Attribute\Required;

class ValidateController extends Controller
{
    public function index() {
        return view('validate.index');
    }
    public function indexPost(UserSaveRequest $request)
    {
        $validated = $request->validated();
        dd($validated);
    }




    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255']
    //     ], [
    //         'email.required' => ':attributeは、絶対に入力してください！'
    //     ], [
    //         'email' =>'メアド'
    //     ]);
    //     dd('good');
    // }
}
