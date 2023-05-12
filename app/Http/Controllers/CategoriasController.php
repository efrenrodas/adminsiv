<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriasController extends Controller
{
    private $token='9020109d4dae2d24c2609de462ea52dc';
    private $dominio='https://campus23.siv.edu.ec/webservice/rest/server.php';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $functionname='core_course_get_categories';
        $serverurl=$this->dominio.'/webservice/rest/server.php'.'?wstoken='.$this->token.'&wsfunction='.$functionname.'&moodlewsrestformat=json';
        
        $categorias=Http::get($serverurl);

        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show($categorias)
    {
       // 
        // $functionname = 'core_course_get_courses';
        // $categoryid = 123; // ID de la categoría deseada
        // $params = array('categoryids' => array($categorias));
        // $serverurl = $this->dominio.'/webservice/rest/server.php'.'?wstoken='.$this->token.'&wsfunction='.$functionname.'&moodlewsrestformat=json';

        // $cursos = Http::post($serverurl, $params);
        // 

        // return view('categorias.show', compact('cursos'));
        
        $functionname = 'core_course_get_courses_by_field';
        $field = 'categoryid'; // Campo a buscar ('shortname' o 'fullname')
        $value = $categorias; // Valor a buscar
        $params = array('field' => $field, 'value' => $value);
        $serverurl = $this->dominio.'/webservice/rest/server.php'.'?wstoken='.$this->token.'&wsfunction='.$functionname.'&moodlewsrestformat=json';

        $cursos = Http::post($serverurl, $params);
        $courses=$cursos['courses'];
       #return response()->json($courses);
        return view('categorias.show', compact('courses'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        //
    }
}
