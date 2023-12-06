document.addEventListener('DOMContentLoaded', () => {

    let c1 = document.getElementById('ck1');
    var i1 = document.getElementById('Hinicio');
    var i2 = document.getElementById('Htermino');
    c1.addEventListener('click', () => {
        let d1 = document.getElementById('Hini');
        if (c1.checked) {
            d1.classList.add('in-visible');
            d1.classList.remove('visible');
            i1.value=null;
        }else{
            d1.classList.add('visible');
            d1.classList.remove('in-visible');
        }
    })
    let c2 = document.getElementById('ck2');
    c2.addEventListener('click', () => {
        let d2 = document.getElementById('Hte');
        if (c2.checked) {
            d2.classList.add('in-visible');
            d2.classList.remove('visible');
            i1.value=null;
        }else{
            d2.classList.add('visible');
            d2.classList.remove('in-visible');
        }
    })

});