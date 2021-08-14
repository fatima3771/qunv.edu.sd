@extends('site.layouts.master')
@section('css')
    <link href="{{request()->root()}}/public/css/circular-progress-bars.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
@stop

@section('content')

    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">@lang('site.polls')</h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
                            <li>@lang('site.polls')</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 

    <!-- Services Details -->
	<section class="flat-row services-details">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="sidebar">
						@include('site.newsMenu')
					</div>
				</div>
				<div class="col-lg-9">
					<div class="item-wrap">
						<div class="item item-details">
							<div class="content-item">
                                <h2 class="title-item">@lang('site.getContent',['ar'=>$poll->title,'en'=>$poll->titleEn])</h2>
                                <table class="table">
                                    @foreach($poll->answers as $ans)
                                        <tr>
                                            <td width="35%">
                                                {{ Lang::get('site.getContent',['ar'=>$ans->title,'en'=>$ans->titleEn]) }}
                                            </td>
                                            <td width="10%">
                                                {{ $ans->count }} أصوات
                                            </td>
                                            <td width="5%">
                                                {{ $ans->getPercent() }}%
                                            </td>
                                            <td width="50%">
                                                <div class="progress ">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: {{ ceil($ans->getPercent()/10)*10 }}%;"
                                                        aria-valuenow="{{ ceil($ans->getPercent()/10)*10 }}" aria-valuemin="0" aria-valuemax="100">{{ $ans->getPercent() }} %</div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

							</div><!-- /.content-item -->
						</div><!-- /.item -->
					</div><!-- /.item-wrap --> 
				</div><!-- /.Col-lg-9 -->
			</div><!-- /.row -->           
		</div><!-- /.container -->   
	</section>  
	
@stop

@section('scripts')
	<script>
        //pie
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
            },
            options: {
            responsive: true
            }
        });
  	</script>
@endsection