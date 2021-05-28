<?php
    require_once 'utils.php';
    $paths = get_file_paths();
    $cssfs = $paths[0];
    $jsfs = $paths[1];
    $bootstrap = "bootstrap-5.0.1-dist\\";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php foreach($cssfs as $f){
        //if(ends_with(".css", $f)){    
     ?>
    <link rel="stylesheet" href="<?php echo $bootstrap."css\\".$f ?>">
    <?php }//} ?>

    <?php 
      foreach($jsfs as $f){
        if(ends_with(".js", $f)){    
     ?>
    <script type="text/javascript" src="<?php echo $bootstrap."js\\".$f ?>"></script>
    <?php }} ?>

</head>
<body>
          <?php require_once 'blocs/navdabr.php' ?>
          <div class="container">
            <div class="row">
              <div class="col-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque assumenda necessitatibus accusamus, ipsum autem similique quasi, rerum omnis dignissimos error molestiae, ut magni ea. Quod vitae id sint provident qui.
              </div>

              <div class="col-6">
                <h1>Formulaire d'inscription d'un nouveau étudiant</h1>
                <form class="row g-6" method="post" action="validationForm.php" enctype="multipart/form-data">
                
                  <div class="col-md-6">

                    <label for="firstname1" class="form-label" >nimportequoi</label>
                    <input type="text" class="form-control" id="firstname1" name="nom">

                  </div>
                  <div class="col-md-6">

                    <label for="lastname1" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="lastname1" name="prenom">

                  </div>
                  <div class="col-md-12">

                    <label for="#" class="form-label col-md-4">Date de naissance</label>

                    <select id="jrns" class="form-select col-md-4" name="jour">
                      <option selected>---- Jour ----</option>
                      <?php for($i=1; $i<=31; $i++){ ?>
                        <option><?php echo $i ?></option>
                      <?php } ?>
                    </select>

                    <select id="msns" class="form-select col-md-4" name="mois">
                      <option selected>---- Mois ----</option>
                      <?php for($i=1; $i<=12; $i++){ ?>
                        <option><?php echo date('F', mktime(0, 0, 0, $i, 10)); ?></option>
                      <?php } ?>
                    </select>

                    <select id="anns" class="form-select col-md-4" name="annee">
                      <option selected>---- Année ----</option>
                      <?php for($i=1895; $i<=(2021-18); $i++){ ?>
                        <option><?php echo $i ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="edresse">
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Entrer votre photo d'identité</label>
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                  </div>

                  <div class="col-6">
                    
                    <button type="submit" class="btn btn-primary" name="submit" value="ok">Envoyer</button>
                    
                  </div>
                
                </form>
              </div>
            </div>
          </div>
  </body>
</html>