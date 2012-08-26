<table class="table table-striped table-detail">
    <tr>
        <th>Tracking Number: </th>
        <td>{{$doc->tracking_no}}</td>
    </tr>
    <tr>
        <th>Title:</th>
        <td>{{$doc->title}}</td>
    </tr>
    <tr>
        <th>Author:</th>
        <td>{{$doc->user->lname.', '.$doc->user->fname}}</td>
    </tr>
    <tr>
      <th>Author Office:</th>
      <td>{{$doc->office->office_name}}</td>
    </tr>
    <tr>
        <th>For:</th>
        <td>
            @foreach($actions as $for)
				{{$for->description}},
	 		@endforeach
        </td>
    </tr>
    <tr>
        <th>Remarks:</th>
        <td>{{$doc->remarks}}</td>
    </tr>
    <tr>
        <th>Date Created:</th>
        <td>{{$doc->created_at}}</td>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <td><input type="hidden" id="id" value="{{$doc->id}}" />
      <input id="receive" type="button" value="Receive" class="btn btn-primary"/> 
      
      <a class="btn btn-success" data-toggle="modal" href="#myModal">Release</a>
        <form action="#" class="validate form-horizontal">
        <div class="modal hide" id="myModal">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Release Document</h3>
          </div>
          <div class="modal-body">
             <div class="control-group">
                <label for="release_to" class="control-label">Release To</label>
                <div class="controls">
                    <input name="release_to" type="text" id="release_to" value="<?php echo Input::get('release_to');?>" class="required">
               </div>
            </div>
            <div class="control-group">
                <label for="remarks" class="control-label">Remarks</label>
                <div class="controls">
                    <textarea name="remarks" type="text" id="remarks" value="<?php echo Input::get('remarks');?>" class="span8 input-square"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <!--<a href="#" class="btn btn-primary" data-dismiss="modal" id="go_release">Release</a>-->
            <input id="go_release" type="button" value="Release" class="btn btn-primary" data-dismiss="modal"/>
          </div>
        </div></form>
      
      </td>
    </tr>
</table>

<script>
$(document).ready(function(){
	
	$("#receive").click(function(){
	
		$.ajax({
		  url: '<?php echo URL::base()?>/document/receive/' + $('#id').val(),
		  success: function(data) {
			//$('.result').html(data);
			//alert(data);
		  }
		});
		//$('#doc_info').html("")
		//$('#doc_info').hide()
		//$('#tracking_no').val("")
		$('#success_message').show();
		$('#tracking_no').focus()
		//return false;
	
	});
	
	$("#go_release").click(function(){
			
		$.post( 
             "<?php echo URL::base()?>/document/release/",
             { 
			 doc_id: $('#id').val(), 
			 release_to: $('#release_to').val(), 
			 remarks: $('#remarks').val()
			 },
             function(data) {
                //$('#stage').html(data);
				$("#search").click();
				$('#success_message').html("Document has been released!");
				$('#success_message').show();
             }

          );
	
	});
});
</script>
