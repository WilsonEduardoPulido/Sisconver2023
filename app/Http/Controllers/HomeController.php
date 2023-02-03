<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Libro;
use App\Models\Elemento;
use App\Models\Prestamo;
use App\Models\Categoria;
use App\Models\Devolucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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


        $cantidadCategorias = Categoria::where('Estado', "=", "Activa")->select('id')->get();
        $cantidadLibros = Libro::where('Estado', "=", "Disponible")->select('id')->get();
        $cantidadPrestamos = Prestamo::where('Estado_Prestamo', "=", "Activo")->select('id')->get();
        $cantidadUsuarios = User::where('Estado', 'Activo')->select('id')->get();

        $cantidadDevoluciones = Devolucion::where('Estado_Devolucion', "=", "Activa")->select('id')->get();
        $totalcantidadActivosUsuarios = $cantidadUsuarios->count();
        $totalCategoriasActivas = $cantidadCategorias->count();
        $totalLibrosActivos = $cantidadLibros->count();
        $totalPrestamosActivos = $cantidadPrestamos->count();
        $totalDevolucionesRealizadas = $cantidadDevoluciones->count();
        $consultaGraficaCircuoPrimero =  User::where('Grado','=','Primero')->count();
        $consultaGraficaCircuoSegundo =  User::where('Grado','=','Segundo')->count();
        $consultaGraficaCircuoTercero =  User::where('Grado','=','Tercero')->count();
        $consultaGraficaCircuoCuarto =  User::where('Grado','=','Cuarto')->count();
        $consultaGraficaCircuoQuinto =  User::where('Grado','=','Quinto ')->count();
        $consultaGraficaCircuoSexto =  User::where('Grado','=','Sexto')->count();
        $consultaGraficaCircuoSeptimo =  User::where('Grado','=','Septimo')->count();
        $consultaGraficaCircuoOctavo =  User::where('Grado','=','Octavo')->count();
        $consultaGraficaCircuoNoveno =  User::where('Grado','=','Noveno')->count();
        $consultaGraficaCircuoDecimo =  User::where('Grado','=','Decimo')->count();
        $consultaGraficaCircuo =  User::where('Grado','=','Undecimo')->count();



        $cantidadusuariosActivos =DB::table('users')
        ->select('Grado')
        
        
        ->groupBy('Grado')
        ->count();

       

       


        $cantidadusuariosInactivos =DB::table('users')
        ->select('Estado')
        ->where('Estado','=','Primero')
        ->groupBy('Estado')
        ->count();
       

        $cantidadusuariosSancionados =DB::table('users')
        ->select('Estado')
        ->where('Estado','=','Segundo')
        ->groupBy('Estado')
        ->count();


        $cantidadusuariosSancionados =DB::table('users')
        ->select('Estado')
        ->where('Estado','=','Tercero')
        ->groupBy('Estado')
        ->count();


        $cantidadEstudiantesGrado =DB::table('users')
        ->select('Grado')
        ->where('Grado','=','Cuarto')
        ->groupBy('Grado')
        ->count();


        $cantidadEstudiantesGrado =DB::table('users')
        ->select('Grado')
        ->where('Grado','=','Undecimo')
        ->groupBy('Grado')
        ->count();
        
        
        


        

        $conusultaPrestamosdia = Prestamo::select('id', 'created_at')->groupBy('created_at');

      




        return view('Inicio.inicio', compact('totalCategoriasActivas', 'totalLibrosActivos', 'totalPrestamosActivos', 'totalDevolucionesRealizadas', 'totalcantidadActivosUsuarios','consultaGraficaCircuo','consultaGraficaCircuoPrimero','consultaGraficaCircuoSegundo','consultaGraficaCircuoTercero','consultaGraficaCircuoCuarto','consultaGraficaCircuoQuinto','consultaGraficaCircuoSexto','consultaGraficaCircuoSeptimo','consultaGraficaCircuoOctavo','consultaGraficaCircuoNoveno','consultaGraficaCircuoDecimo'));

    
}




}
