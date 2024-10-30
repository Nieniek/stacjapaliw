function updateValue(){
    let liczba=document.getElementById("cenamin").value;
    document.getElementById("cm").innerHTML=liczba;
};
function updateValuee(){
    let liczba=document.getElementById("cenaminn").value;
    document.getElementById("cmm").innerHTML=liczba;
};

document.getElementById("cm").innerHTML = document.getElementById("cenamin").value;
document.getElementById("cmm").innerHTML = document.getElementById("cenaminn").value;
