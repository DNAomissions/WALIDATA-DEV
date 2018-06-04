<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $user = DB::table('users')->paginate(10);
        return view('menu/index',compact('user','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = 'menu';
        $parent = DB::table('users')->get();
        $user = DB::table('users')->get();
        return view('menu/add',compact('parent','user','url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // die(dd($request));
        DB::table('users')->insert([
          'nama'        => $request->nama,
          'parent_id'   => $request->parent,
          'user_id'     => $request->user,
          'created_at'   => date('Y-m-d'),
        ]);

        return redirect('/menu');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $kar    = DB::table('masterkarakteristik')->where('id',$id)->first();
      $parent = DB::table('masterkarakteristik')->get();
      $user   = DB::table('users')->get();
      $url    = 'menu/update/'.$id;
      return view('menu/add',compact('parent','user','kar','url'));
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
      // die(dd('update'));
      DB::table('masterkarakteristik')->where('id',$id)->update([
        'nama'        => $request->nama,
        'parent_id'   => $request->parent,
        'user_id'     => $request->user,
        'updated_at'  => date('Y-m-d')
      ]);
      return redirect('/menu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('masterkarakteristik')->where('id',$id)->delete();
        return redirect('/menu');
    }

//LINK FUNCTION
    public function all_links() 
    {
        $no = 1;
        $alllinks = DB::table('links as a')
                    ->orderby('id_link','desc')
                    ->paginate(10);
        return view('links/history',compact('alllinks','no'));            
    }


    public function index_links()
    {
        $no = 1;
        $karakter = DB::table('masterkarakteristik as a')
                    ->select( 'e.name as user', 'a.nama as menu', 'b.nama as sub_menu', 'c.link as url', 'b.id as id', 'c.id_link')
                    ->join('masterkarakteristik as b','a.id','=','b.parent_id')
                    ->leftjoin('links as c','a.id','=','c.karakteristik_id')
                    ->join('user_karakteristik as d','a.id','=','d.id_karakteristik')
                    ->join('users as e','d.id_user','=','e.id')
                    ->where('e.id',Auth::user()->id)
                    ->paginate(10);
        // die(dd($karakter));
        return view('links/link',compact('karakter','no'));
    }

    public function create_link()
    {
     
        $url = 'links/tambah';
        return view('links/add',compact('url'));
    }

    public function store_links(Request $request)
    {
        // die(dd($request));
        DB::table('links')->insert([
          'link'              => $request->link,
          'nama'              => $request->nama,
          'created_at'        => date('Y-m-d')
        ]);

        return redirect('/links/history');

    }

    public function edit_links($id)
    {
        $kar    = DB::table('links')->where('id_link',$id)->first();
        $url    = 'links/update/'.$id;
        return view('links/add',compact('kar','url','id'));
    }

    public function update_links(Request $request ,$id)
    {
        // die(dd($request));
        DB::table('links')->where('id_link',$id)->update([
         'nama'              => $request->nama,
          'link'              => $request->link,
          'updated_at'        => date('Y-m-d')
        ]);

        return redirect('/links/history');

    }

    public function update_links_stat(Request $request)
    {
        // die(dd($request->id));
        DB::table('links')->where('id_link',$request->id)->update([
          'status'              => $request->status,
          'updated_at'          => date('Y-m-d')
        ]);
        return redirect('/links/history');
    }

    public function destroy_links($id)
    {
        DB::table('links')->where('id_link',$id)->delete();
        return redirect('/links/history');
    }
    
    public function get_link($id)
	{
		$data = DB::select(" 
        select link
        from links
        where id_link = $id
        ");
        echo json_encode(array('data_link' => $data));
	}

//USER FUNCTION

public function index_user()
{
    $no = 1;
    $user = DB::table('users')->paginate(5);
    return view('user/index',compact('user','no'));
}

public function create_user()
{
    $url = 'user/tambah';
    return view('user/add',compact('url'));
}

public function store_user(Request $request)
{
    // die(dd($request));
    DB::table('users')->insert([
      'name'              => $request->nama,
      'email'             => $request->email,
      'password'          => $request->password,
      'role'              => $request->role,
      'created_at'        => date('Y-m-d')
    ]);

    return redirect('/user');

}

public function edit_user($id)
{

    $data_user   = DB::table('users')->where('id',$id)->first();
    $url    = 'user/update/'.$id;
    
    return view('user/add',compact('data_user','url'));
}

public function update_user(Request $request ,$id)
{
    // die(dd($request));
    DB::table('users')->where('id',$id)->update([
        'name'              => $request->nama,
        'email'             => $request->email,
        'password'          => $request->password,
        'role'              => $request->role,
        'created_at'        => date('Y-m-d')
    ]);

    return redirect('/user');

}

public function destroy_user($id)
{
    DB::table('users')->where('id',$id)->delete();
    return redirect('/user');
}

//add link
public function add_link()
{
    
}

}
