<article class="ajout">
    <h2>Ajouter une nouvelle annonce de vente ou de location</h2>
    <form enctype="multipart/form-data" action='./MVC/ajouter.php' method='post' >
    <div>
        <label>Nom de l'annonce</label>
        <input type='text' name='nom'>
    </div>
    <div>
        <label>Localisation</label>
        <input type='text' name='localisation'>
    </div>
    <div>
        <label>Description</label>
        <input type='text' name='description'>
    </div>
    <div>
        <label>Prix</label>
        <input type='integer' name='prix'>
    </div>
    <div>
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
    </div>

    <div>
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
    </div>
    <div>
        <label>image 1</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <input type='file' name='fichierimage1'>
    </div>
    <div>
        <label>image 2</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <input type='file' name='fichierimage2'>
    </div>
    <div>
        <label>image 3</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <input type='file' name='fichierimage3'>
    </div>
    <div>
        <label for='choix4'>Type de bien</label>
        <select name='type' id='choix4'>
        <option value=''>--Choisir une option--</option>
        <option value='maison'>Maison</option>
        <option value='Appartement'>Appartement</option>
        <option value='terrain'>Terrain</option>
        </select>
    </div>

    <div>
        <label>surface</label>
        <input type='integer' name='surface'>
    </div>


    <div>
        <label for='choix3' id='ok'>Location/vente</label>
        <select name='location' id='choix3'>
        <option value=''>--Choisir une option--</option>
        <option value='1'>Location</option>
        <option value='0'>Vente</option>
        </select>
    </div>
    <div>
        <input type='submit' name='action' value='envoyer'/>
        </select>
    </div>
    </form>
</article>
<article class="ajout">
    <h2>Modification de rendez-vous</h2>
    <?php
        DisplayRdvPris ($rdv);
    ?>
</article>
<article class="ajout">
    <h2>Vente d'un bien</h2>
    <form action="PAGES/vendre.php" method="POST">
        <select id="id" name="id" required>
            <?php
                DisplayGoodsSellList($locations);
                DisplayGoodsSellList($transactions);
            ?>
        </select>
        <div>
            <input name="sumbit" type="submit" value="Vendre"/>
        </div>
    </form>
</article>

<!-- $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); -->