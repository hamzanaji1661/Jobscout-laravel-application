@include('Frontend.layouts.header')

                    @yield('body_content')

@include('Frontend.layouts.footerDashboard')

@if($errors->any())
    @foreach($errors->all() as $error)
    <script>
        Snackbar.show({
            text: '{{ $error }}',
            pos: 'top-right',
            showAction: false,
            actionText: "Dismiss",
            duration: 3000,
            textColor: '#fff',
            backgroundColor: '#151515'
        }); 
    </script>
    @endforeach
@endif
                    
 @if(session()->get('error'))
 <script>
    Snackbar.show({
        text: '{{ session()->get('error') }}',
        pos: 'top-right',
        showAction: false,
        actionText: "Dismiss",
        duration: 3000,
        textColor: '#fff',
        backgroundColor: '#151515'
    }); 
</script>
@endif
@if(session()->get('success'))
    <script>
            Snackbar.show({
				text: '{{ session()->get('success') }}',
				pos: 'top-right',
				showAction: false,
				actionText: "Dismiss",
				duration: 3000,
				textColor: '#fff',
				backgroundColor: '#151515'
			}); 
        </script>
@endif