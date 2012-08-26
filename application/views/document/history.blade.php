<table class="table table-striped table-detail">
    <tr>
        <th>Date</th>
        <th>Action Taken</th>
        <th>Name</td>
        <th>Office</th>
        <th>Processing Time</th>
        <th>Remarks</th>
    </tr>
    @foreach($histories as $history)
        <tr>
            <td>{{$history->date_time}}</td>
            <td>{{$history->action}}</td>
            <td>{{$history->user->fname.', '.$history->user->lname}}</td>
            <td>{{$history->office->office_name}}</td>
            <td>&nbsp;</td>
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