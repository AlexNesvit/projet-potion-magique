function ajouterIngredientExistant() {
    const container = document.getElementById('ingredientsExistants');
    const newIngredientDiv = document.querySelector('.ingredientExistant').cloneNode(true);
    newIngredientDiv.querySelectorAll('input, select').forEach(input => input.value = '');
    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '✖ supprimer';
    deleteButton.type = 'button';
    deleteButton.className = 'btn btn-danger btn-sm ms-2 fw-bold mt-2';
    deleteButton.onclick = function () {
        supprimerElement(this.parentElement);
    };
    newIngredientDiv.appendChild(deleteButton);
    container.appendChild(newIngredientDiv);
}

function ajouterEffetExistant() {
    const container = document.getElementById('effetsExistants');
    const newEffetDiv = document.querySelector('.effetsExistant').cloneNode(true);
    newEffetDiv.querySelectorAll('select').forEach(select => select.value = '');
    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '✖ supprimer';
    deleteButton.type = 'button';
    deleteButton.className = 'btn btn-danger btn-sm ms-2 fw-bold mt-2';
    deleteButton.onclick = function () {
        supprimerElement(this.parentElement);
    };
    newEffetDiv.appendChild(deleteButton);
    container.appendChild(newEffetDiv);
}

function supprimerElement(element) {
    element.remove();
}

function ajouterEtapePreparation() {
    const container = document.getElementById('etapesPreparation');
    const newEtapeDiv = document.querySelector('.etapePreparation').cloneNode(true);

    // Auto-incrémentation du numéro d'étape
    const numeroEtapeElements = container.getElementsByClassName('numeroEtape');
    const numeroEtape = numeroEtapeElements.length + 1;

    newEtapeDiv.querySelector('.numeroEtape').textContent = numeroEtape;
    newEtapeDiv.querySelector('input[type="hidden"]').value = numeroEtape;

    // Réinitialiser les valeurs des champs texte et textarea
    newEtapeDiv.querySelectorAll('textarea, input[type="text"]').forEach(input => input.value = '');

    // Ajouter le bouton de suppression
    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '✖ supprimer';
    deleteButton.type = 'button';
    deleteButton.className = 'btn btn-danger btn-sm ms-2 fw-bold mt-2';
    deleteButton.onclick = function () {
        supprimerEtape(this.parentElement);
    };
    newEtapeDiv.appendChild(deleteButton);

    container.appendChild(newEtapeDiv);
}

function supprimerEtape(element) {
    element.remove();
    // Réajuster les numéros d'étape après une suppression
    const etapes = document.querySelectorAll('#etapesPreparation .etapePreparation');
    etapes.forEach((etape, index) => {
        etape.querySelector('.numeroEtape').textContent = index + 1;
        etape.querySelector('input[type="hidden"]').value = index + 1;
    });
}