<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать заявление</title>
</head>
<body>
    <h1>Новое заявление</h1>
    <a href="{{ route('reports.index') }}">Назад к списку</a>

    <!-- Отображение ошибок валидации (если будут) -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Форма создания -->
    <form action="{{ route('reports.store') }}" method="POST">
        @csrf <!-- Защита от CSRF атак -->
        
        <p>
            <label for="car_number">Номер автомобиля:</label><br>
            <input type="text" id="car_number" name="car_number" value="{{ old('car_number') }}">
        </p>

        <p>
            <label for="description">Описание нарушения:</label><br>
            <textarea id="description" name="description" rows="4" cols="50">{{ old('description') }}</textarea>
        </p>

        <button type="submit">Создать</button>
    </form>
</body>
</html>