<?php

/**
* 
*/
class ControladorPlantilla
{
	/**
	 *
	 * LLAMAMOS LA PLANTILLA
	 *
	 */
	
	public function plantilla(){
		include "vistas/plantilla.php";
	}





	/*=====================================================================
	=            TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA            =
	=====================================================================*/
	
	static public function ctrEstiloPlantilla(){ //coloquei static me fez perder 2 dias
		$tabla = "plantilla";
		$respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);
		return $respuesta;
	}
	
	/*=====  End of TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA  ======*/
        
        
        
        
        /*====================================================================
         * TRAEMOS LAS CABECERAS
        ===================================================================== */
      static public function ctrTraerCabeceras($ruta) {
          $tabla = "cabeceras";
          $respuesta = ModeloPlantilla::mdlTraerCabeceras($tabla, $ruta);
          return $respuesta;
      }
        
	
}