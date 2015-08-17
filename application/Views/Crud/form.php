{% extends "layout.php" %}

{% block content %}


  <div class="row">
        <div class="span7">
            <div class="box">
            <ul class="breadcrumb">
              <li><a href="{{url.generate('homepage')}}">Главная</a> <span class="divider">/</span></li>
              <li><a href="{{url.generate('dashboard')}}">Dashboard</a> <span class="divider">/</span></li>
              <li><a href="{{url.generate('adminList',{'entity': entity})}}">{{entity}}</a> <span class="divider">/</span></li>
              <li class="active">{{item.id|default('New')}}</li>
            </ul>
                <div class="box-body">
                    <form method="post" action="{{url.generate('adminSave',{'entity':entity, 'id': item.id|default(0)})}}">
                    <table class="table table-hover">
                        <tbody>  
                        {% for key , field in list %}
                                <tr><td>{{field}}</td><td>{{this.render('Controller_Crud:action_form_field',{'item': item, 'field': key}) }}</td></tr>
                        {% endfor %}
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-success" value="Сохранить" />
                    <a href="{{url.generate('adminRemove',{'entity':entity , 'id': item.id })}}" class="btn btn-danger">Удалить</a>
                    </form>
                </div>
            </div>
        </div>  
    </div>


{% endblock %}