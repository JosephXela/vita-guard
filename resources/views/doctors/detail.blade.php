@foreach($schedules as $schedule)
<table class="table table-borderless table-sm mb-2">
    <tr>
        <th style="width:150px;">Hari Praktek</th>
        <td style="width:10px;">:</td>
        <td>{{ $schedule->day }}</td>
    </tr>
    <tr>
        <th>Jam Kerja</th>
        <td>:</td>
        <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
    </tr>
</table>
@endforeach
