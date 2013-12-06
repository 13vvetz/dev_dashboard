<?php
 
class UsersController extends BaseController {

   protected $layout = "layouts.main";

   public function __construct() {
      $this->beforeFilter('csrf', array('on'=>'post'));

      // this special line is how you check for the cookie
      // is technically a filter 
      // the only parameter means only auth against the dashboard
      // not the whole thing

      // auth is out of the box though. It will look for
      // /login to redirect to by default.
      // We have to make our own filter instead in app/filters.php
      $this->beforeFilter('auth', array('only'=>array('getDashboard')));
   }

   public function getDashboard() {
      $this->layout->content = View::make('users.dashboard');  
   }

   public function getRegister() {
      $this->layout->content = View::make('users.register');
      // see how views/layouts/main.blade.php maps
      // see how the $content variable is echoed in it
   }

   public function postCreate() {
   // why here and not in model????
      $validator = Validator::make(Input::all(), User::$rules);
      // this magically validates the fields
 
      if ($validator->passes()) {
         // Input puts the shit into the object
         $user = new User;
         $user->firstname = Input::get('firstname');
         $user->lastname = Input::get('lastname');
         $user->email = Input::get('email');
         $user->password = Hash::make(Input::get('password'));
         // save() does the db insert 
         $user->save();
 
         return Redirect::to('users/login')->with('message', 'Thanks for registering!');

      } else {
         // send back to sign up form, but include input
         return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
      }    
   }

   public function getLogin() {
      $this->layout->content = View::make('users.login');
   }

   public function postSignin() {
      if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
         return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
      } else {
         return Redirect::to('users/login')
           ->with('message', 'Your username/password combination was incorrect')
           ->withInput();
      }        
   }

   public function getLogout() {
      Auth::logout();
      return Redirect::to('users/login')->with('message', 'Your are now logged out!');
   }

}


?>
