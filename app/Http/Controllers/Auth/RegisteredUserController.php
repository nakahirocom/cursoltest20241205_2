<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MiddleLabel;
use App\Models\LabelStorages;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        //新規登録した自身のuseridを取得する
        $id = auth()->id();

        //MiddleLabelテーブルの全てのデータ(中分類)を$middlelabelNewListに保存する
        $middleLabelNewList = MiddleLabel::all();

        //LabelStoragesテーブルの[user_id=全て自分の$id][large_label_id=ミドルラベルから][middle_label_id=全てのid][select=全て1]
        foreach ($middleLabelNewList as $item) {
            $selectNewList = new LabelStorages();
            $selectNewList->user_id = $id; // ここでUserIdを保存している　❌ =$id();
            $selectNewList->large_label_id = $item->large_label_id; //large_label_idを登録
            $selectNewList->middle_label_id = $item->id; //middle_label_idを登録
            $selectNewList->select = 1; //中分類を選んだ状態の「１」を登録
            $selectNewList->save();
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
