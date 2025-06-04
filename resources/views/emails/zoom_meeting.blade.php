<!DOCTYPE html>
<html>
<head>
    <title>Zoom Meeting Invitation</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>
    <p>You have a Zoom meeting scheduled.</p>
    <p><strong>Join URL:</strong> <a href="{{ $meeting['join_url'] }}">{{ $meeting['join_url'] }}</a></p>
    <p><strong>Meeting ID:</strong> {{ $meeting['id'] }}</p>
    <p>Start the meeting at your convenience.</p>
</body>
</html>