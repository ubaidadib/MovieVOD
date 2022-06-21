<?php

if (isset($_GET["p"])) {
    $page = $_GET["p"];
} elseif (isset($_SESSION["isAdminloggedin"])) {
    $page = "home";
}

class switch_pages {

    public function pages($page) {

        switch ($page) {

            case "home":
                $home = new admin();
                $home->display_overview($page);
                break;

            case "profile":
                $sec = new profile();
                $sec->display_account();
                break;



            case "add_user":
                $new_user = new admin();
                $new_user->display_add_user();
                break;

            case "add_admin":
                $new_user = new admin();
                $new_user->display_add_admin();
                break;

            case "logout":
                $logout = new admin();
                $logout->logout();
                break;

            case "edit_user":
                $edit_user = new admin();
                $edit_user->display_edit_user_role();
                break;

            case "appoint_user":
                $appoint_users = new admin();
                $appoint_users->appoint_user();
                break;


            case "delete":
                $users = new admin();
                $users->delete();
                break;

            case "appoint_admin":
                $set_admin = new admin();
                $set_admin->appoint_admin();
                break;


            case "UsersList":
                $users = new lists();
                $users->user_list();
                break;

            case "Users":
                $users = new lists();
                $users->users();
                break;

            case "admin_table":
                $users = new lists();
                $users->admin();
                break;


            case "admins":
                $adminlist = new lists();
                $adminlist->admin_list();
                break;

            case "security":
                $sec = new profile();
                $sec->display_security($page);
                break;

            case "show_posts":
                $show_post = new post();
                $show_post->display_post_area();
                break;

            case "add_movie_post":
                $movie_post = new post();
                $movie_post->display_add_movie_post();
                break;

            case "movies":
                $movie = new movies();
                $movie->display_movies();
                break;

            case "add_movie":
                $add_movie = new movies();
                $add_movie->display_add_movie();
                break;

            case "movies_edit":
                $movie_edit = new movies();
                $movie_edit->display_edit_movie();
                break;

            case "movies_post":
                $movies_post = new post();
                $movies_post->movie_post();
                break;

            case "series_post":
                $series_post = new post();
                $series_post->series_post();
                break;

            case "series":
                $series = new series();
                $series->display_series();
                break;

            case "add_series":
                $add_series = new series();
                $add_series->display_add_series();
                break;

            case "series_edit":
                $edit_series = new series();
                $edit_series->display_edit_series();
                break;

            case "add_series_post":
                $series_post = new post();
                $series_post->display_add_series_post();
                break;


            default :
                $notfound = new notfound();
                $notfound->notfound404($page);
                break;
        }
    }

}
