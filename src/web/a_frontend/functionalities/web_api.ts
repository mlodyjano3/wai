


document.addEventListener('DOMContentLoaded', () => {

    licznikWizyt();

});

function licznikWizyt(): void {
    const iloscOdwiedzinKlucz: string = 'ilosc_wizyt_strona';
    const pierwszaWizytaKlucz: string = 'pierwsza_wizyta_data';

    let iloscOdwiedzinString: string | null = localStorage.getItem(iloscOdwiedzinKlucz);
    let pierwszaWizytaDataString: string | null = localStorage.getItem(pierwszaWizytaKlucz);
    
    let iloscOdwiedzin: number = 0;
    let dataPierwszejWizytyDoWyswietlenia: string;

    if (iloscOdwiedzinString === null) { 
        // danie zmiennej iloscOdwiedzin wartosci 1 przy pierwszych odwiedzynach strony
        iloscOdwiedzin = 1;

        // stworzenie stalych z datami
        const obiektDaty: Date = new Date(); 
        const dzien: number = obiektDaty.getDate();
        const miesiac: number = obiektDaty.getMonth() + 1;
        const rok: number = obiektDaty.getFullYear();

        dataPierwszejWizytyDoWyswietlenia =`${dzien < 10 ? '0' + dzien : dzien}.${miesiac < 10 ? '0' + miesiac : miesiac}.${rok}`;

        // localStorage - dodanie daty pierwszej wizyty (klucz + wartosc)
        localStorage.setItem( pierwszaWizytaKlucz, dataPierwszejWizytyDoWyswietlenia);
        
    } else {
        // jezeli iloscOdwiedzinString nie jest null, to uzytkownik juz byl na stronie - dodajemy kolejna wizyte do licznika
        iloscOdwiedzin = parseInt(iloscOdwiedzinString, 10) + 1;

        dataPierwszejWizytyDoWyswietlenia = pierwszaWizytaDataString || 'brak danych';
    }

    // localStorage - dodanie ilosci odwiedzin
    localStorage.setItem(iloscOdwiedzinKlucz, iloscOdwiedzin.toString());

    const opisSzachowDiv = document.getElementById('licznik'); 

    if ( opisSzachowDiv)  {
        const counterElement: HTMLParagraphElement = document.createElement('p');

        counterElement.className = 'ilosc-odwiedzin-info';
        
        counterElement.textContent = `Witamy na stronie! Odwiedziłeś tę stronę już ${iloscOdwiedzin} razy, a twoja pierwsza wizyta była ${dataPierwszejWizytyDoWyswietlenia}.`;
        
        opisSzachowDiv.appendChild(counterElement); 
    }
}