@layout('template')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-head tabs">
                <h3>My Documents</h3>
                <ul class='nav nav-tabs'>
                    <li class='active'>
                        <a href="#basic" data-toggle="tab">Basic</a>
                    </li>
                    <li>
                        <a href="#nohead" data-toggle="tab">No header</a>
                    </li>
                </ul>
            </div>
            <div class="box-content box-nomargin">
                <div class="tab-content">
                        <div class="tab-pane active" id="basic">
                            <table class='table table-striped dataTable table-bordered'>
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Document Type</th>
                                        <th>For</th>
                                        <th>Current Office</th>
                                        <th>Action Taken</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach ($docs as $doc)
                                    <tr>
                                        <td>{{$doc->tracking_no}}</td>
                                        <td>{{$doc->user->lname}}, {{$doc->user->fname}}</td>
                                        <td>{{$doc->title}}</td>
                                        <td>{{$doc->doctype->name}}</td>
                                        <td>{{$doc->for}}</td>
                                        <td>{{$doc->current_office->station->name.', '.$doc->current_office->office->name}}</td>
                                        <td>{{$doc->current_office->action}}</td>
                                        <td>{{$doc->current_office->remarks}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
            </div>
                        <div class="tab-pane" id="nohead"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection