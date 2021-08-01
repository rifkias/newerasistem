    <link href="{{asset('admin/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
    <script src="{{asset('admin/libs/toastr/build/toastr.min.js')}}"></script>
    @if ($errors->any())
    @foreach($errors->all() as $error)
    <script>
        toastr.error('{{$error}}', 'Warning!!');
    </script>
     @endforeach
  @endif

  @if ($message = Session::get('success'))
<script>
        toastr.success('{{$message}}', 'Success!!');
</script>
@endif

@if ($message = Session::get('status'))
<script>
        toastr.success('{{$message}}', 'Success!!');
</script>
@endif
