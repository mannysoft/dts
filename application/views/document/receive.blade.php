@layout('template')

@section('content')
<div class="row-fluid">
    <div class="span6">
        <div class="box">
            <div class="box-head">
                <h3>Receive Document</h3>
            </div>
            <div class="box-content">
            
            <!--alert-info, alert-success, alert-danger-->
           @if(count($errors) > 1)
            <div class="alert alert-danger alert-block">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                    @foreach ($errors as $error)
                            <div class="error">{{ $error }}</div>
                    @endforeach
            </div>
            @endif
            {{Session::get('status')}}
            <div class="alert alert-success alert-block" id="success_message">
                <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Success!</h4>
                    Document has been received!
            </div>
                
            <form action="" class="form-horizontal" method="post" id="myform">
                <legend>Document Information</legend>
                <div class="control-group">
                    <label for="tracking_no" class="control-label">Tracking Number</label>
                    <div class="controls">
                        <input name="tracking_no" type="text" id="tracking_no" value="<?php echo Input::get('tracking_no');?>" autocomplete="off">
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                      <div class="form-actions">
                          <button class="btn btn-primary" type="submit" id="search">Search</button>
                            <input type="reset" class='btn btn-danger' value="reset">
                        <input name="op" type="hidden" id="op" value="1" />
                        </div>
                    </div>
                </div>                
			</form>
            </div>
        </div>
    </div>
    
    <div class="span6">
        <div class="box">
        	<div class="box-head">
                <h3>Document Information</h3>
            </div>
            <div class="box-content">
            <form action="" class="form-horizontal" method="post">
                <div id="doc_info">.</div>
			</form>
            </div>
        </div>
    </div>
    
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-head">
                <h3>Document History</h3>
            </div>
            <div class="box-content">
                <div id="history">
                    
                </div>
            </div>
        </div>
    </div>
</div>    




<script>
$(document).ready(function(){
	$('#success_message').hide();
	$("#tracking_no").focus();
	$("#tracking_no").keyup(function(){
	
		//$("#search").click();
		//$("#myform").submit();
	
	});
	
	$("#search").click(function(){
	
		$('#success_message').hide();
		$('#doc_info').show()
		$('#doc_info').load("<?php echo URL::base()?>/document/info/" + $('#tracking_no').val());
		$('#history').load("<?php echo URL::base()?>/document/history/" + $('#tracking_no').val());
		$("#tracking_no").select();
		
		return false;
	
	});
});
</script>
@endsection