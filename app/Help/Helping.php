<?php 

namespace App\Help;

class Helping 
{
	

	public static function subir_Archivo($request, $carpetas, $anexo){
		//url es el path corto luego de el path publico a donde se encontrara el archivo.

		//anexo debe ser algo extra en el proyecto se usa por ejemplo MAT115/archivo.png donde anexo = "MAT115/"
		$file  = $request->file('file');
        $name = $anexo.time().$file->getClientOriginalName();
        $file->move(public_path().'/'.$carpetas,$name);
        return $name;
	}
}


 ?>