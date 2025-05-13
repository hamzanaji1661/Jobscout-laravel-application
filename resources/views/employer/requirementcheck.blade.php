{{-- <div class="dynamic-wrap">
    <form role="form" action="{{ route('employer.requirement.add') }}" method="post" autocomplete="off">
      @csrf
      <input type="hidden" name="token" value="{{ rand() }}">
      <h1>@if ($errors->any())
          
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      @endif</h1>
      <div class="entry input-group" id="input-group">
        <section>
          <input class="form-control mb-2" id="inputfield" name="fields[0]" type="text" placeholder="Type something" />
          <span class="input-group-btn">
            <button class="btn btn-success btn-add mb-2 add"  style="padding: 15px;" type="button">
              <span class="lni lni-plus"></span>
            </button>
          </span>
        </section>
      </div>
      <button type="submit">Add Details</button>
    </form>
  </div>
  <script src="{{ asset('frontEndAssets/js/jquery.min.js') }}"></script>
  <script>
    var i = 0;
    $('.add').click(function(){
      ++i;
      var newSection = $('<section><input class="form-control mb-2" id="inputfield" name="fields['+i+']" type="text" placeholder="Type something" /><span class="input-group-btn"><button class="btn btn-success btn-remove mb-2" style="padding: 15px;" type="button"><span class="lni lni-minus"></span></button></span></section>');
      newSection.insertBefore($(this).closest('section'));
      if (i > 0) {
        $('.add').removeClass('mb-2').addClass('mt-2');
      }
    });
  
    $(document).on('click', '.btn-remove', function(e){
      $(this).closest('section').remove();
      --i;
      if (i === 0) {
        $('.add').removeClass('mt-2').addClass('mb-2');
      }
    });
  </script>
   --}}

   <div class="container">
    <div class="row">
      <div class="form-group">
        <label class="col-sm-2 control-label" for="field1">ini label teks</label>
        <div class="col-sm-10">
          <div class="dynamic-wrap">
            <form role="form" autocomplete="off" method="post" action="{{ route('employer.requirement.add') }}">
                @csrf
                <input type="hidden" name="token" value="{{ rand() }}">
              <div class="entry input-group">
                <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                <span class="input-group-btn">
                  <button class="btn btn-success btn-add" type="button">
                          <span class="glyphicon glyphicon-plus"></span>
                  </button>
                </span>
              </div>
              <button type="submit">submit data</button>
            </form>
            <br>
            <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="{{ asset('frontEndAssets/js/jquery.min.js') }}"></script>
  <script>
    $(function() {
  $(document).on('click', '.btn-add', function(e) {
    e.preventDefault();

    var dynaForm = $('.dynamic-wrap form:first'),
      currentEntry = $(this).parents('.entry:first'),
      newEntry = $(currentEntry.clone()).appendTo(dynaForm);

    newEntry.find('input').val('');
    dynaForm.find('.entry:not(:last) .btn-add')
      .removeClass('btn-add').addClass('btn-remove')
      .removeClass('btn-success').addClass('btn-danger')
      .html('<span class="glyphicon glyphicon-minus"></span>');
  }).on('click', '.btn-remove', function(e) {
    $(this).parents('.entry:first').remove();

    e.preventDefault();
    return false;
  });
});
  </script>