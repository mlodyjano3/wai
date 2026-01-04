


document.addEventListener( 'DOMContentLoaded', () => {

    setupPrzelacznikKolorow();

    setupInfoOTworcy(); 

});

function setupPrzelacznikKolorow() {
    const navBar: Element | null = document.querySelector('nav');

    // jezeli navbar istnieje to dodaje do niego przycisk zmieniajacy tryb na ciemny
    // (wymog "Modyfikacji elementów istniejących")
    // (wymog "Modyfikacja drzewa węzłów DOM" poprzez dodanie buttona)
    if ( navBar ) {
        const divZmianyKoloru: HTMLDivElement = document.createElement('div');
        const przyciskZmianyKoloru: HTMLButtonElement = document.createElement('button');
        if ( divZmianyKoloru ) {
            divZmianyKoloru.append(przyciskZmianyKoloru);
        }

        przyciskZmianyKoloru.textContent = 'Tryb ciemny';
        divZmianyKoloru.id = 'color-przelacznik';

        
        navBar.append(divZmianyKoloru);
        divZmianyKoloru.style.backgroundColor = "rgb(107, 59, 0)"

        divZmianyKoloru.style.cursor = 'pointer';

        // listener na przycisk 
        przyciskZmianyKoloru.addEventListener('click', () => {

            // po nacisnieciu wlacza tryb ciemny
            document.body.classList.toggle('tryb-ciemny'); 
            
            const czyAktywnyTrybCiemny: boolean = document.body.classList.contains('tryb-ciemny');
            
            if ( czyAktywnyTrybCiemny ) {
                przyciskZmianyKoloru.textContent = 'Tryb jasny';
            } else {
                przyciskZmianyKoloru.textContent = 'Tryb ciemny';
            }

        });
    }
}


function setupInfoOTworcy(): void {
    const listaKontaktu: HTMLUListElement | null = document.querySelector('footer .footerdiv div ul.div_colors');
    
    if (listaKontaktu) {
        const elementTworcy: HTMLLIElement = document.createElement('li');
        
        elementTworcy.textContent = 'Strona stworzona przez Jana Króla '; 
        
        elementTworcy.style.marginTop = '10px';
        elementTworcy.style.borderTop = '1px dashed blanchedalmond';
        elementTworcy.style.paddingTop = '10px';
        
        listaKontaktu.appendChild(elementTworcy); 
    }
}