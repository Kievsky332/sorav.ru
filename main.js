function awu() {
    let a = document.getElementById("imglogo");
    let b = document.getElementById("emoter");
    if (b.value === "1") {
        b.value = "0";
        a.src = "https://cdn-icons-png.flaticon.com/512/12657/12657875.png" 
    } else if (b.value === "0") {
        b.value = "1";
        a.src = "https://cdn-icons-png.flaticon.com/512/10942/10942081.png"
    } else {
        console.log("error");
    }
}
