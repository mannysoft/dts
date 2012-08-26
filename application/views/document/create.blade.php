@layout('template')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-head">
                <h3>Create New Document</h3>
            </div>
            <div class="box-content">
            
            <!--alert-info, alert-success, alert-danger-->
           @if(count($errors) >= 1)
            <div class="alert alert-danger alert-block">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                    @foreach ($errors as $error)
                            <div class="error">{{ $error }}</div>
                    @endforeach
            </div>
            @endif
            {{Session::get('status')}}
                
            <form action="" class="form-horizontal" method="post">
                <legend>Document Information</legend>
                <div class="control-group">
                    <label for="tracking_no" class="control-label">Tracking Number</label>
                    <div class="controls">
                        <input name="tracking_no" type="text" id="tracking_no" value="<?php echo Input::get('tracking_no');?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="user_id" class="control-label">Author</label>
                    <div class="controls">
                        <input name="user_id" type="hidden" id="user_id" value="{{Auth::user()->id}}"> {{ Auth::user()->lname.', '.Auth::user()->fname }}
                    </div>
                </div>
                <div class="control-group">
                    <label for="title" class="control-label">Title</label>
                    <div class="controls">
                        <input name="title" type="text" id="title" value="<?php echo Input::get('title');?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="doc_type_id" class="control-label">Document Type</label>
                    <div class="controls">                        
                        <?php echo Form::select('doc_type_id', $doc_type_id, Input::get('doc_type_id'), array('class' => 'cho'));?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="mini" class="control-label">For</label>
                    <div class="controls">
                        @foreach ($actions as $action)
                            <label class="checkbox"><input type="checkbox" name="for[]" class='uniform'>{{$action->description}}</label>	
                        @endforeach
                    </div>
                </div>
                <div class="control-group">
                    <label for="remarks" class="control-label">Remarks</label>
                    <div class="controls">
                        <input name="remarks" type="text" id="remarks" value="<?php echo Input::get('remarks');?>">
                    </div>
                </div>
                
                <div class="control-group">
                <label for="radio2" class="control-label">Allow others to track this document</label>
                <div class="controls">
                    <label class="radio"><input name="allow_track" type="radio" class='uniform' id="radio2" value="yes" checked="checked">Yes</label>
                    <label class="radio"><input name="allow_track" type="radio" class='uniform' value="no">No</label>
                </div>
                </div>
                
                
                <div class="row-fluid">
                    <div class="span12">
                      <div class="form-actions">
                          <button class="btn btn-primary" type="submit">Create</button>
                            <input type="reset" class='btn btn-danger' value="reset">
                        <input name="op" type="hidden" id="op" value="1" />
                        </div>
                    </div>
                </div>                
			</form>
            </div>
        </div>
    </div>
</div>
@endsection