<article class="ajout">
    <h2>Ajouter une nouvelle annonce de vente ou de location</h2>
    <form enctype="multipart/form-data" action='./MVC/ajouter.php' method='post' >
    <div>
        <label>Nom de l'annonce</label></br>
        <input type='text' name='nom'></br></br>
    </div>
    <div>
        <label>Localisation</label></br>
        <input type='text' name='localisation'></br></br>
    </div>
    <div>
        <label>Description</label></br>
        <input type='text' name='description'></br></br>
    </div>
    <div>
        <label>Prix</label></br>
        <input type='integer' name='prix'></br></br>
    </div>
    <div>
        <label for='choix1'>Etiquette énergie</label></br>
        <select name='energie' id='choix1'>
        <option value=''>--Choisir une option--</option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        <option value='E'>E</option>
        <option value='F'>F</option>
        </select></br></br>
    </div>

    <div>
        <label for='choix2'>Etiquette Effet de serre</label></br>
        <select name='effetserre' id='choix2'>
        <option value=''>--Choisir une option--</option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        <option value='E'>E</option>
        <option value='F'>F</option>
        </select></br></br>
    </div>
    <div>
        <label>Image 1</label></br>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <input type='file' name='fichierimage1'></br></br>
    </div>
    <div>
        <label>Image 2</label></br>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <input type='file' name='fichierimage2'></br></br>
    </div>
    <div>
        <label>Image 3</label></br>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <input type='file' name='fichierimage3'></br></br>
    </div>
    <div>
        <label for='choix4'>Type de bien</label></br>
        <select name='type' id='choix4'>
        <option value=''>--Choisir une option--</option>
        <option value='maison'>Maison</option>
        <option value='Appartement'>Appartement</option>
        <option value='terrain'>Terrain</option>
        </select></br></br>
    </div>
    <div>
        <label for='choix3' id='ok'>Location/vente</label></br>
        <select name='location' id='choix3'>
        <option value=''>--Choisir une option--</option>
        <option value='1'>Location</option>
        <option value='0'>Vente</option>
        </select></br></br>
    </div>
    <div>
        </br><input type='submit' name='action' value='envoyer'/>
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