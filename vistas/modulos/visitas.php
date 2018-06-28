<?php
    $ip = $_SERVER['REMOTE_ADDR'];
    //$ip = "163.172.160.190";
    //http://www.geoplugin.net/
    $informacionPais = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);
    //var_dump($informacionPais);
    $datosPais = json_decode($informacionPais);
    $pais = $datosPais->geoplugin_countryName;
    $codigo = $datosPais->geoplugin_countryCode;
    
    
    $enviarIp = ControladorVisitas::ctrEnviarIp($ip, $pais, $codigo);
    
    $totalVisitas = ControladorVisitas::ctrMostrarTotalVisitas();

?>
<!--========================================================
BREADCRUMB INFOPRODUCTO
=========================================================-->

<div class="container-fluid well well-sm">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb lead">
                <h2 class="pull-right"><small>Tu eres nuestro visitante # <?php echo $totalVisitas["total"] ?></small></h2>
            </ul>
        </div>
    </div>
</div>

<!--MODULO VISITAS-->

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <?php
                $paises = ControladorVisitas::ctrMostrarPaises();
                $coloresPaises = array("#09F","#900","#059","#260","#F09","#02A");
                foreach ($paises as $key => $value) {
                    
                    $promedio = $value["cantidad"] *100 / $totalVisitas["total"];
                    
                    echo '<div class="col-md-2 col-sm-4 col-xs-12 text-center">
                            <h2 class="text-muted">'.$value["pais"].'</h2>
                            <input type="text" class="knob" value="'. round($promedio).'" data-width="90" data-height="90" data-fgcolor="'.$coloresPaises[$key].'" data-readonly="true">
                            <p class="text-muted text-center" style="font-size: 12px">'. round($promedio).'% de las visitas</p>
                        </div>';
                }
            
            ?>
            
        </div>
    </div>
</div>