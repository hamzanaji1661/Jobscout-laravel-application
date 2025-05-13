@extends('Frontend.layouts.masterDashboard')
@section('page_title')
    #1 Job Portal Company
@endsection
@section('header_shadow')
    head-shadow
@endsection
@section('body_content')
    @include('Frontend.layouts.employeeDashboardNav')
    <style>
        .no-select {
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   pointer-events: none;
}

    </style>
    <div class="dashboard-content">
       
        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                 
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h3 class="text-center mb-4">Confirm Account Deletion</h3>
                                <p class="mb-4">Are you sure you want to delete your account? This action is irreversible and will permanently remove all of your data from our servers. Once your account is deleted, you will not be able to access any of your information or settings.

                                    If you proceed with account deletion, your account and all associated data will be permanently removed from our servers. This includes all personal information, messages, files, and any other data that you have stored on our platform.
                                    
                                    Please note that we will not be able to recover your account or any data after it has been deleted. <br> If you are sure you want to proceed, please enter the confirmation text below to delete your account:</p>
                                <p class="border bg-light p-3 mb-4 no-select"><strong>I Confirm To Delete</strong></p>
                                <form action="{{ route('admin.employee.delete', auth()->id()) }}" method="get">
                                    <div class="form-group">
                                        <label for="confirm-text">Enter Text:</label>
                                        <input autocomplete="off" type="text" class="form-control" id="confirm-text"  oninput="this.value = this.value.toUpperCase()" name="confirm-text"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-block">Delete Account</button>
                                </form>
                            </div>
                    
                    </div>
                </div>
            </div>

        </div>
        <script>
            const confirmText = "I CONFIRM TO DELETE";

const form = document.querySelector('form');
const confirmInput = document.querySelector('#confirm-text');
const deleteBtn = document.querySelector('button[type="submit"]');

// disable delete button initially
deleteBtn.disabled = true;

// add event listener to the confirm input
confirmInput.addEventListener('input', () => {
  if (confirmInput.value.trim() === confirmText) {
    // enable delete button if consent text is entered correctly
    deleteBtn.disabled = false;
    confirmInput.classList.remove('is-invalid');
  } else {
    // disable delete button if consent text is not entered correctly
    deleteBtn.disabled = true;
    confirmInput.classList.add('is-invalid');
  }
});

// add event listener to the form submission
form.addEventListener('submit', (event) => {
  if (deleteBtn.disabled) {
    // prevent form submission if delete button is disabled
    event.preventDefault();
    confirmInput.classList.add('is-invalid');
    const errorDiv = document.createElement('div');
    errorDiv.classList.add('invalid-feedback');
    errorDiv.innerHTML = 'Please enter the correct consent text to delete your account.';
    confirmInput.parentNode.appendChild(errorDiv);
  }
});

    </script>
    @endsection
