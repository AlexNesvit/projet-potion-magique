
// Gestion des messages flash
document.addEventListener('DOMContentLoaded', () => {
    const flashMessages = document.querySelectorAll('.flash-message');
    flashMessages.forEach(flash => {
        setTimeout(() => { 
            flash.style.display = 'none'; 
        }, 5000); // Ferme le message après 5 secondes

        flash.querySelector('.close').addEventListener('click', () => {
            flash.style.display = 'none';
        });
    });
});