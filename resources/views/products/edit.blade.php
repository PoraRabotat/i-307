<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование {{$product->title}}</title>
</head>
<body>
    <div class="container">
<form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('put')

            <label for="title">Название продукта</label><br>
            <input id="title" name="title" type="text" required value="{{ $product->title }}"><br>

            <label for="description">Описание продукта</label><br>
            <textarea id="description" name="description" cols="30" rows="10" required>{{$product->description}}</textarea><br>

            <label for="price">Цена продукта</label><br>
            <input id="price" name="price" type="number"  required value="{{$product->price}}"><br>

            <input type="submit" value="Сохранить изменения">
        </form>
    </div>
</body>
</html>