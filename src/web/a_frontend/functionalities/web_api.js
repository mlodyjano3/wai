document.addEventListener('DOMContentLoaded', function () {
    licznikWizyt();
});
function licznikWizyt() {
    var iloscOdwiedzinKlucz = 'ilosc_wizyt_strona';
    var pierwszaWizytaKlucz = 'pierwsza_wizyta_data';
    var iloscOdwiedzinString = localStorage.getItem(iloscOdwiedzinKlucz);
    var pierwszaWizytaDataString = localStorage.getItem(pierwszaWizytaKlucz);
    var iloscOdwiedzin = 0;
    var dataPierwszejWizytyDoWyswietlenia;
    if (iloscOdwiedzinString === null) {
        // danie zmiennej iloscOdwiedzin wartosci 1 przy pierwszych odwiedzynach strony
        iloscOdwiedzin = 1;
        // stworzenie stalych z datami
        var obiektDaty = new Date();
        var dzien = obiektDaty.getDate();
        var miesiac = obiektDaty.getMonth() + 1;
        var rok = obiektDaty.getFullYear();
        dataPierwszejWizytyDoWyswietlenia = "".concat(dzien < 10 ? '0' + dzien : dzien, ".").concat(miesiac < 10 ? '0' + miesiac : miesiac, ".").concat(rok);
        // localStorage - dodanie daty pierwszej wizyty (klucz + wartosc)
        localStorage.setItem(pierwszaWizytaKlucz, dataPierwszejWizytyDoWyswietlenia);
    }
    else {
        // jezeli iloscOdwiedzinString nie jest null, to uzytkownik juz byl na stronie - dodajemy kolejna wizyte do licznika
        iloscOdwiedzin = parseInt(iloscOdwiedzinString, 10) + 1;
        dataPierwszejWizytyDoWyswietlenia = pierwszaWizytaDataString || 'brak danych';
    }
    // localStorage - dodanie ilosci odwiedzin
    localStorage.setItem(iloscOdwiedzinKlucz, iloscOdwiedzin.toString());
    var opisSzachowDiv = document.getElementById('licznik');
    if (opisSzachowDiv) {
        var counterElement = document.createElement('p');
        counterElement.className = 'ilosc-odwiedzin-info';
        counterElement.textContent = "Witamy na stronie! Odwiedzi\u0142e\u015B t\u0119 stron\u0119 ju\u017C ".concat(iloscOdwiedzin, " razy, a twoja pierwsza wizyta by\u0142a ").concat(dataPierwszejWizytyDoWyswietlenia, ".");
        opisSzachowDiv.appendChild(counterElement);
    }
}
