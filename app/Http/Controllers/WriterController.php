<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RegisterWriter;
use Illuminate\Support\Facades\Session;

class WriterController extends Controller
{

    public function index()
    {
        Session::put('active_menu', 'member');
        $lists = RegisterWriter::all();
        return view('admin.writer.main', compact('lists'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $info = RegisterWriter::find($id);
        return view('admin.writer.detail', compact('info'));
    }

    public function edit($id)
    {
        $info = RegisterWriter::find($id);
        return view('admin.writer.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        RegisterWriter::where('id', $id)
            ->update($request->except('_token', '_method'));
        return $this->index();
    }

    public function destroy($id)
    {
        //
    }
}
