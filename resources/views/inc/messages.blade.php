@if(count($errors) > 0)
  @foreach($errors->all() as $error)
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="ture">&times;</span>
        </button>
        <strong>{!!$error!!}</strong>          
      </div>
  @endforeach
@endif

@if(session('success_message'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{session('success_message')}}</strong>
  </div>
@endif

@if(session('error_message'))
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
      {{session('error_message')}}
  </div>
@endif
