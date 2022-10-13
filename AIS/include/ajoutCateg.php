<?php require "menu.php";?>
<?php require "connexion.php";?>
<?php
if (isset($_GET['idsupp'])) {
	$requeteSQL = 'DELETE FROM categorie WHERE id ="' .$_GET['idsupp'].'"';
	$stmt = $dbh->prepare($requeteSQL);
	$stmt->execute();
}
?>
<?php
   if ( isset( $_POST['ajouter'] ) ) {
     $id = $_POST['id']; 
     $nom = $_POST['nomCateg']; 
     $requeteSQ = 'INSERT INTO categorie (id,nomCateg) VALUES ("'.$id.'","'.$nom.'")';
	 $stm = $dbh->prepare($requeteSQ);
	 $stm->execute();
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MATOS 43 - Accueil</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/../../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../style.css" rel="stylesheet" />
	</head> 
	<body>
			<div class="row">
				<div class="col">
					<div class="container">
						  <h1>Les Catégories</h1>
							  <table class="table table-dark">
								<thead>
								  <tr>
									<th>ID</th>
									<th>Nom Catégorie </th>
									<th>Supprimer</th>
								  </tr>
								</thead>
								<tbody>
									<?php 
										$requeteSQL = ' SELECT id, nomCateg
														from categorie
														WHERE 1=1 
														';
										$sth = $dbh->prepare($requeteSQL);
										$sth->execute();
										$categs = $sth->fetchAll();
										
									foreach ($categs as $c) {
										echo "<tr>" ;
										echo "	<th>". $c["id"]."</th>";
										echo "	<td>". $c["nomCateg"]."</td>";
										echo "  <td>";
										echo "<a href='ajoutCateg.php?idsupp=".$c["id"]."'
											onclick=\"return confirm('voulez vous vraiment supprimer cette catégorie?');\">
											Supprimer</a>";
										echo "  </td>";
										echo "</tr>";
									}
									?>
								</tbody>
							  </table>
						</div>
				 </div>
			</div>
	
			<section class="mb-4">

				<!--Section heading-->
				<h2 class="h1-responsive font-weight-bold text-center my-4">Ajouter une catégorie</h2>
				<!--Section description-->
				<p class="text-center w-responsive mx-auto mb-5">Proposez nous vos catégorie que vous souhaitriez voir sur notre site.</p>
					<div class="row">
							<div class="col-md-12">
								<div class="md-form mb-0">
										<form action="" method="post">
											<div class="text-center text-md-left">
												<p class="h1-responsive font-weight-bold text-center my-4">Entrer l'id</p>
											</div>
											<input type="text"  name="id" class="form-control" >
											<div class="text-center text-md-left">
												<p class="h1-responsive font-weight-bold text-center my-4">Entrer le nom</p>
											</div>
											<input type="text"  name="nomCateg" class="form-control" >
											<div class="text-center text-md-left">
											<input class ="btn btn-primary" type="submit" name="ajouter" value="Ajouter" onclick="return confirm('voulez vous vraiment ajouter cette catégorie?')" />
											</div>
										</form>			
								</div>
							</div>
					</div>
			</section>
		<!--Section: Contact v.2-->
		        <!-- Footer-->
        <footer class="py-5 bg-dark ">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Site Info 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
