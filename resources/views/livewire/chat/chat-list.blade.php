<div>
@if(count($conversations) > 0)
@foreach($conversations as $conversation)
<li class="active-message" wire:key="{{ $conversation->id }}"" wire:click="$emit('chatUserSelected',{{ $conversation }},{{ $this->getChatUserInstance($conversation, $name='id') }})">
    <a href="#">
        <div class="dash-msg-avatar"><img src="https://ui-avatars.com/api/?name={{ $this->getChatUserInstance($conversation, $name='firstname') }}+{{ $this->getChatUserInstance($conversation, $name='lastname') }}" alt=""><span class="_user_status offline"></span></div>

        <div class="message-by">
            <div class="message-by-headline">
                <h5>{{ $this->getChatUserInstance($conversation, $name='firstname') }} {{ $this->getChatUserInstance($conversation, $name='lastname') }}</h5>
                <span>{{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</span>
            </div>
            <p>{{ $conversation->messages->last()->body }}</p>
        </div>
    </a>
</li>
@endforeach
@else
<h3>No Conversations</h3>
@endif
<div>