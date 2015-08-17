<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    {% block stylesheet %}
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="/assets/ico/favicon.png">
    {% endblock stylesheet %}
    </head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="{{url.generate('homepage')}}">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="first"><a href="{{url.generate('homepage')}}">Главная</a></li>
              <li class="last"><a href="{{url.generate('dashboard')}}">CRUD</a></li>
            </ul>       
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>                 

    <div class="container">        
        <div id="content">
            {% block content %}
            {% endblock content %}
        </div>
        <br class="clearfix" />
        <hr>
        <footer>
          <p>&copy; Company 2015</p>
        </footer>
    </div>
    {% block javasript %}        
    <script src="/assets/js/jquery.js"></script>
    {% endblock javasript %}           
</body>
</html>