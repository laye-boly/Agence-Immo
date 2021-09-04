var active = document.getElementById("active"),
    appartement_selling = document.getElementById("appartement-selling"),
    maison_selling = document.getElementById("maison-selling"),
    cantine_selling = document.getElementById("cantine-selling"),
    nbreDeEtages = document.getElementById("nbreDeEtages"),
    nbreDeGarages = document.getElementById("nbreDeGarages"),
    nbreDePiscines = document.getElementById("nbreDePiscines"),
    nbreDeJardins = document.getElementById("nbreDeJardins"),
    minSurface = document.getElementById("minSurface"),
    maxPrice = document.getElementById("maxPrice"),
    address = document.getElementById("address"),
    nbreDeChambres = document.getElementById("nbreDeChambres"),
    nbreDeSallesDeBain = document.getElementById("nbreDeSallesDeBain"),
    nbreDeCuisines = document.getElementById("nbreDeCuisines")
    nbreDeSalons = document.getElementById("nbreDeSalons");

active.style.display ="none";
console.log(active);
if(appartement_selling.classList.contains("active")){
    active.value = "appartements";
    activer([nbreDeChambres, nbreDeSallesDeBain, nbreDeCuisines, nbreDeSalons]);
    desactiver([nbreDeEtages, nbreDeGarages, nbreDePiscines, nbreDeJardins]);
}else if(maison_selling.classList.contains("active")){
    active.value = "maisons";
    activer([nbreDeChambres, nbreDeSallesDeBain, nbreDeCuisines, nbreDeSalons, nbreDeEtages, nbreDeGarages, nbreDePiscines, nbreDeJardins]);
    
}else{
    active.value = "cantines";
    desactiver([nbreDeChambres, nbreDeSallesDeBain, nbreDeCuisines, nbreDeSalons, nbreDeEtages, nbreDeGarages, nbreDePiscines, nbreDeJardins]);
}


$('#appartement-selling a').on('click', function (e) {
    e.preventDefault();
    active.value = "appartements";
    activer([nbreDeChambres, nbreDeSallesDeBain, nbreDeCuisines, nbreDeSalons]);
    desactiver([nbreDeEtages, nbreDeGarages, nbreDePiscines, nbreDeJardins]);
    $(this).tab('show');
});



$('#maison-selling a').on('click', function (e) {
    e.preventDefault();
    active.value = "maisons";
    activer([nbreDeChambres, nbreDeSallesDeBain, nbreDeCuisines, nbreDeSalons, nbreDeEtages, nbreDeGarages, nbreDePiscines, nbreDeJardins]);
    $(this).tab('show');
  });


$('#cantine-selling a').on('click', function (e) {
    e.preventDefault();
    active.value = "cantines";
    desactiver([nbreDeChambres, nbreDeSallesDeBain, nbreDeCuisines, nbreDeSalons, nbreDeEtages, nbreDeGarages, nbreDePiscines, nbreDeJardins]);
    $(this).tab('show');
})

var activeRenting = document.getElementById("activeRenting"),
    appartement_renting = document.getElementById("appartement-renting"),
    maison_renting = document.getElementById("maison-renting"),
    cantine_renting = document.getElementById("cantine-renting"),
    nbreDeEtagesRenting = document.getElementById("nbreDeEtagesRenting"),
    nbreDeGaragesRenting = document.getElementById("nbreDeGaragesRenting"),
    nbreDePiscinesRenting = document.getElementById("nbreDePiscinesRenting"),
    nbreDeJardinsRenting = document.getElementById("nbreDeJardinsRenting"),
    minSurfaceRenting = document.getElementById("minSurfaceRenting"),
    maxPriceRenting = document.getElementById("maxPriceRenting"),
    addressRenting = document.getElementById("addressRenting"),
    nbreDeChambresRenting = document.getElementById("nbreDeChambresRenting"),
    nbreDeSallesDeBainRenting = document.getElementById("nbreDeSallesDeBainRenting"),
    nbreDeCuisinesRenting = document.getElementById("nbreDeCuisinesRenting")
    nbreDeSalonsRenting = document.getElementById("nbreDeSalonsRenting");

activeRenting.style.display ="none";

    if(appartement_renting.classList.contains("active")){
        activeRenting.value = "appartements";
        activer([nbreDeChambresRenting, nbreDeSallesDeBainRenting, nbreDeCuisinesRenting, nbreDeSalonsRenting]);
        desactiver([nbreDeEtagesRenting, nbreDeGaragesRenting, nbreDePiscinesRenting, nbreDeJardinsRenting]);
    }else if(maison_renting.classList.contains("active")){
        activeRenting.value = "maisons";
        activer([nbreDeChambresRenting, nbreDeSallesDeBainRenting, nbreDeCuisinesRenting, nbreDeSalonsRenting, nbreDeEtagesRenting, nbreDeGaragesRenting, nbreDePiscinesRenting, nbreDeJardinsRenting]);
        
    }else{
        activeRenting.value = "cantines";
        desactiver([nbreDeChambresRenting, nbreDeSallesDeBainRenting, nbreDeCuisinesRenting, nbreDeSalonsRenting, nbreDeEtagesRenting, nbreDeGaragesRenting, nbreDePiscinesRenting, nbreDeJardinsRenting]);
    }
    
    
    $('#appartement-renting a').on('click', function (e) {
        e.preventDefault();
        activeRenting.value = "appartements";
        activer([nbreDeChambresRenting, nbreDeSallesDeBainRenting, nbreDeCuisinesRenting, nbreDeSalonsRenting]);
        desactiver([nbreDeEtagesRenting, nbreDeGaragesRenting, nbreDePiscinesRenting, nbreDeJardinsRenting]);
        $(this).tab('show');
    });
    
    
    
    $('#maison-renting a').on('click', function (e) {
        e.preventDefault();
        activeRenting.value = "maisons";
        activer([nbreDeChambresRenting, nbreDeSallesDeBainRenting, nbreDeCuisinesRenting, nbreDeSalonsRenting, nbreDeEtagesRenting, nbreDeGaragesRenting, nbreDePiscinesRenting, nbreDeJardinsRenting]);
        $(this).tab('show');
    });

    $('#cantine-renting a').on('click', function (e) {
        e.preventDefault();
        activeRenting.value = "cantines";
        desactiver([nbreDeChambresRenting, nbreDeSallesDeBainRenting, nbreDeCuisinesRenting, nbreDeSalonsRenting, nbreDeEtagesRenting, nbreDeGaragesRenting, nbreDePiscinesRenting, nbreDeJardinsRenting]);
        $(this).tab('show');
    })
    

function activer(active){
    for (const el of active) {
        el.style.display="block";
    }
}

function desactiver(desactive){
    for (const el of desactive) {
        el.style.display="none";
    }
}

$("#form-search-renting-container input").each(function(index, e){
    e.id += "renting";
    console.log(e.id);
});

