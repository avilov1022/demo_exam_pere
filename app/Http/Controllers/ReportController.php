<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Work;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{   
    private function isAdminByEmail($email)
    {
        return Auth::check() && Auth::user()->email === $email;
    }
    
    public function adminIndex()
    {
    if (!$this->isAdminByEmail('admin@mail.com')) {
       abort(403, 'Вы не адмиииииин');
    }
        $works = Work::all(); 
        $categories = Category::all();

        return view('admin', compact('works', 'categories'));
    }

    public function updateStatus(Request $request, $id)
    {
        $work = Work::findOrFail($id);
        $work->work_id = $request->input('category_id');
        $work->save();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:statues,id',
        ]);

        $work = Work::findOrFail($id);
        $work->category_id = $request->category_id;
        $work->save();

        return redirect()->route('admin.index')->with('success', 'Статус обновлён успешно!');
    }



    public function index()
    {
        $works = Work::where('user_id', Auth::id())->paginate(10);
        return view('welcome', ['works' => $works]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('request', compact('categories')); //('services', 'statues')); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'path_img' => 'mimes:jpeg,bmp,png',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageName = time() . '.' . $request->path_img->extension();
        $request->path_img->storeAs('reports', $imageName, 'public');
        $request->path_img->move(public_path('images'), $imageName);

        Work::create([
            'title' => $data['title'],
            'path_img' => $imageName,
            'category_id' => $data['category_id'],
            'user_id' => Auth::id(),
        ]);

        Log::info('Work created successfully.');

        return redirect('/')->with('message', 'Создание работы успешно!');
    }
}
