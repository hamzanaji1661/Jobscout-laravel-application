<style>
    div::-webkit-scrollbar {
      width: 5px;
    }
  
    div::-webkit-scrollbar-track {
      background-color: #f1f1f1;
    }
  
    div::-webkit-scrollbar-thumb {
      background-color: #888;
      border-radius: 4px;
    }
  
    div::-webkit-scrollbar-thumb:hover {
      background-color: #555;
    }
  </style>
<div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-5">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="ft-medium">Messages</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Messages</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="_dashboard_content bg-white rounded mb-4">
                        
                        <div class="_dashboard_content_body">
                            <!-- Convershion -->
                            <div class="messages-container margin-top-0">
                                <div class="messages-headline">
                                    <h4>JobScout Messenger</h4>
                                    <a href="#" class="message-action"><i class="ti-trash"></i> Delete Conversation</a>
                                </div>

                                <div class="messages-container-inner">

                                    <!-- Messages -->
                                    <div class="dash-msg-inbox">
                                        <ul>
                                            @livewire('chat.chat-list')
                                        </ul>
                                    </div>
                                    <!-- Messages / End -->

                                    <!-- Message Content -->
                                    <div class="dash-msg-content">
                                        
                                        @livewire('chat.chatbox')
                                        
                                        <!-- Reply Area -->
                                        <div class="clearfix"></div>
                                        
                                        @livewire('chat.send-message') 
                                    </div>
                                    <!-- Message Content -->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener('chatSelected', event => {
                    $('.message-body').scrollTop($('.message-body')[0].scrollHeight);

                    let height= $('.message-body')[0].scrollHeight;
                window.livewire.emit('updateHeight',{
                    height:height,
                })
                });

                
            </script>
          
        </div>
    {{-- The whole world belongs to you. --}}

        {{-- 
 
        

        --}}

