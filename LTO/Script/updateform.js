var cityPlaces = {
    "BATANGAS": ["AGONCILLO", "ALITAGTAG", "BALAYAN", "BALETE", "BATANGAS", "BAUAN", "CALACA", "CALATAGAN", "CUENCA", "IBAAN", "LAUREL", "LEMERY", "LIAN", "LIPA", "LOBO", "MABINI", "MALVAR", "MATAASNAKAHOY", "NASUGBU", "PADRE GARCIA", "ROSARIO", "SAN JOSE", "SAN LUIS", "SAN NICOLAS", "SAN PASCUAL", "SANTA TERESITA", "SANTO TOMAS", "TAAL", "TALISAY", "TANAUAN", "TAYSAN", "TINGLOY", "TUY"],
    "CAVITE": ["ALFONSO", "AMADEO", "BACOOR", "CARMONA", "CAVITE CITY", "DASMARINAS", "GENERAL EMILIO AGUINALDO", "GENERAL MARIANO ALVAREZ", "GENERAL TRIAS", "IMUS", "INDANG", "KAWIT", "MAGALLANES", "MENDEZ", "MENDEZ", "NAIC", "NOVELOTA", "ROSARIO", "TAGAYTAY CITY", "TANZA", "TERNATE", "TRECE MARTIRES CITY",],
    "LAGUNA": ["ALAMINOS", "BANILAN", "BAY", "BINAN", "CABUYAO", "CALAMBA", "CALAUAN", "CAVINTI", "DEL REMEDIO", "FAMY", "KALAYAAN", "KAY-ANLOG, CALAMBA", "LILIW", "LOS BANOS", "LUISIANA", "MABITAC", "MAGDALENA", "MAJAYJAY", "MAKILING", "MAKATI", "MARIKINA", "MUNTINLUPA", "NAGCARLAN", "PAGSANJAN", "PAETE", "PANGIL", "PARIAN", "PILA", "PUNTA", "REAL", "RIZAL", "SAN ANTONIO", "SAN FRANCISCO", "SAN JUAN", "SAN NARCISO", "SAN PABLO", "SAN PEDRO", "SANTA CRUZ", "SANTA MARIA", "SANTA ROSA", "SANTO ANGEL", "SINILOAN", "TURBINA", "VICTORIA"],
    "NCR": ["CALOOCAN NORTH", "CALOOCAN SOUTH", "LAS PINAS", "MAKATI", "MALABON", "MANDALUYONG", "MANILA", "MARIKINA", "MUNTINLUPA", "NAVOTAS", "PARANAQUE", "PASAY", "PASIG", "PATEROS", "QUEZON CITY", "SAN JUAN", "TAGUIG", "VALENZUELA"],
    "QUEZON": ["AGDANGAN", "ALABAT", "BUENAVISTA", "BURDEOS", "CALAUAG", "CANDELARIA", "CATANAUAN", "DOLORES", "GENERAL LUNA", "GENERAL NAKAR", "GUINAYANGAN", "GUMACA", "INFANTA", "JOMALIG", "LOPEZ", "LUCBAN", "MACALELON", "MAUBAN", "MULANAY", "PADRE BURGOS", "PAGBILAO", "PANUKULAN", "PATNANUNGAN", "PEREZ", "PITOGO", "PLARIDEL", "POLILO", "QUEZON", "REAL", "SAMPALOC", "SAN ANDRES", "SAN ANTONIO", "SAN FRANCISCO", "SAN NARCISO", "SARIAYA", "TAGKAWAYAN", "TIAONG", "UNISAN"],
    "RIZAL": ["ANGONO", "ANTIPOLO", "BARAS", "BINANGONAN", "CAINTA", "CARDONA", "JALA-JALA", "MARIKINA", "MORONG", "PASIG", "PILILLA", "RODRIGUEZ", "SAN MATEO", "SANTO DOMINGO", "TANAY", "TERESA"]
};
function showPlacesDropdown(provinceDropdownId, placeSelectId) {
    var provinceDropdown = document.getElementById(provinceDropdownId);
    var placeSelect = document.getElementById(placeSelectId);
    var selectedProvince = provinceDropdown.value;

    // Clear the current options in the place dropdown
    placeSelect.innerHTML = '<option value="">SELECT A CITY</option>';

    // If a province is selected, populate the place dropdown with the cities for that province
    if (selectedProvince !== "") {
        var cities = cityPlaces[selectedProvince];
        for (var i = 0; i < cities.length; i++) {
            var option = document.createElement("option");
            option.value = cities[i];
            option.textContent = cities[i];
            placeSelect.appendChild(option);
        }
    }
}
