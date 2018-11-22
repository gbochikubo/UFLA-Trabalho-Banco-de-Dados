seletores = document.querySelectorAll("input[type=checkbox]");

seletores.forEach(seletor => {
    seletor.addEventListener("change", function (evt) {
        input = document.getElementById(evt.target.dataset.destino);
        input.readOnly = !seletor.checked;
    });
});

form = document.querySelector("form");
form.addEventListener("submit", function (evt) {
    modificou = false;

    for (const seletor in seletores) {
        if (seletores.hasOwnProperty(seletor)) {
            const element = seletores[seletor];
            if (element.checked) {
                modificou = true;
                break;
            }
        }
    }

    if (!modificou) {
        alert("Modifique as informações para poder atualizá-las.")
        evt.preventDefault();
    }
});