@section('header')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        @if($settingData)
            {{$settingData->company_name}}
        @else
            Welcome

        @endif
    </title>
    @if($settingData)
        <link rel="icon" href="{{url('uploads/logo/'.$settingData->company_logo)}}">

    @endif
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!-- Bootstrap CSS File -->
    <link href="{{url('frontend-assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">



    <!-- Libraries CSS Files -->
    <link href="{{url('frontend-assets/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend-assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend-assets/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend-assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{url('frontend-assets/css/style.css')}}" rel="stylesheet">


</head>

<body>
@endsection
