<?php


class MainController {

  // fonction d'affichage dynamique
  function show($view, $viewVars = []){
    require __DIR__ . '/../views/header.tpl.php';
    require __DIR__ . '/../views/' . $view  . '.tpl.php';
    require __DIR__ . '/../views/footer.tpl.php'; 
  }

  // Pour l'affichage de la homepage
  function home(){
    $this->show('index');
  }

  // Pour afficher la page des produits 
  function products(){
    $this->show('products');
  }

  // Pour afficher la page about
  function about(){
    $this->show('about');
  }


  // Pour afficher la page a propos du magasin
  function store(){
    $weekOpeningHours = [
      'Sunday' => 'Closed', 
      'Monday' => '7:00 AM to 8:00 PM',
      'Tuesday' => '7:00 AM to 8:00 PM',
      'Wednesday' => '7:00 AM to 8:00 PM',
      'Thursday' => '7:00 AM to 8:00 PM',
      'Friday' => '7:00 AM to 8:00 PM',
      'Saturday' => '9:00 AM to 5:00 PM'
    ];

    $today = date("Y-m-d"); 
    $today = strtotime($today);
    $dayNumber = date('N', $today );
    $dayNumber = $dayNumber == 7 ? 0 : $dayNumber;
    $todayName = array_keys($weekOpeningHours)[$dayNumber];  
    $viewVars['weekOpeningHours'] = $weekOpeningHours;
    $viewVars['todayName'] = $todayName ;


    $this->show('store', $viewVars);
  }


}


?>