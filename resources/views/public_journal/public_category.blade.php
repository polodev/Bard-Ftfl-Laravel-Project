@extends('master/master')
@section('title', 'Issues')
@section('script')
    <style>

        .gray {
            background-color: #80CBC4 !important;
        }

        .red {
            background-color: #CCFF90 !important;
        }

        .gra {
            background-color: #E1BEE7 !important;
        }

        .gr {
            background-color: #F8BBD0 !important;
        }

        .about-bard {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 30px;
        }

        h4 > b {
            font-size: 18px;
        }

        .modal-body p {
            text-align: justify;
        }

        .about_img {
            margin-top: 20px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .about_modal_img {
            margin-bottom: 20px;
            border: 6px solid #fff;
        }

        .about_img img {
            width: 100%;
            height: 100px;
        }

        .about_modal_img img {
            width: 100%;
            height: 65%;
        }
    </style>

@section('content')
    <div class="container">
        <h2 class="about-bard bg-info">List Of Categories</h2>
        @foreach($projects as $project)
            <div class="row">

                <div class="well col-md-12">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dg_speech">
                        <div class="about_img">
                            <h3>
                                <span><a href="{!!URL('/public_book/'.$project->id.'/details')!!}">{{ $project->title }}</a></span>
                            </h3>
                        </div>
                    </div>

                    <div class="col-md-6">
                        {{ $project->description }}
                    </div>
                    <div class="col-md-3">
                        <span>Date: {{ $project->created_at->format('M d, Y') }}</span><br><br>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

@endsection