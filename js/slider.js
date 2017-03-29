$(document).ready(function () {
    submenu();
    $('#myCarousel').carousel({
        interval: 2000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
});




$('#ocultar_form_visitante').click(function(){
    $('#form_visitante').hide('low');
});

$('#ocultar_form_ingreso').click(function(){
    $('#form_ingreso').hide('low');
});

$('#facebook').click(function(){
    abrirsocial("https://www.facebook.com/AlcaldiadeGirardot");
});


$('#twitter').click(function(){
    abrirsocial("https://twitter.com/GirardotAlcald");
});


$('#youtube').click(function(){
    abrirsocial("https://www.youtube.com/channel/UClHI2rOkSnhextXTBoWYBGA");
});


$('#rss').click(function(){
    abrirsocial("http://girardot-cundinamarca.gov.co/RSS.shtml");
});

$('.login').click(function(){
    $('#facebook, #twitter, #youtube, #rss, .login').hide(500);
    $('#loguear, #registrar, #cancelarLogin').show(500);
});
$('#cancelarLogin').click(function(){
    $('#loguear, #registrar, #cancelarLogin').hide(500);
    $('#facebook, #twitter, #youtube, #rss, .login').show(500);
});

       
function abrirsocial(url)
{
    window.open(url, '_blank');
}

function irArticulo(di)
{
    var url = "core/php/verArticulo.php";
    $.ajax({
        type: "POST",
        url:url,
        data: {di:di},
        success: function(data)
        {
            $('section').html(data);
        }
    });
}

function submenu()
{
    $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
  });
}



