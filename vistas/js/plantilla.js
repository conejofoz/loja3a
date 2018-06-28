/*=============================================
 PLANTILLA
 =============================================*/

var rutaOculta = $("#rutaOculta").val();

//TOOLTIP
$('[data-toggle="tooltip"]').tooltip();


$.ajax({

    url: rutaOculta + "ajax/plantilla.ajax.php",
    success: function (respuesta) {

        //console.log(JSON.parse(respuesta).colorFondo);

        var colorFondo = JSON.parse(respuesta).colorFondo;
        var colorTexto = JSON.parse(respuesta).colorTexto;
        var barraSuperior = JSON.parse(respuesta).barraSuperior;
        var textoSuperior = JSON.parse(respuesta).textoSuperior;

        $(".backColor, .backColor a").css({"background": colorFondo,
            "color": colorTexto})

        $(".barraSuperior, .barraSuperior a").css({"background": barraSuperior,
            "color": textoSuperior})

    }


});






/*=============================================
 QUADRICULA O LISTA
 =============================================*/
/*var btnList = $(".btnList");
 
 for(var i = 0; i < btnList.length; i++){
 $("#btnGrid"+i).click(function(){
 var numero = $(this).attr("id").substr(-1); //a variavel i se perde dentro de uma funcao
 $(".list"+numero).hide();
 $(".grid"+numero).show();
 
 // COLORIR O BOTAO SELECIONADO
 $("#btnGrid"+numero).addClass("backColor");
 //$("#btnList"+numero).removeClass("backColor");
 });
 
 $("#btnList"+i).click(function(){
 var numero = $(this).attr("id").substr(-1); //a variavel i se perde dentro de uma funcao
 $(".list"+numero).show();
 $(".grid"+numero).hide();
 
 // COLORIR O BOTAO SELECIONADO
 // $("#btnGrid"+numero).removeClass("backColor");
 $("#btnList"+numero).addClass("backColor");
 });
 }*/




var btnList = $(".btnList");

for (var i = 0; i < btnList.length; i++) {

    $("#btnGrid" + i).click(function () {


        var numero = $(this).attr("id").substr(-1);


        $(".list" + numero).hide();
        $(".grid" + numero).show();

        //$("#btnGrid"+numero).removeClass("btn btn-default");
        $("#btnGrid" + numero).addClass("backColor");
        //$("#btnGrid"+numero).css("background-color", "#fc510d");
        $("#btnList" + numero).removeClass("backColor");
//                var cla = $(this).attr("class");
//                alert(cla);

    })

    $("#btnList" + i).click(function () {

        var numero = $(this).attr("id").substr(-1);

        $(".list" + numero).show();
        $(".grid" + numero).hide();

        $("#btnGrid" + numero).removeClass("backColor");
        $("#btnList" + numero).addClass("backColor");

    })

}






/*=============================================
 EFECTOS CON EL SCROLL
 =============================================*/
$(window).scroll(function () {
    var scrolly = window.pageYOffset;

    //    APLICAR O EFEITO SOLAMENT EM DISPOSITIVOS MAIORES QUE 768PX
    if (window.matchMedia("(min-width:768px)").matches) {
        if ($(".banner").html() != null) {
            if (scrollY < ($(".banner").offset().top)) {
                $(".banner img").css({"margin-top": -scrolly / 2 + "px"})
            } else {
                scrolly = 0;
            }
        }
    }
})



$.scrollUp({
    scrollText: "",
    scrollSpeed: 2000,
    easingType: "easeOutQuint"
});




/*=============================================
 MIGAS E PÃO
 =============================================*/
var pagActiva = $(".pagActiva").html();
if (pagActiva != null) {
    var regPagActiva = pagActiva.replace(/-/g, " ");
    $(".pagActiva").html(regPagActiva);
}





/*=============================================
 ENLACES PAGINACION
 =============================================*/
var url = window.location.href;
var indice = url.split("/");//cria um array explodindo na barra /

//não estava colorindo os botões//if(indice.pop() != "#"){
$("#item" + indice.pop()).addClass("active");
//}









/*=============================================
 OFERTAS
 =============================================*/
$(".cerrarOfertas").click(function () {
    $(this).parent().remove();
})

if($("#moduloOfertas").children().length == 0){

	$("#moduloOfertas").html(
		'<div class="jumbotron">'+

		'<h1 class="text-center">Lo sentimos</h1>'+

			'<h3 class="text-center">¡En estos momentos no hay ofertas disponibles!</h3>'+ 
				 
		'</div>'

	);
}


/*=============================================
 CONTADOR DE TIEMPO
 =============================================*/

var finOferta = $(".countdown");
var fechaFinOferta = [];

for (var i = 0; i < finOferta.length; i++) {

    fechaFinOferta[i] = $(finOferta[i]).attr("finOferta");

    $(finOferta[i]).dsCountDown({

        endDate: new Date(fechaFinOferta[i]),

        theme: 'flat',

        titleDays: 'Días',

        titleHours: 'Horas',

        titleMinutes: 'Minutos',

        titleSeconds: 'Segundos'


    });
}

/*=============================================
CONTADOR DE TIEMPO OFERTAS PRODUCTOS
=============================================*/

var finOferta2 = $('.countdown2').attr("finOferta");

$('.countdown2').dsCountDown({
	endDate: new Date(finOferta2),
	theme: 'black',
	titleDays: 'Dias', 
	titleHours: 'Horas', 
	titleMinutes: 'Min', 
	titleSeconds: 'Seg'

});







/*
 * EVENTOS PIXEL DE FACEBOOK
 */
$(".pixelCategorias").click(function(){
    var titulo = $(this).attr("titulo") ;
    fbq('track', 'Categoria '+titulo, {
        title: titulo
    })
})
$(".pixelSubCategorias").click(function(){
    var titulo = $(this).attr("titulo") ;
    fbq('track', 'SubCategoria '+titulo, {
        title: titulo
    })
})
$(".pixelOferta").click(function(){
    var titulo = $(this).attr("titulo") ;
    fbq('track', 'Oferta '+titulo, {
        title: titulo
    })
})
