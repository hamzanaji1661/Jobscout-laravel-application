<div>
@if($selectedConversation)
<div class="message-reply">
    <form wire:submit.prevent='sendMessage' action=''>
    <textarea cols="40" wire:model="body" rows="3" class="form-control with-light" placeholder="Your Message"></textarea>
    <button type="submit" class="btn theme-bg text-white">Send Message</button>
    </form>
</div>
@endif
</div>
