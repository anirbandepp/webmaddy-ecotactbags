@if(Session::has('global'))
  <input type="hidden" id="sessionMsg" value="{{Session::get('global')}}">
    <input type="hidden" id="sessionType" value="{{Session::get('type')}}">
    <script>
    $(function() {
      type = $('#sessionType').val();
      msg = $('#sessionMsg').val();
      toastr.info(msg);
    });

    </script>
@endif

@if($errors != null && count(@$errors->all()))
    <input type="hidden" id="sessionMsg" value="{{implode("<br>",$errors->all())}}">
    <input type="hidden" id="sessionType" value="warning">
    <script type="text/javascript">
        type = $('#sessionType').val();
        msg = $('#sessionMsg').val();
    
        toastr.info(msg)
    </script>
@endif