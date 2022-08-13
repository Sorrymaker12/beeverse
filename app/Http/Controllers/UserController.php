<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\User;
use App\Models\Avatar;
use App\Models\Interest;
use App\Models\Wishlist;
use App\Models\FieldOfWork;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\AvatarCollection;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index_home()
    {
        $users = User::where('visible', '=', 'visible')->get();
        $interest = Interest::all();
        $FOW = FieldOfWork::all();
        return view('home', ['users' => $users, 'interest' => $interest, 'FOW' => $FOW]);
    }

    public function index_login()
    {
        return view('auth.login');
    }

    public function index_register()
    {
        $FOW = FieldOfWork::all();
        $faker = Factory::create();
        $price = $faker->numberBetween(100000, 125000);
        return view('auth.register', ['FOW' => $FOW, 'price' => $price]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'mobile_number' => 'required|numeric|digits_between:6,8',
            'gender' => Rule::in(['male', 'female']),
            'linkedin' => 'required',
            'current_job' => 'required',
            'current_company' => 'required',
            'interest1' => 'required|different:interest2|different:interest3',
            'interest2' => 'required|different:interest3',
            'interest3' => 'required',
            'profile_picture' => 'required|image',
        ]);

        // pindahin image ke storage local
        $profile_picture = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('storage/img'), $profile_picture);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->linkedin = 'https://wwww.linkedin.com/in/' . $request->linkedin;
        $user->current_job = $request->current_job;
        $user->current_company = $request->current_company;
        $user->mobile_number = $request->mobile_number;
        $user->profile_picture = $profile_picture;
        $user->registration_price = $request->registration_price;
        $user->coins = 0;

        $user->save();

        // bikin interests
        $interest1 = new Interest();
        $interest1->user_id = $user->id;
        $FOW = FieldOfWork::find($request->interest1);
        $interest1->fow_id = $FOW->id;
        $interest1->save();

        $interest2 = new Interest();
        $interest2->user_id = $user->id;
        $FOW = FieldOfWork::find($request->interest2);
        $interest2->fow_id = $FOW->id;
        $interest2->save();

        $interest3 = new Interest();
        $interest3->user_id = $user->id;
        $FOW = FieldOfWork::find($request->interest3);
        $interest3->fow_id = $FOW->id;
        $interest3->save();

        // bikin avatar collection
        $avatar_collection = new AvatarCollection();
        $avatar_collection->user_id = $user->id;
        $avatar_collection->avatar_id = 1;

        $avatar_collection->save();

        // redirect ke payment
        return redirect('/payment')->with('user_id', $user->id);
    }

    public function index_payment()
    {
        $user_id = session('user_id');
        $user = User::find($user_id);
        return view('auth.payment', ['user' => $user]);
    }

    public function payment(Request $request)
    {
        $user = User::find($request->user_id);

        // kalo lebih kecil
        if ($user->registration_price > $request->payment) {
            $missing = $user->registration_price - $request->payment;
            Alert::error('Payment Failed', 'You Are Underpaying ' . $missing . ' !!!');
            return redirect('/payment')->with('user_id', $user->id);
        }

        // kalo lebih besar
        if ($user->registration_price < $request->payment) {
            $missing =  $request->payment - $user->registration_price;
            Alert::error('Payment Failed', 'You Are Overpaying ' . $missing . ' !!!');
            return redirect('/payment')->with('user_id', $user->id)->with('overpay', true)->with('overpay_amount', $missing);
        }

        // kalo pas
        if ($user->registration_price == $request->payment) {
            $missing = $user->registration_price - $request->payment;
            $user->coins = $user->coins + 100;
            $user->save();
            Alert::success('Payment Successful', 'You Have Successfully Registered');
            return redirect('/login');
        }
    }

    public function payment_over(Request $request)
    {
        $user = User::find($request->user_id);
        // convert to coinss

        $user->coins = $user->coins + $request->overpay;

        $user->save();

        Alert::success('Payment Successful', 'You Have Successfully Registered');
        return redirect('/login');
    }

    public function payment_from_over(Request $request)
    {
        // pindah ke payment lagi
        return redirect('/payment')->with('user_id', $request->user_id);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($credentials)) {
            return redirect('/home');
        } else {
            Alert::error('Login Failed', 'Wrong Email or Password');
            return redirect()->back();
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function index_profile($id)
    {
        $user = User::find($id);
        $FOW = FieldOfWork::all();
        $interest = Interest::all();
        $AC = AvatarCollection::all();
        $avatar = Avatar::all();
        return view('profile', ['user' => $user, 'FOW' => $FOW, 'interest' => $interest, 'AC' => $AC, 'avatar' => $avatar]);
    }

    public function wish(Request $request)
    {
        $user = auth()->user();
        $friend = User::find($request->user_id);

        // kalo ud pernah send fr
        $check1 = Wishlist::where('user1_id', $user->id)->where('user2_id', $friend->id)->first();
        $check2 = Wishlist::where('user1_id', $friend->id)->where('user2_id', $user->id)->first();
        if ($check1 || $check2) {
            Alert::error('Failed', 'You Have Already Sent A Request');
            return redirect('/home');
        }

        $wl = new Wishlist();
        $wl->user1_id = $user->id;
        $wl->user2_id = $friend->id;
        $wl->video_link = 'https://tinyurl.com/PPTI9SEM5';
        $wl->save();

        Alert::success('Friend Request Sent', 'You Have Successfully Sent A Friend Request To ' . $friend->name);
        return redirect('/home');
    }

    public function index_friends()
    {
        $user = auth()->user();
        $users = User::all();

        $req = Wishlist::where('user2_id', $user->id)->where('status2', 'pending')->get();
        $friends = Wishlist::where([['user1_id', '=', $user->id], ['status1', '=', 'accepted'], ['status2', '=', 'accepted']])->orWhere([['user2_id', '=', $user->id], ['status1', '=', 'accepted'], ['status2', '=', 'accepted']])->get();
        $pending = Wishlist::where('status2', 'pending')->where('user1_id', $user->id)->get();

        return view('friends', ['req' => $req, 'friends' => $friends, 'pending' => $pending, 'users' => $users]);
    }

    public function accept(Request $request)
    {
        $user = auth()->user();
        $friend = User::find($request->user_id);

        $wl = Wishlist::where('user1_id', $friend->id)->where('user2_id', $user->id)->first();
        $wl->status2 = 'accepted';
        $wl->save();

        Alert::success('Friend Request Accepted', 'You Have Successfully Accepted A Friend Request From ' . $friend->name);
        return redirect('/friends');
    }

    public function index_avatar()
    {
        $user = auth()->user();
        $AC = AvatarCollection::where('user_id', $user->id)->get();
        $avatar = Avatar::all();

        return view('avatar', ['user' => $user, 'avatar' => $avatar, 'AC' => $AC]);
    }

    public function index_topup()
    {
        $user = auth()->user();
        return view('topup', ['user' => $user]);
    }

    public function topup(Request $request)
    {
        $user = User::find($request->user_id);
        $user->coins = $user->coins + 100;
        $user->save();

        Alert::success('Topup Successful', 'You Have Successfully Added 100 Coins To Your Account');
        return redirect('/topup');
    }

    public function index_buy(Request $request)
    {
        $user = auth()->user();
        $avatar = Avatar::find($request->avatar_id);
        return view('buy', ['user' => $user, 'avatar' => $avatar]);
    }

    public function buy(Request $request)
    {


        $a = auth()->user();
        $user = User::find($a->id);
        $avatar = Avatar::find($request->avatar_id);

        $own = AvatarCollection::where('user_id', $user->id)->where('avatar_id', $request->avatar_id)->first();


        if ($own) {
            Alert::error('Failed', 'You Already Own This Avatar');
            return redirect('/avatar');
        }

        if ($user->coins < $avatar->price) {
            Alert::error('Failed', 'You Dont Have Enough Coins');
            return redirect('/avatar');
        } else {
            $user->coins = $user->coins - $avatar->price;
            $user->save();

            $AC = new AvatarCollection();
            $AC->user_id = $user->id;
            $AC->avatar_id = $avatar->id;
            $AC->save();

            Alert::success('Purchase Successful', 'You Have Successfully Purchased ' . $avatar->name);
            return redirect('/avatar');
        }
    }

    public function index_gift(Request $request)
    {
        $user = auth()->user();
        $rec = User::all();
        $avatar = Avatar::find($request->avatar_id);

        return view('gift', ['user' => $user, 'avatar' => $avatar, 'rec' => $rec]);
    }

    public function gift(Request $request)
    {
        $a = auth()->user();
        $user = User::find($a->id);
        $rec = User::find($request->rec_id);
        $avatar = Avatar::find($request->avatar_id);

        $own = AvatarCollection::where('user_id', $rec->id)->where('avatar_id', $request->avatar_id)->first();

        if ($own) {
            Alert::error('Failed', $rec->name . ' Already Owns This Avatar');
            return redirect('/avatar');
        }

        if ($user->coins < $avatar->price) {
            Alert::error('Failed', 'You Dont Have Enough Coins');
            return redirect('/avatar');
        } else {
            $user->coins = $user->coins - $avatar->price;
            $user->save();

            $AC = new AvatarCollection();
            $AC->user_id = $rec->id;
            $AC->avatar_id = $avatar->id;
            $AC->save();

            Alert::success('Purchase Successful', 'You Have Successfully Purchased ' . $avatar->name . ' For ' . $rec->name);
            return redirect('/avatar');
        }
    }

    public function index_showoff()
    {
        $user = auth()->user();
        $AC = AvatarCollection::where('user_id', $user->id)->get();
        $avatar = Avatar::all();

        return view('showoff', ['user' => $user, 'AC' => $AC, 'avatar' => $avatar]);
    }

    public function changepp(Request $request)
    {
        $a = auth()->user();
        $user = User::find($a->id);
        $avatar = Avatar::find($request->avatar_id);
        $user->profile_picture = $avatar->image;
        $user->save();

        Alert::success('Profile Picture Changed', 'You Have Successfully Changed Your Profile Picture');
        return redirect('/showoff');
    }

    public function index_myprofile()
    {
        $a = auth()->user();
        $user = User::find($a->id);
        $FOW = FieldOfWork::all();
        $interest = Interest::all();
        $AC = AvatarCollection::all();
        $avatar = Avatar::all();
        return view('myprofile', ['user' => $user, 'FOW' => $FOW, 'interest' => $interest, 'AC' => $AC, 'avatar' => $avatar]);
    }

    public function index_settings()
    {
        $user = auth()->user();
        return view('settings', ['user' => $user]);
    }

    public function invis(Request $request)
    {
        $user = User::find($request->user_id);
        $user->visible = 'no';
        $user->temp = $user->profile_picture;
        $user->profile_picture = 'bear' . rand(1, 3) . '.png';
        $user->coins = $user->coins - 50;
        $user->save();

        Alert::success('Invisibility Enabled', 'You Have Successfully Enabled Invisibility');
        return redirect('/settings');
    }

    public function vis(Request $request)
    {
        $user = User::find($request->user_id);
        $user->visible = 'visible';
        $user->profile_picture = $user->temp;
        $user->coins = $user->coins - 5;
        $user->save();

        Alert::success('Invisibility Disabled', 'You Have Successfully Disabled Invisibility');
        return redirect('/settings');
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $users = User::where('name', 'like', '%' . $name . '%')->where('gender', '!=', $request->gender)->where('visible', '=', 'visible')->get();
        $int = Interest::all();
        $fow = $request->fow;
        $FOW = FieldOfWork::all();

        return view('search_result', ['users' => $users, 'int' => $int, 'fow' => $fow, 'FOW' => $FOW]);
    }
}
