$(document).ready(function () {
    setTimeout(function () {
        script.iniciar();
    }, 100);
});

const script = {
    sidebar_toggle: function () {
        $('#toggle-menu-button').click(() => {
            if ($('#app').hasClass("sidebar-open")) {
                $('#app').removeClass("sidebar-open");
            }else{
                $('#app').addClass("sidebar-open");
            }
        })
    },

    sidebar_section_toggle: function () {
        $('ul.sidebar-menu div').click(function (e) {
            if ($(e.target).parents('li:first').hasClass("active")) {} else{
                $(e.target).parents('ul.sidebar-menu').find('li').removeClass("active");
                $(e.target).parents('li:first').addClass("active");
            }
        })
    },

    iniciar: function (){
        this.sidebar_toggle();
        this.sidebar_section_toggle();
    }
}