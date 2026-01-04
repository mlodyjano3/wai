document.addEventListener('DOMContentLoaded', function () {
    setupPrzelacznikKolorow();
    setupInfoOTworcy();
});
function setupPrzelacznikKolorow() {
    var navBar = document.querySelector('nav');
    // jezeli navbar istnieje to dodaje do niego przycisk zmieniajacy tryb na ciemny
    // (wymog "Modyfikacji elementów istniejących")
    // (wymog "Modyfikacja drzewa węzłów DOM" poprzez dodanie buttona)
    if (navBar) {
        var divZmianyKoloru = document.createElement('div');
        var przyciskZmianyKoloru_1 = document.createElement('button');
        if (divZmianyKoloru) {
            divZmianyKoloru.append(przyciskZmianyKoloru_1);
        }
        przyciskZmianyKoloru_1.textContent = 'Tryb ciemny';
        divZmianyKoloru.id = 'color-przelacznik';
        navBar.append(divZmianyKoloru);
        divZmianyKoloru.style.backgroundColor = "rgb(107, 59, 0)";
        divZmianyKoloru.style.cursor = 'pointer';
        // listener na przycisk 
        przyciskZmianyKoloru_1.addEventListener('click', function () {
            // po nacisnieciu wlacza tryb ciemny
            document.body.classList.toggle('tryb-ciemny');
            var czyAktywnyTrybCiemny = document.body.classList.contains('tryb-ciemny');
            if (czyAktywnyTrybCiemny) {
                przyciskZmianyKoloru_1.textContent = 'Tryb jasny';
            }
            else {
                przyciskZmianyKoloru_1.textContent = 'Tryb ciemny';
            }
        });
    }
}
function setupInfoOTworcy() {
    var listaKontaktu = document.querySelector('footer .footerdiv div ul.div_colors');
    if (listaKontaktu) {
        var elementTworcy = document.createElement('li');
        elementTworcy.textContent = 'Strona stworzona przez Jana Króla ';
        elementTworcy.style.marginTop = '10px';
        elementTworcy.style.borderTop = '1px dashed blanchedalmond';
        elementTworcy.style.paddingTop = '10px';
        listaKontaktu.appendChild(elementTworcy);
    }
}
