{% extends "layout.php" %}

{% block content %}


  <div class="row">
        <div class="span7">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Dashboard</h3>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tbody>
                            {% for key, item in list %}
                            <tr>
                                <td class="sonata-ba-list-label" width="40%">
                                    {{ item }}
                                </td>
                                <td>
                                    <a class="btn btn-link btn-flat" href="{{url.generate('adminForm',{'entity': key , 'id': 0 })}}">+ Добавить новый</a> 
                                    <a class="btn btn-link btn-flat" href="{{url.generate('adminList',{'entity': key})}}">&Xi; Список</a>
                                </td>
                            </tr>
                            {% endfor%}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>


{% endblock %}