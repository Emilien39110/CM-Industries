<article class="form">
    <h2>Ajouter une nouvlle annonce de vente ou de location</h2>
    <form action='../MVC/ajouter.php' method='POST'>
        <label>Nom de l'annonce</label>
        <input type='text' name='nom'>
        <label>Localisation</label>
        <input type='text' name='localisation'>
        <label>Description</label>
        <input type='text' name='description'>
        <label>Prix</label>
        <input type='integer' name='prix'>
        <label for='choix'>Etiquette énergie</label>
        <select name='energie' id='choix'>
        <option value=''>--Choisir une option--</option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        <option value='E'>E</option>
        <option value='F'>F</option>
        <label for='choix'>Etiquette effet de serre</label>
        <select name='energie' id='choix'>
        <option value=''>--Choisir une option--</option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        <option value='E'>E</option>
        <option value='F'>F</option>
        <label for='choix' id='ok'>Location/vente</label>
        <select name='location' id='choix'>
        <option value=''>--Choisir une option--</option>
        <option value='1'>Oui</option>
        <option value='0'>Non</option>
        <input type='submit' name='action' value='envoyer'/>
    </form>
</article>
