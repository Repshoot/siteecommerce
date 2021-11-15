<?php
    require('controller/controller.php');

    try {
        if(isset($_GET['page'])){

            if($_GET['page']=='accueil'){
                home();
            }
            else if($_GET['page']=='avis'){
                if(isset($_POST['note']) && !empty($_POST['message'])) {
                    addTestimonials(htmlspecialchars($_POST['note']), htmlspecialchars($_POST['message']));
                }
                testimonials();
            }
            else{
                throw new Exception('Cette page n\'existe pas.');
            }
        }
        else {
            home();
        }
    } catch(Exception $e) {
        //die('Erreur : '.$e->getMessage());
        // ON UTILISE PAS DIE
        // MAIS ON CREE UNE VARIABLE ERROR ET
        // UNE VUE C'EST PLUS PROPRE
        $error = $e->getMessage();
        require('view/errorView.php');
    }


