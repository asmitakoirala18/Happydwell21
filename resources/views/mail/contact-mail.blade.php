<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Request</title>
</head>
<body>
<blockquote>
    <h1>Name: {{$contact->name}} </h1>
    <h1>Email: {{$contact->email}} </h1>
    <h1>Subject: {{$contact->subject}} </h1>

    <p>
        Message: {!! $contact->message !!}
    </p>
</blockquote>

</body>
</html>
