@extends('master/master')
@section('title', 'Journals')
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
    .about-bard{
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 30px;
    }
    h4>b{
        font-size: 18px;
    }
    .modal-body p{
        text-align: justify;
    }
    .about_img{
        margin-top: 20px;
        margin-bottom: 20px;
        cursor: pointer;
    }
    .about_modal_img{
        margin-bottom: 20px;
        border: 6px solid #fff;
    }

    .about_img img{
        width: 100%;
        height: 100px;
    }
    .about_modal_img img
    {
        width: 100%;
        height: 65%;
    }
</style>

@section('content')
    <div class="container">
        <h2 class="about-bard bg-info">{{$projectName}}</h2>
        <div class="row">
            @foreach($moduleDara as $Dara)

                <div class="well col-md-12">

                    {{--<h3><b>Title Heading{{$file->id}}</b></h3><br>--}}
                    <h4><b>{{$Dara->author}}</b></h4><br>

                    <span>{{$Dara->abstract}}</span><br><br>
                    {{--<button type="button" class="btn-success btn-sm">Download PDF</button>--}}
                    @if (Auth::check())
                        <a class="btn-success btn-sm" href="{{url($Dara->filepath)}}">Download</a>
                    @else
                        <button type="button" class="btn-success btn-sm">Login to Download PDF</button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

@endsection