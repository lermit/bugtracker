<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>

  <body>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <h3><a href="/">Bugtracker</a></h3>
          <ul>
            <li><a href="#">Accueil</a></li>
            <li>
              <a href="#" class="menu">Tickets</a>
              <ul class="dropdown-menu">
                <li><a href="#" title"Add a ticket">Add</a></li>
                <li><a href="#" title"View all ticket">List</a></li>
                <li><a href="#" title"Advenced search">Advenced search</a></li>
              </ul>
            </li>
            <li><a href="#">Historique</a></li>
          </ul>
          <form action="">
            <input type="text" placeholder="Recherche" />
          </form>
          <ul class="nav secondary-nav">
              <li>
                <a href="#" class="menu">Connexion/Administration</a>
                <ul class="dropdown-menu">
                  <li><a href="contact.html" title="Voir la page contact">Contact</a></li>
                  <li><a href="#" title="Administration">Administration</a></li>
              </li>
            </ul>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
    <?php echo $sf_content ?>
    </div>

    <footer id="page-footer" >
      <p>Bugtracker Project is a simple working project designed to be study, not used!</p>
    </footer>
  </body>
</html>
