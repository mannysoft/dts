<table class="table table-striped table-detail">
    <tr>
        <th>Date</th>
        <th>Action Taken</th>
        <th>Name</td>
        <th>Station/Office</th>
        <th>Processing Time</th>
        <th>Remarks</th>
    </tr>
    @foreach($histories as $history)
        <tr>
            <td>{{$history->date_time}} <br /> {{$history->time_out}}</td>
            <td>{{$history->action}}</td>
            <td>{{$history->user->fname.', '.$history->user->lname}}</td>
            <td>{{$history->office->name}}, {{$history->station->name}}</td>
            <td>{{$history->process_time}}</td>
            <td>{{$history->remarks}}</td>
        </tr>
    @endforeach
    <tr>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>