<?php

namespace App\Http\Controllers\fontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class verificationController extends Controller
{
   public function verify($token)
    {
        $user=User::where('remember_token',$token)->first();
        if (!is_null($user)) {
          $user->status=1;
          $user->remember_token=NULL;
          $user->save();
          session()->flush('success','Register successfuly..Log in now');
          return redirect('login');
        }
        else
        {
        session()->flash('errors', 'Sorry !! Your token is not matched !!');
        return redirect('/');
      }  
        }
}
