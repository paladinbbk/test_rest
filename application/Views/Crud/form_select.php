<select name="{{field}}">
<option value="0">Не выбрано</option>
{% for item in items %}
    <option {% if item.id == value %}selected {% endif %}value="{{item.id}}">{{item.name}}</option>
{% endfor %}
</select>