{% extends "layout.php" %}

{% block content %}


  <div class="row">
        <div class="span7">
            <div class="box">
            <ul class="breadcrumb">
              <li><a href="{{url.generate('homepage')}}">Главная</a> <span class="divider">/</span></li>
              <li><a href="{{url.generate('dashboard')}}">Dashboard</a> <span class="divider">/</span></li>
              <li class="active">{{entity}}</li>
            </ul>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            {% for item in list %}
                                <th>{{item}}</th>
                            {% endfor %}
                            <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        {% for item in items %}
                            <tr>
                                {% for field in list|keys %}
                                <td>{{this.render('Controller_Crud:action_list_field',{'item': item, 'field': field}) }}</td>
                                {% endfor %}
                                <td>
                                    <a href="{{url.generate('adminForm',{'entity':entity , 'id': item.id })}}" class="btn btn-primary btn-mini">Изменить</a>
                                    <a href="{{url.generate('adminRemove',{'entity':entity , 'id': item.id })}}" class="btn btn-danger btn-mini">Удалить</a>
                                </td>
                            </tr>
                        {% endfor %}
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-inverse" href="{{url.generate('adminForm',{'entity': entity , 'id': 0 })}}">+ Добавить новый</a> 
            </div>
        </div>  
    </div>


{% endblock %}