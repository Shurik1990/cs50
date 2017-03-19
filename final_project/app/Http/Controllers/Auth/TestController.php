public function register()
   {
        $nickname = Request::get('name'); 
        $password = Request::get('password');

        $user = \DB::table('users')
            ->where('nickname', '=', $name)
            ->first();
            
        if (is_null($user)) {

            \DB::table('users')->insert(
                array('name' => $name, 'password' => $password)
            );
            
        } else {

        }
   }
   
   
 public function login()
   {
       $name = Request::get('name');
       $password = Request::get('password');

        $user_exist = \DB::table('users')
            ->where('name', '=', $name)
            ->where('password', '=', $password)
            ->first();

        if(is_null($user_exist)){
            return \Redirect::to('login');
        }else{

            \Session::set('name',$name);
            \Session::set('logged','yes');
            return \Redirect::to('filters');
        }
   }