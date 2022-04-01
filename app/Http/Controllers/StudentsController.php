<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('Home.index', ['students'=>$students]);
    }
    public function show($id)
    {
        $students = Students::findorfail($id);
        return view('Home.show', ['student'=>$students]);
    }
    public function create()
    {
        return view('Home.create');
    }
    public function store(Request $request)
    {
        $lastname = Request()->input('lastname');
        $firstname = Request()->input('firstname');
        $birthday = Request()->input('birthday');
        $students = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'birthday' => $birthday,
                'isnewstudent' => True
                
            ];
        return view('Home.store', ['student'=>$students]);
    }
    public function edit($id)
    {
        abort_if(!(isset($this->students[$id])), 404);
        return view('Home.edit', ['student'=>$this->students[$id]]);   
    }
    public function update(Request $request, $id)
    {
        $lastname = Request()->input('lastname');
        $firstname = Request()->input('firstname');
        $birthday = Request()->input('birthday');
        $students = [
            $id => [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'birthday' => $birthday,
                'isnewstudent' => $isnewstudent
            ]    
        ];
        return view('Home.store', ['student'=>$this->students[$id]]);
    }
    public function destroy($id)
    {
        $this->students[$id] -> delete();
        return view('Home.index', ['students'=>$this->students]);
    }
    
   
}
