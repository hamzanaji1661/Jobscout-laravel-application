@include('admin.layouts.header')

                    @yield('body_content')

@include('admin.layouts.footer')

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            $.toaster({ message : '{{ $error }}', title : 'Update Error', priority : 'danger' });
        </script>
    @endforeach
@endif
                    
 @if(session()->get('error'))
    <script>
        $(document).ready(function(){
            toastr.error('{{ session()->get('error') }}');
        });
    </script>
@endif
@if(session()->get('success'))
    <script>
            $.toaster({ message : '{{ session()->get('success') }}', title : 'Success', priority : 'success' });
        </script>
@endif