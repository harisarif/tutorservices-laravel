@php
$notifications = auth()->user()->unreadNotifications()->latest()->take(10)->get();
@endphp
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in BD  "
    id="notificationDropdown" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header bg-success border-success text-center">
        {{ __('messages.Notification') }}
    </h6>
   <div class="dropdown-item p-0">
    @if(auth()->user()->notifications->count() > 0)
            @foreach(auth()->user()->notifications as $notification)
           
                <div class="classic d-flex py-2 px-3 @if(!$loop->last) border-bottom @endif">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div class="ntf">
                    <a class=" px-0 justify-content-center @if(auth()->user()->notifications->count() === 0) no-notifications @endif" href="#" style="text-decoration:none">
                        <div class="small">{{ $notification->data['message'] }}</div>
                        </a>
                        <span
                            class="font-weight-bold">{{ $notification->created_at->diffForHumans() }}</span>
                    </div>
                </div>
          
            @endforeach
            @else
            <div class="mt-2 text-center">
                <div class="small no-message">No notifications available.</div>
            </div>
            @endif
        

        <a class="dropdown-item-fector  small" href="{{ route('admin.inquiry')}}">Show All
            Notifications </a>
   </div>
        
</div>
<script>
   $('#alertsDropdown').on('click', function (e) {
    e.preventDefault();
    const dropdown = $('#notificationDropdown');
    
    if (dropdown.hasClass('d-block')) {
        dropdown.removeClass('d-block').addClass('d-none');
    } else {
        dropdown.removeClass('d-none').addClass('d-block');
    }
});


</script>