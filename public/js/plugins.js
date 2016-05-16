// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
$('#formID').validate({rules:{
                                Escuela: { required: true},
                                Asesor: { required: true},
                                E1Integrante1: { required: true},
                                E1Integrante2: { required: true},
                                E1Integrante3: { required: true}
                          },messages:{
                                Escuela: {required: "* El campo \"Escuela\" es obligatorio."},
                                Asesor: {required: "* El campo \"Asesor\" es obligatorio."},
                                E1Integrante1: {required: "* El campo \"Integrante1\" es obligatorio."},
                                E1Integrante2: {required: "* El campo \"Integrante2\" es obligatorio."},
                                E1Integrante3: {required: "* El campo \"Integrante3\" es obligatorio."}
                          }            
                    }); 