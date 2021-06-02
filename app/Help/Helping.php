<?php

namespace App\Help;

class Helping
{


	public static function subir_Archivo($request, $carpetas, $anexo){
		//url es el path corto luego de el path publico a donde se encontrara el archivo.

		//anexo debe ser algo extra en el proyecto se usa por ejemplo MAT115/archivo.png donde anexo = "MAT115/"
		$file  = $request->file('file');
		$original = Helping::reemplazar_caracter(" ","-", $file->getClientOriginalName());
        $name = $anexo.time().$original;
        $file->move(public_path().'/'.$carpetas,$name);
        return $name;
	}

	public static function reemplazar_caracter($valor_buscar, $valor_reemplazo, $cadena){
		return  str_replace($valor_buscar, $valor_reemplazo, $cadena);
	}



	public static function code_(){
     $a = array();
     $a[0] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
     $a[1] = $a[4] = rand(10, 99);
     $a[2] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
     $a[3] = rand(0, 9);
     $a[4] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 9);


    return $a[0].$a[1].$a[2].$a[3].$a[4];
   }


}


 ?>
