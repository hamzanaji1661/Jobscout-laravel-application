<div class="message-body messages-body" id="messageBody" style="height: 500px; overflow-y: scroll; padding-right: 5px;">
@if($selectedConversation)
@foreach($messages as $message)

<div wire:key='{{ $message->id }}' class="message-plunch {{ $this->user_id == $message->sender_id? 'me':'' }}">
    <div class="dash-msg-avatar"><img src="@if( $this->user_id == $message->sender_id ) https://ui-avatars.com/api/?name={{ $message->sender_id }}+{{ $receiverInstance->lastname }} @else https://ui-avatars.com/api/?name={{ $receiverInstance->firstname }}+{{ $receiverInstance->lastname }} @endif" alt=""></div>
    <div class="dash-msg-text"><p>{{ $message->body }}</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted {{ $this->user_id == $message->sender_id? 'float-left':'float-right' }}"> {{ $message->created_at->format('d M Y | m: i a') }} | <span class="text-info">{{ $this->user_id == $message->sender_id? 'Seen':'' }}</span></p>
</div>
@endforeach
<script>
    $("#messageBody").on('scroll', function() {
     var top = $('#messageBody').scrollTop();  
     if(top == 0){
        window.livewire.emit('loadmore');
     }
    });
</script>

<script>
    window.addEventListener('updatedHeight', event => {
      let  old = event.detail.height;
        let newHeight = $('#messageBody')[0].scrollHeight;

        let height= $('#messageBody').scrollTop(newHeight - old);

        window.livewire.emit('updateHeight',{
            height: height,
        });
    })
</script>
@else
<div class="text-center">
    <img  src="{{ asset('frontEndAssets/img/nochat.svg') }}" width="500" alt="" class="img-fluid">
</div>
@endif

<script>
 window.addEventListener('rowChatToBottom', event => {
        $('#messageBody').scrollTop($('#messageBody')[0].scrollHeight);
    });

</script>

</div>


{{-- <div class="message-plunch me">
    <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
    <div class="dash-msg-text"><p>looked up one of the more obscure Latin words, consectetur, from a Lorem</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13 | <span class="text-info">Seen</span></p>
</div>

<div class="message-plunch">
    <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
    <div class="dash-msg-text"><p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted float-right">12:00 PM | Aug 13</p>
</div>

<div class="message-plunch me">
    <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
    <div class="dash-msg-text"><p>please consider donating a small sum to help pay for the hosting and bandwidth bill.</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted float-left">12:00 PM | Aug 13 | <span class="text-info">Seen</span></p>
</div>

<div class="message-plunch">
    <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
    <div class="dash-msg-text"><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted float-right">12:00 PM | Aug 13</p>
</div>

<div class="message-plunch me">
    <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
    <div class="dash-msg-text"><p>numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted float-left">12:00 PM | Aug 13 | <span class="text-info">Seen</span></p>
</div>

<div class="message-plunch">
    <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
    <div class="dash-msg-text"><p>But I must explain to you how all this mistaken idea of denouncing pleasure</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted float-right">12:00 PM | Aug 13</p>
</div>

<div class="message-plunch me">
    <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
    <div class="dash-msg-text"><p>numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p></div>
    <p class="small ms-3 mb-3 rounded-3 text-muted float-left">12:00 PM | Aug 13 | Sent</p>
</div> --}}