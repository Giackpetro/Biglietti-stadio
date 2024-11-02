function vediDiv(mostra) {
    let div = document.getElementById("divPiuBiglietti");
    if (mostra) {
        div.classList.remove('hidden');
        div.style.display = "block";
        aggiungiCF();
    } else {
        div.classList.add('hidden');
        div.style.display = "none";
        document.getElementById("cfAggiuntivo").innerHTML = '';
    }
}

function aggiungiCF() {
    let numBiglietti = document.querySelector('input[name="nBigliettiAgg"]').value;
    let cfAggiuntivo = document.getElementById("cfAggiuntivo");
    cfAggiuntivo.innerHTML = '';

    for (let i = 1; i <= numBiglietti; i++) {
        let label = document.createElement('label');
        label.textContent = "Codice fiscale persona aggiuntiva " + i + ":";
        let input = document.createElement("input");
        input.type = "text";
        input.name = "altronome" + i;
        cfAggiuntivo.appendChild(label);
        cfAggiuntivo.appendChild(input);
        cfAggiuntivo.appendChild(document.createElement('br'));
    }
}