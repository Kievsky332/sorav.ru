function awu() {
    let a = document.getElementById("imglogo");
    if (a.value === "aw") {
        a.value = "sad";
        a.src = "https://cdn-icons-png.flaticon.com/512/12657/12657875.png" 
    } else if (a.value === "sad") {
        a.value = "aw";
        a.src = "https://cdn-icons-png.flaticon.com/512/10942/10942081.png"
    } else {
        console.log("error");
    }
}