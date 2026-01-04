function wlaczAccordiona() {
    // najpierw trzeba sprawdzic czy uzytkonwik jest we wlasciwym pliku (top_gracze.html)
    const czyTopGracze = window.location.pathname.includes('top_gracze.html');
    if ( czyTopGracze ) {
        // wyszukiwanie diva z aktywnymi graczami poprzez id
        const $aktywniGraczeDiv = $('#aktywni');
        // wyszukiwanie kazdego pojedynczego diva gracza poprzez klase
        const $gracze = $aktywniGraczeDiv.find('.gracz');

        // dla kazdego gracza wlaczamy nowa strukture
        $gracze.each( 
            function(indeks, element) {
                const $gracz = $( element) ;
                const $naglowek = $gracz.find('h3').first();

                const tekstNaglowka = $naglowek.text();
                $naglowek.empty().text(tekstNaglowka);

                // tworzy diva ktory jest panelem
                const $divAkord = $('<div class="panel_gracza" ></div>');

                // tresc aktualnego gracza do jego dedykowanegi diva
                $divAkord.append($gracz.find('.table'));
                $divAkord.append($gracz.find('.player_image'));
                $divAkord.append($gracz.find('.opis_top'));

                // dodanie kontentu do diva aktywnych graczy 
                $aktywniGraczeDiv.append($naglowek)
                $aktywniGraczeDiv.append($divAkord)

                // modyfkacja drzewa dom - usuwamy niepotrzebne
                $gracz.remove();
            });

        $aktywniGraczeDiv.find('h2:first').remove();
        // dodawanie accordiona
        $aktywniGraczeDiv.accordion({
            collapsible: true,
            active: false,
            heightStyle: "content"
        });
    }
}; 

 
$(function() {
    $('#newsletter-potwierdzenie').dialog({

        // nie bedzie otwieralo
        autoOpen: false, 
        modal: true,     
        
        buttons: {
            "OK": function() {
                $(this).dialog("close");
            }
        }
    });

    /*
    $('#newsletterForm').on("submit", function(event) {
        // nie bedzie odswiezalo po wyslaniu forma
        event.preventDefault();
        // otwiera dialog z wczesniej
        $('#newsletter-potwierdzenie').dialog("open");
    }); */

    // znajduje przycisk submit i nadaje mu efekt gdy hover
    $('#newsletterForm').find('button[type="submit"]').on('mouseenter', function() {
        $(this).stop(true, true).effect("highlight", {color: "#ffeeaa"}, 500); 
    });


    wlaczAccordiona();
});