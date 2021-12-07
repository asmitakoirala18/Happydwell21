@extends("frontend.master.master")


@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Our Amazing Blog</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Blogs
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ News Grid Star /-->
    <section class="news-grid grid">
        <div class="container">
            <div class="row">
                @foreach($blogData as $blog)
                <div class="col-md-4">
                    <div class="card-box-b card-shadow news-box">
                        <div class="img-box-b">
                            <img src="{{url('uploads/blog/'.$blog->image)}}" alt="" class="img-b img-fluid"
                            style="height: 400px;">
                        </div>
                        <div class="card-overlay">
                            <div class="card-header-b">
                                <div class="card-title-b">
                                    <h2 class="title-2">
                                        <a href="{{route('blogs').'/'.$blog->slug}}">{{$blog->title}}</a>
                                    </h2>
                                </div>
                                <div class="card-date">
                                    <span class="date-b">{{$blog->date}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    <!--/ News Grid End /-->

@endsection
