<div>
    Hello, You have got an enquiry!<br>

    <h3>Subject: {{ $data['subject'] }}</h3>
    <h3>Email: {{ $data['email'] }}</h3>
    <h3>Message: {{ $data['message'] }}</h3>

    Thanks,<br>
    {{ config('app.name') }}
</div>
