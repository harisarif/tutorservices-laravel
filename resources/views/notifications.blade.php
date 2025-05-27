@php
$notifications = auth()->user()->unreadNotifications()->latest()->take(10)->get();
@endphp
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in BD  "
    id="notificationDropdown" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header bg-success border-success text-center">
        {{ __('messages.Notification') }}
    </h6>
    <a class="dropdown-item px-0 justify-content-center @if(auth()->user()->notifications->count() === 0) no-notifications @endif"
        href="#">
        @if(auth()->user()->notifications->count() > 0)
        @foreach(auth()->user()->notifications as $notification)
        <div class="classic d-flex py-2 px-3 @if(!$loop->last) border-bottom @endif">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div class="ntf">
                <div class="small">{{ $notification->data['message'] }}</div>
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
    </a>

    <a class="dropdown-item-fector  small" href="{{ route('admin.inquiry')}}">Show All
        Notifications </a>
</div>
<script>
    $('.notification-icon').on('click', function(e) {
        e.preventDefault();
        $('#notificationDropdown').addClass('d-block');
    });
</script>