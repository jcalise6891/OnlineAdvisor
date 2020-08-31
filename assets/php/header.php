<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Advisor</title>

    <link rel="icon" href="/OnlineAdvisor/src/assets/img/star.ico" />
    <link rel="stylesheet" href="/OnlineAdvisor/assets/css/style.css">
    <link rel="stylesheet" href="/OnlineAdvisor/assets/css/style.css">
</head>

<body>
    <div class="main h-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/OnlineAdvisor/">Online Advisor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/OnlineAdvisor/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Example" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                    <button class="btn btn-outline-primary my-2 my-sm-0 mx-2" type="button" onclick="location.href='/OnlineAdvisor/login'">Login</button>
                    <button class="btn btn-outline-danger my-sm-0" type="button" onclick="location.href='/OnlineAdvisor/logout'" id="logOut" <?php if (isset($_SESSION['userMail'])) {
    echo "style='display:block'";
} else {
    echo "style='display:none'";
}?> >Logout</button>
                </form>
            </div>
        </nav>