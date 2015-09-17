<div class="panel panel-default">
    <div class="panel-heading">Личные данные</div>
    <div class="table-responsive"><table class="table table-striped table-hover">
        <tr>
            <td width="200px">Код</td>
            <td><?=detemiro::user()->id;?></td>
        </tr>
        <tr>
            <td>Логин</td>
            <td><?=detemiro::user()->login;?></td>
        </tr>
        <tr>
            <td>Дата регистрация</td>
            <td><?=detemiro::user()->registration;?></td>
        </tr>
        <tr>
            <td>Права</td>
            <td><?=implode(', ', detemiro::user()->rules);?></td>
        </tr>
        <tr>
            <td>Группы</td>
            <td><?=implode(', ', detemiro::user()->groups);?></td>
        </tr>
        <tr>
            <td>IP</td>
            <td><?=detemiro::user()->ip;?></td>
        </tr>
        <tr>
            <td>Агент</td>
            <td><?=detemiro::user()->agent;?></td>
        </tr>
    </table></div>
</div>