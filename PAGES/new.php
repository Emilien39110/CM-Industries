<article class="form">
    <h2>Ajouter une nouvelle annonce de vente ou de location</h2>
    <form action='./MVC/ajouter.php' method='post' ><!--enctype="multipart/form-data"-->
        <label>Nom de l'annonce</label>
        <input type='text' name='nom'>
        <label>Localisation</label>
        <input type='text' name='localisation'>
        <label>Description</label>
        <input type='text' name='description'>
        <label>Prix</label>
        <input type='integer' name='prix'>

        <label for='choix1'>Etiquette énergie</label>
        <select name='energie' id='choix1'>
        <option value=''>--Choisir une option--</option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        <option value='E'>E</option>
        <option value='F'>F</option>
        </select>

        <label for='choix2'>Etiquette Effet de serre</label>
        <select name='effetserre' id='choix2'>
        <option value=''>--Choisir une option--</option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        <option value='E'>E</option>
        <option value='F'>F</option>
        </select>

        <label for='choix3' id='ok'>Location/vente</label>
        <select name='location' id='choix3'>
        <option value=''>--Choisir une option--</option>
        <option value='1'>Location</option>
        <option value='0'>Vente</option>
        </select>
        <label>Image 1 :</label>
        <input type='file' name='image'/>
        <input type='submit' name='action' value='envoyer'/>
        </select>
    </form>

    <h2>Modification de rendez-vous</h2>
    <?php
        DisplayRdvPris ($rdv);
    ?>
</article>


<!-- $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); -->