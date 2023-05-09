<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $data = Home::all();
        return view('dashboard', compact('data'));
    }

    public function store(Request $request)
    {
        $category = new Home();

        $category->name = $request->post('name');
        $category->email = $request->post('email');
        $category->phone = $request->post('phone');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads', $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect('dashboard')->with('msg', " Added Sucessfully");
    }

    public function edit($id)
    {
        $list = Home::find($id);
        return view('admin.formedit', compact('list'));
    }

    public function update($id, Request $request)
    {

        // $list = $request->all();
        // Ak::find($id)->update($list);
        // return redirect('form')->with('msg','Form data  updated');
        $category = Home::find($id);

        $category->name = $request->post('name');
        $category->email = $request->post('email');
        $category->phone = $request->post('phone');
        if ($request->hasfile('image')) {
            $destination = 'uploads/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads', $filename);
            $category->image = $filename;
        }
        $category->update();
        return redirect('dashboard')->with('msg', " updated Sucessfully");
    }

    public function delete(Request $request, $id)
    {

        $category = Home::find($id);
        $destination = 'uploads/' . $category->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect("dashboard")->with('status', ' Deleted successfullyy!!!');
    }

    //pagination

    public function paginate()
    {
        $data = Home::paginate(5);
        return view('admin.dashboard',compact('data'));
    }
}
