<!DOCTYPE html>
<html>
<head><title>Список заявлений</title></head>
<body>
    <h1>Заявления</h1>
    <a href="{{ route('reports.create') }}">Создать заявление</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>№ Авто</th><th>Описание</th><th>Дата создания</th><th>Действия</th>
        </tr>
        @foreach($reports as $report)
        <tr>
            <td>{{ $report->car_number }}</td>
            <td>{{ $report->description }}</td>
            <td>{{ $report->created_at->format('d.m.Y H:i') }}</td>
            <td>
                <!-- Кнопки удаления/редактирования добавим на следующих шагах -->
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>