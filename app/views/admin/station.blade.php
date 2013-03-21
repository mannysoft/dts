@layout('template')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-head tabs">
                <h3>Stations</h3>
                
                
                <div class="actions">
                    <ul>
                        <li class="dropdown">
                            <a href="#" class='tip btn btn-mini btn-square dropdown-toggle' title="Click for more actions" data-toggle="dropdown">
                                <img src="{{URL::base()}}/public/img/icons/fugue/gear.png" alt="">
                            </a>
                            <ul class="dropdown-menu pull-right custom">
                                <li>
                                    <a href="#" class='fugue'><img src="{{URL::base()}}/public/img/icons/fugue/printer.png" alt=""> Print table</a>
                                </li>	
                                <li class="divider"></li>
                                <li>
                                    <a href="#" class='fugue'><img src="{{URL::base()}}/public/img/icons/fugue/gear.png" alt=""> Table settings</a>
                                </li>
                                <li>
                                    <a href="#" class='fugue'><img src="{{URL::base()}}/public/img/icons/fugue/bin-metal.png" alt=""> Delete table</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class='btn btn-mini btn-square tip' title="Delete">
                                <img src="{{URL::base()}}/public/img/icons/fugue/cross.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" href="#myModal" class='btn btn-mini btn-square tip' title="Add New">
                                <img src="{{URL::base()}}/public/img/icons/fugue/disk-black.png" alt="">
                            </a>
                        </li>
                    </ul>	
                </div>
                
                
            </div>
            
            
        <form action="#" class="validate form-horizontal">
        <div class="modal hide" id="myModal">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Save Office</h3>
          </div>
          <div class="modal-body">
             <div class="control-group">
                <label for="name" class="control-label">Office Name</label>
                <div class="controls">
                    <input name="name" type="text" id="name" value="<?php echo Input::get('name');?>" class="required">
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
            <input id="go_release" type="button" value="Save" class="btn btn-primary" data-dismiss="modal"/>
          </div>
        </div></form>
        
        
            
            <div class="box-content box-nomargin">
                <div class="tab-content">
                        <div class="tab-pane active" id="basic">
                            <table class='table table-striped dataTable table-bordered'>
                                <thead>
                                    <tr>
                                        <th class='table-checkbox'><input type="checkbox" class='sel_all'></th>
                                        <th>Station</th>
                                        <th>Description</th>
                                        <th>Office</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach ($stations as $station)
                                    <tr>
                                        <td class='table-checkbox'><input type="checkbox" class='selectable-checkbox'></td>
                                        <td>{{$station->name}}</td>
                                        <td>{{$station->description}}</td>
                                        <td>{{$station->office->name}}</td>
                                        <td>{{$station->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection