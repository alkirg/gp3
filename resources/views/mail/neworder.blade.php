Новый заказ №{{$order->id}}. Данные заказа:
<br><br>
Дата заказа: {{$order->created_at}}<br>
Имя: {{$order->name}}<br>
E-mail: {{$order->email}}<br>
Товар: {{$order->product->name}}<br>
<br>
Подробнее о заказе: <a href="{{$order->link}}">{{$order->link}}</a>
