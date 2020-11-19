$(function () {
    $('body').materializeInputs();
    var getLocalStorage = localStorage.getItem("storeTypeTheme")

    if (getLocalStorage == 1) {
        $("#customSwitch3").prop('checked', true);
        $('#header-title').removeClass('header-background')
        $('#header-title').addClass('bd-b')
        document.head.insertAdjacentHTML("beforeend", `<link id="themeStyle" rel="stylesheet" href="/assets/css/skin.dark.css">`)
    } else {
        $("#customSwitch3").prop('checked', false);
        $('#header-title').addClass('header-background');
        $('#header-title').removeClass('bd-b');
        $('#themeStyle').remove()
    }
})

var storeTipoProyecto = "storeTypeTheme";
$('#customSwitch3').on('click', function () {
    if ($(this).is(':checked')) {

        $('#header-title').removeClass('header-background')
        $('#header-title').addClass('bd-b')
        // Hacer algo si el checkbox ha sido seleccionado
        localStorage.setItem("storeTypeTheme", 1)

        document.head.insertAdjacentHTML("beforeend", `<link id="themeStyle" rel="stylesheet" href="/assets/css/skin.dark.css">`)
    } else {
        $('#header-title').addClass('header-background');
        $('#header-title').removeClass('bd-b');
        localStorage.setItem("storeTypeTheme", 0)
        $('#themeStyle').remove()
    }
});
