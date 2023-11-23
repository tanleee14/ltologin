
     function toggleTextbox() {
         var radioButton = document.getElementById('others');
         var textbox1 = document.getElementById('textbox1');
         

         if (radioButton.checked) {
             textbox1.disabled = false;
         } else {
             textbox1.disabled = true;
         }
     
     }
     //For disabling text hair
     function toggleTextbox2() {
         var eyeButton = document.getElementById('otherseyes');
         var textbox2 = document.getElementById('textbox2');
         if (eyeButton.checked) {
             textbox2.disabled = false;
         } else {
             textbox2.disabled = true;
         }
     }
         // Define an object that maps cities to their respective places and for cities and province
         var cityPlaces = {
             "BATANGAS": ["AGONCILLO", "ALITAGTAG", "BALAYAN", "BALETE", "BATANGAS", "BAUAN", "CALACA", "CALATAGAN", "CUENCA", "IBAAN", "LAUREL", "LEMERY", "LIAN", "LIPA", "LOBO", "MABINI", "MALVAR", "MATAASNAKAHOY", "NASUGBU", "PADRE GARCIA", "ROSARIO", "SAN JOSE", "SAN LUIS", "SAN NICOLAS", "SAN PASCUAL", "SANTA TERESITA", "SANTO TOMAS", "TAAL", "TALISAY", "TANAUAN", "TAYSAN", "TINGLOY", "TUY"],
             "CAVITE": ["ALFONSO", "AMADEO", "BACOOR", "CARMONA", "CAVITE CITY", "DASMARINAS", "GENERAL EMILIO AGUINALDO", "GENERAL MARIANO ALVAREZ", "GENERAL TRIAS", "IMUS", "INDANG", "KAWIT", "MAGALLANES", "MENDEZ", "MENDEZ", "NAIC", "NOVELOTA", "ROSARIO", "TAGAYTAY CITY", "TANZA", "TERNATE", "TRECE MARTIRES CITY",],
             "LAGUNA": ["ALAMINOS", "BANILAN", "BAY", "BINAN", "CABUYAO", "CALAMBA", "CALAUAN", "CAVINTI", "DEL REMEDIO", "FAMY", "KALAYAAN", "KAY-ANLOG, CALAMBA", "LILIW", "LOS BANOS", "LUISIANA", "MABITAC", "MAGDALENA", "MAJAYJAY", "MAKILING", "MAKATI", "MARIKINA", "MUNTINLUPA", "NAGCARLAN", "PAGSANJAN", "PAETE", "PANGIL", "PARIAN", "PILA", "PUNTA", "REAL", "RIZAL", "SAN ANTONIO", "SAN FRANCISCO", "SAN JUAN", "SAN NARCISO", "SAN PABLO", "SAN PEDRO", "SANTA CRUZ", "SANTA MARIA", "SANTA ROSA", "SANTO ANGEL", "SINILOAN", "TURBINA", "VICTORIA"],
             "NCR": ["CALOOCAN NORTH", "CALOOCAN SOUTH", "LAS PINAS", "MAKATI", "MALABON", "MANDALUYONG", "MANILA", "MARIKINA", "MUNTINLUPA", "NAVOTAS", "PARANAQUE", "PASAY", "PASIG", "PATEROS", "QUEZON CITY", "SAN JUAN", "TAGUIG", "VALENZUELA"],
             "QUEZON": ["AGDANGAN", "ALABAT", "BUENAVISTA", "BURDEOS", "CALAUAG", "CANDELARIA", "CATANAUAN", "DOLORES", "GENERAL LUNA", "GENERAL NAKAR", "GUINAYANGAN", "GUMACA", "INFANTA", "JOMALIG", "LOPEZ", "LUCBAN", "MACALELON", "MAUBAN", "MULANAY", "PADRE BURGOS", "PAGBILAO", "PANUKULAN", "PATNANUNGAN", "PEREZ", "PITOGO", "PLARIDEL", "POLILO", "QUEZON", "REAL", "SAMPALOC", "SAN ANDRES", "SAN ANTONIO", "SAN FRANCISCO", "SAN NARCISO", "SARIAYA", "TAGKAWAYAN", "TIAONG", "UNISAN"],
             "RIZAL": ["ANGONO", "ANTIPOLO", "BARAS", "BINANGONAN", "CAINTA", "CARDONA", "JALA-JALA", "MARIKINA", "MORONG", "PASIG", "PILILLA", "RODRIGUEZ", "SAN MATEO", "SANTO DOMINGO", "TANAY", "TERESA"]
         };

 
         function showPlacesDropdown() {
             var proviceDropdown = document.getElementById("province-dropdown");
             var cityDropdown = document.getElementById("province-dropdown");
             var placeSelect = document.getElementById("place-select");
             var selectedCity = cityDropdown.value;
 
             // Clear the current options in the place dropdown
             placeSelect.innerHTML = '<option value="">SELECT A CITY</option>';
 
             // If a city is selected, populate the place dropdown with the places for that city
             if (selectedCity !== "") {
                 var places = cityPlaces[selectedCity];
                 for (var i = 0; i < places.length; i++) {
                     var option = document.createElement("option");
                     option.value = places[i];
                     option.textContent = places[i];
                     placeSelect.appendChild(option);
                 }
                 placesDropdown.style.display = "block";
             } else {
                 placesDropdown.style.display = "none";
             }
         }

         var cityPlaces2 = {
             "BATANGAS": ["AGONCILLO", "ALITAGTAG", "BALAYAN", "BALETE", "BATANGAS", "BAUAN", "CALACA", "CALATAGAN", "CUENCA", "IBAAN", "LAUREL", "LEMERY", "LIAN", "LIPA", "LOBO", "MABINI", "MALVAR", "MATAASNAKAHOY", "NASUGBU", "PADRE GARCIA", "ROSARIO", "SAN JOSE", "SAN LUIS", "SAN NICOLAS", "SAN PASCUAL", "SANTA TERESITA", "SANTO TOMAS", "TAAL", "TALISAY", "TANAUAN", "TAYSAN", "TINGLOY", "TUY"],
             "CAVITE": ["ALFONSO", "AMADEO", "BACOOR", "CARMONA", "CAVITE CITY", "DASMARINAS", "GENERAL EMILIO AGUINALDO", "GENERAL MARIANO ALVAREZ", "GENERAL TRIAS", "IMUS", "INDANG", "KAWIT", "MAGALLANES", "MENDEZ", "MENDEZ", "NAIC", "NOVELOTA", "ROSARIO", "TAGAYTAY CITY", "TANZA", "TERNATE", "TRECE MARTIRES CITY",],
             "LAGUNA": ["ALAMINOS", "BANILAN", "BAY", "BINAN", "CABUYAO", "CALAMBA", "CALAUAN", "CAVINTI", "DEL REMEDIO", "FAMY", "KALAYAAN", "KAY-ANLOG, CALAMBA", "LILIW", "LOS BANOS", "LUISIANA", "MABITAC", "MAGDALENA", "MAJAYJAY", "MAKILING", "MAKATI", "MARIKINA", "MUNTINLUPA", "NAGCARLAN", "PAGSANJAN", "PAETE", "PANGIL", "PARIAN", "PILA", "PUNTA", "REAL", "RIZAL", "SAN ANTONIO", "SAN FRANCISCO", "SAN JUAN", "SAN NARCISO", "SAN PABLO", "SAN PEDRO", "SANTA CRUZ", "SANTA MARIA", "SANTA ROSA", "SANTO ANGEL", "SINILOAN", "TURBINA", "VICTORIA"],
             "NCR": ["CALOOCAN NORTH", "CALOOCAN SOUTH", "LAS PINAS", "MAKATI", "MALABON", "MANDALUYONG", "MANILA", "MARIKINA", "MUNTINLUPA", "NAVOTAS", "PARANAQUE", "PASAY", "PASIG", "PATEROS", "QUEZON CITY", "SAN JUAN", "TAGUIG", "VALENZUELA"],
             "QUEZON": ["AGDANGAN", "ALABAT", "BUENAVISTA", "BURDEOS", "CALAUAG", "CANDELARIA", "CATANAUAN", "DOLORES", "GENERAL LUNA", "GENERAL NAKAR", "GUINAYANGAN", "GUMACA", "INFANTA", "JOMALIG", "LOPEZ", "LUCBAN", "MACALELON", "MAUBAN", "MULANAY", "PADRE BURGOS", "PAGBILAO", "PANUKULAN", "PATNANUNGAN", "PEREZ", "PITOGO", "PLARIDEL", "POLILO", "QUEZON", "REAL", "SAMPALOC", "SAN ANDRES", "SAN ANTONIO", "SAN FRANCISCO", "SAN NARCISO", "SARIAYA", "TAGKAWAYAN", "TIAONG", "UNISAN"],
             "RIZAL": ["ANGONO", "ANTIPOLO", "BARAS", "BINANGONAN", "CAINTA", "CARDONA", "JALA-JALA", "MARIKINA", "MORONG", "PASIG", "PILILLA", "RODRIGUEZ", "SAN MATEO", "SANTO DOMINGO", "TANAY", "TERESA"]
         };

         function showPlacesDropdown2() {
             var proviceDropdown2 = document.getElementById("province-dropdown2");
             var cityDropdown2 = document.getElementById("province-dropdown2");
             var placeSelect2 = document.getElementById("place-select2");
             var selectedCity2 = cityDropdown2.value;
 
             // Clear the current options in the place dropdown
             placeSelect2.innerHTML = '<option value="">SELECT A CITY</option>';
 
             // If a city is selected, populate the place dropdown with the places for that city
             if (selectedCity2 !== "") {
                 var places2 = cityPlaces2[selectedCity2];
                 for (var i = 0; i < places2.length; i++) {
                     var option2 = document.createElement("option");
                     option2.value = places2[i];
                     option2.textContent = places2[i];
                     placeSelect2.appendChild(option2);
                 }
                 placesDropdown2.style.display = "block";
             } else {
                 placesDropdown2.style.display = "none";
             }
         }