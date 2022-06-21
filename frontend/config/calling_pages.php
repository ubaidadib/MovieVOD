<?php

if (isset($_GET["p"])) {
    $page = $_GET["p"];
} else {
    $page = "home";
}

// echo $page;
class switch_pages {

    public function pages($page) {

        switch ($page) {

            case "home":
                $home = new home();
                $home->display_home($page);
                break;

            case "user":
                $home = new users();
                $home->display_user_home($page);
                break;

            case "admin":
                $home = new admin();
                $home->display_admin_home($page);
                break;

            case "about":
                $about_us = new about_us();
                $about_us->display_about_us($page);
                break;



            case "contact":
                $contact_us = new contact_us();
                $contact_us->display_contact_us($page);
                break;

            case "login":
                $login = new login();
                $login->display_login($page);
                break;
            
            case "view_post_details":
                $viewpost= new post();
                $viewpost->view_post_details($page);
                break;
            case "view_series_details":
                $viewpost= new post();
                $viewpost->view_series_details($page);
                break;
            
            
            
            case "movies":
                $movies = new movies();
                $movies->display_movies($page);
                break;


            case "series":
                $series = new series();
                $series->display_series($page);
                break;

            case "logout":
                $users = new users();
                $users->logout();
                break;

            default :
                $notfound = new notfound();
                $notfound->notfound404($page);
                break;
        }
    }

}
