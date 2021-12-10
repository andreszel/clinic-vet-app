<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function testJquery()
    {
        return view('testjquery');
    }

    public function createPDF()
    {
        $html = '<h1>Test</h1><p>Enim et nulla laboris voluptate qui Lorem anim ipsum. Mollit deserunt aute mollit velit nisi excepteur eiusmod consectetur. Excepteur nostrud reprehenderit amet occaecat eu deserunt deserunt ea velit fugiat velit.</p>';
        // load a HTML string, file or view name
        //$pdf = App::make('dompdf.wrapper');
        //$pdf->loadHTML($html);
        //return $pdf->stream();

        // use the facade
        $data = array();
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'debugCss' => true, 'debugLayout' => true])->loadView('pdf.test', $data);

        return $pdf->download('test.pdf');

        // chain methods
        //return PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');

        // You can change the orientation and paper size, and hide or show errors (by default, errors are shown when debug is on)
        //return PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('test2.pdf');
    }

    public function testAjax()
    {
        return response()->json([
            'status' => 'success'
        ]);
    }
}
