jQuery(document).ready(function($) {
    let toToggle = $(".main-navigation")
    let svgOpen = $(".svg-2")
    let svgClose = $(".svg-1")
    let svgElement = $(".svg-ham")
    svgElement.click(function() {
            toToggle.toggleClass("active-menu");
            svgClose.toggleClass("active-svg-close");
            svgOpen.toggleClass("active-svg-open");
        });
});