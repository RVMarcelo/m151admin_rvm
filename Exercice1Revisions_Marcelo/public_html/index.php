<?php
require './db.php';
require './UserFunctions.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Revisions Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header><h1>Formulaire</h1></header>
        <section>

            <form action="db.php" method="post">
                <div>
                    <?php
                    if (!isset($_GET['id'])) {
                        ShowFormNew();
                    } else {
                        ShowFormModif();
                    }
                    ?>                    
                </div>
            </form>            
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
