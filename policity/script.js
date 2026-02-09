  document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('mousemove', (e) => {
        const f = document.getElementById("check");
        const subm = document.getElementById("sbm");

        if (f.checked ){
            subm.disabled = 0;
        }else {
            subm.disabled = 1;
        };
    });    

}); 