{% extends "layout.php" %}

{% block content %}

<div class="hero-unit">
  <h1>Тестовое задание</h1>
  <p><a href="{{url.generate('prodJson', {'id' : 55})}}" class="btn btn-primary btn-large">REST API &raquo;</a></p>
  <p><a href="{{url.generate('dashboard')}}" class="btn btn-primary btn-large">CRUD &raquo;</a></p>
  <p><a href="/install.php" class="btn btn-primary btn-large">Install &raquo;</a></p>
</div>

{% endblock %}