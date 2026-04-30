<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
</head>

<body>
    <div class="container">
        <div>
            <p>Информация о пользователе</p>
            <p>{{$user->name}}</p>
            <p>{{$user->email}}</p>
            <p>{{$user->buyer->tel}}</p>
            <p>{{$user->buyer->discount}}</p>
        </div>
        <a href="{{ route('products.create') }}">
            Создание продукта
        </a>
        <div>
            @foreach ($categories as $category)
                <h2>{{$category->title}}</h2>
                @foreach ($category->products as $product)
                <div class="card">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $product->price }}</p>
                    <p>{{ $product->description }}</p>
                    <p>Категория: {{ $product->category->title }}</p>
                    <div>
                        <p>Этот товар заказан в заказах с номерами:</p>
                        @foreach ($product->orders as $order)
                            <p>номер {{$order->id}} кол-во {{ $order->pivot->count}}</p>
                        @endforeach
                    </div>
                    <a href="{{route('products.show',$product)}}">
                        Просмотреть
                    </a><br>
                    <a href="{{route('products.edit',$product)}}">
                        Редактировать
                    </a><br>
                    <form action="{{ route('products.destroy',$product) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
                @endforeach
            @endforeach
        </div>

    </div>
</body>

</html>