let botonPR = document.getElementById("PR");
let botonPS = document.getElementById("PS");
let botonCS = document.getElementById("CS");
let botonLG = document.getElementById("LG");
let divBrayan = document.getElementById("DIVBRAYAN");
let divServicios = document.getElementById("DIVSERVICIOS");
let divSiabuc = document.getElementById("DIVSIABUC");
let divlogin = document.getElementById("DivLogin");
//CREAMOS EL METODO PARA QUE QUITE A TODOS LOS CONTENEDORES EL DIV ACTIVO Y SOLO
//SE LE ASIGNE A EL CORRESPONDIENTE RESPECTO AL BOTON.
botonCS.addEventListener('click', () => {
    if (divSiabuc.classList.contains('DIV-INACTIVO')) {
        divSiabuc.classList.remove('DIV-INACTIVO');
        divSiabuc.classList.add('DIV-ACTIVO');
        if( divServicios.classList.contains('DIV-ACTIVO'))
        {
            divServicios.classList.remove('DIV-ACTIVO')
            divServicios.classList.add('DIV-INACTIVO');
        }
        if( divBrayan.classList.contains('DIV-ACTIVO'))
        {
            divBrayan.classList.remove('DIV-ACTIVO')
            divBrayan.classList.add('DIV-INACTIVO');
        }
        if (divlogin.classList.contains('DIV-ACTIVO')) {
            divlogin.classList.remove('DIV-ACTIVO');
            divlogin.classList.add('DIV-INACTIVO');
        }
    }
});

botonPR.addEventListener('click', () => {
    if (divBrayan.classList.contains('DIV-INACTIVO')) {
        divBrayan.classList.remove('DIV-INACTIVO');
        divBrayan.classList.add('DIV-ACTIVO');
        if( divServicios.classList.contains('DIV-ACTIVO'))
        {
            divServicios.classList.remove('DIV-ACTIVO')
            divServicios.classList.add('DIV-INACTIVO');
        }
        if( divSiabuc.classList.contains('DIV-ACTIVO'))
        {
            divSiabuc.classList.remove('DIV-ACTIVO')
            divSiabuc.classList.add('DIV-INACTIVO');
        }
        if (divlogin.classList.contains('DIV-ACTIVO'))
        {
            divlogin.classList.remove('DIV-ACTIVO');
            divlogin.classList.add('DIV-INACTIVO');
        }
    }
});

botonPS.addEventListener('click', () => {
    if (divServicios.classList.contains('DIV-INACTIVO')) {
        divServicios.classList.remove('DIV-INACTIVO');
        divServicios.classList.add('DIV-ACTIVO');
        if( divBrayan.classList.contains('DIV-ACTIVO'))
        {
            divBrayan.classList.remove('DIV-ACTIVO')
            divBrayan.classList.add('DIV-INACTIVO');
        }
        if( divSiabuc.classList.contains('DIV-ACTIVO'))
        {
            divSiabuc.classList.remove('DIV-ACTIVO')
            divSiabuc.classList.add('DIV-INACTIVO');
        }
        if (divlogin.classList.contains('DIV-ACTIVO')) {
            divlogin.classList.remove('DIV-ACTIVO');
            divlogin.classList.add('DIV-INACTIVO');
        }
    }
});
botonLG.addEventListener('click', () => {
    if (divlogin.classList.contains('DIV-INACTIVO')) {
        divlogin.classList.remove('DIV-INACTIVO');
        divlogin.classList.add('DIV-ACTIVO');
        if( divBrayan.classList.contains('DIV-ACTIVO'))
        {
            divBrayan.classList.remove('DIV-ACTIVO')
            divBrayan.classList.add('DIV-INACTIVO');
        }
        if( divSiabuc.classList.contains('DIV-ACTIVO'))
        {
            divSiabuc.classList.remove('DIV-ACTIVO')
            divSiabuc.classList.add('DIV-INACTIVO');
        }
        if(divServicios.classList.contains('DIV-ACTIVO'))
        {
            divServicios.classList.remove('DIV-ACTIVO');
            divServicios.classList.add('DIV-INACTIVO');
        }
    }
});
// ------------------------------------FIN DE LOS BOTONES PARA MOSTRAR ------------------------------------