<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Arduino SmartAquarium</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/starter-template.css" rel="stylesheet">

  </head>
  <body>
 
      
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SmartAquarium</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Accueil</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </body>
    <?php
	$bdd = new PDO('mysql:host=aquatest;dbname=donnees;charset=utf8', 'root', '');

    $nom = $_GET['nom'];
    $valeurs = $_GET['valeurs'];
    $nvvaleurs = $_GET['nvvaleurs'];
/*    rajout de ligne   
 $req = $bdd->prepare('INSERT INTO variables(nom, valeurs) VALUES(:nom, :valeurs)');
$req->execute(array(
	'nom' => $nom,
	'valeurs' => $valeurs
    ));
   */
    $req = $bdd->prepare('UPDATE variables SET valeurs = :nvvaleur WHERE valeur = :valeurs');
$req->execute(array(
	'nvvaleurs' => $nvvaleurs,
    'valeurs' => $valeurs
	));
    
    
    $reponse = $bdd->query('SELECT valeurs FROM variables');
    while ($donnes = $reponse->fetch())
    {
        
        echo $donnes['valeurs'] . '<br />';
    }
    
    $reponse->closeCursor();
?>

    </p>
    
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.js"></script>
</html>