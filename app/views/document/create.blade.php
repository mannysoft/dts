@extends('template')

@section('content')

            
   @if(count($errors) >= 1)
    <div class="alert alert-danger alert-block">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Error!</h4>
            @foreach ($errors as $error)
                    <div class="error">{{ $error }}</div>
            @endforeach
    </div>
    @endif
    <!--{{Session::get('status')}}-->
    @if(Session::get('status'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('status')}}</strong>
    </div>
    @endif
    
    <form action="" class="form-horizontal" method="post">
        <legend>Document Information</legend>
        
        <div class="control-group">
            <label for="tracking_no" class="control-label">Tracking Number</label>
            <div class="controls">
                <input name="tracking_no" type="text" id="tracking_no" value="<?php echo Input::get('tracking_no');?>">
            </div>
        </div>
        
        <div class="control-group">
            <label for="title" class="control-label">Title</label>
            <div class="controls">
                <input name="title" type="text" id="title" value="<?php echo Input::get('title');?>">
            </div>
        </div>
        <div class="control-group">
            <label for="doctype_id" class="control-label">Document Type</label>
            <div class="controls">                        
                <?php echo Form::select('doctype_id', Doctype::dropDown(), Input::get('doctype_id'), array('class' => 'cho'));?>
            </div>
        </div>
        <div class="control-group">
            <label for="mini" class="control-label">For</label>
            <div class="controls">
                @foreach ($actions as $action)
                    <label class="checkbox"><input type="checkbox" name="for[]" class='uniform' value="{{$action->id}}">{{$action->description}}</label>	
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
@stop