<p>{{ $reservation['user']['name'] }}様</p>
<p>ご来店予定日なりましたため、ご連絡を差し上げています。</br>ご予約内容は下記のとおりです。</p>
@if ( substr($reservation['time'], 0, 1) != 0 )
<p>ご予約の日時：{{ $reservation['date'] }}　{{ substr($reservation['time'], 0, 5) }}</br>ご予約人数：{{ $reservation['number'] }}名</br>ご予約者様：{{ $reservation['user']['name'] }}様</p>
@else
<p>ご予約の日時：{{ $reservation['date'] }}　{{ substr($reservation['time'], 1, 4) }}</br>ご予約人数：{{ $reservation['number'] }}名</br>ご予約者様：{{ $reservation['user']['name'] }}様</p>
@endif
<p>スタッフ一同お待ちしております。</br>{{ $reservation['shop']['name'] }}</p>