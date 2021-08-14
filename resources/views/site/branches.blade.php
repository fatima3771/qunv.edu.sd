@extends('site.layouts.master')
<?php $page = App\Page::find(8); ?>

@section('meta-title')
	@lang('site.branches') - 
@endsection

@section('meta-description')
	@lang('site.branches')
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.branches')</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.aboutUs')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li>@lang('site.aboutUs')</li>
			<li>@lang('site.branches')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section>
	<div class="container">
		
		<div class="row">
		
			<!-- RIGHT -->
			<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">
				<div class="heading-title heading-border">
					<h2><span>@lang('site.branches')</span></h2>
				</div>
				
				<figure class="mb-20">
					<img class="img-fluid" src="{{ request()->root() }}/public/images/page-header2.png" alt="img" />
				</figure>

				<p class="lead" style="text-align: justify;">

					<table id="branchesTable" class="table table-striped table-condensed table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>@lang('site.branch')</th>
								<th>@lang('site.city')</th>
								<th>@lang('site.ext')</th>
								<th>@lang('site.type')</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; ?>
							@foreach($branches as $branch)
								<tr>
									<td>{{$i++}}</td>
									<td>@lang('site.getContent', ['ar'=>$branch->name, 'en'=>$branch->nameEn])</td>
									<td>@lang('site.getContent', ['ar'=>$branch->city->name, 'en'=>$branch->city->nameEn])</td>
									<td>{{$branch->phone}}</td>
									<td>@lang('site.getContent', ['ar'=>$branch->type->name, 'en'=>$branch->type->nameEn])</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					
				</p>
			</div>

			<!-- LEFT -->
			<div class="col-md-3 col-sm-3">

				{{-- @include('site.subMenu') --}}
				{{-- @include('site.newsMenu') --}}

				<!-- FACEBOOK -->
				<iframe class="hidden-xs-down" src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/fibsudan1/&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>


				<hr>


				<!-- SOCIAL ICONS -->
				{{-- <div class="hidden-xs-down mt-30 mb-60">
					<a href="https://www.facebook.com/sudaneseptn/" class="social-icon social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-twitter float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-gplus float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google plus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-rss float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Rss">
						<i class="icon-rss"></i>
						<i class="icon-rss"></i>
					</a>
				</div> --}}

			</div>		
		</div>
		
	</div>
</section>
	
@stop

@section('scripts')
<!-- CSS DATATABLES -->
<link href="{{request()->root()}}/public/assets/css/layout-datatables.css" rel="stylesheet" type="text/css" />


<!-- JS DATATABLES -->
<script src="{{request()->root()}}/public/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{request()->root()}}/public/assets/plugins/datatables/js/dataTables.tableTools.min.js"></script>
<script src="{{request()->root()}}/public/assets/plugins/datatables/js/dataTables.colReorder.min.js"></script>
<script src="{{request()->root()}}/public/assets/plugins/datatables/js/dataTables.scroller.min.js"></script>
<script src="{{request()->root()}}/public/assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="{{request()->root()}}/public/assets/plugins/select2/js/select2.full.min.js"></script>
<script>
	function initTable2() {
		var table = jQuery('#branchesTable');

		/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

		/* Set tabletools buttons and button container */

		$.extend(true, $.fn.DataTable.TableTools.classes, {
			"container": "btn-group tabletools-btn-group float-right",
			"buttons": {
				"normal": "btn btn-sm btn-default",
				"disabled": "btn btn-sm btn-default disabled"
			}
		});

		var oTable = table.dataTable({
			"order": [
				[0, 'asc']
			],
			"lengthMenu": [
				[5, 15, 20, -1],
				[5, 15, 20, "All"] // change per page values here
			],

			// set the initial value
			"pageLength": 10,
			"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

			"tableTools": {
				"sSwfPath": "{{request()->root()}}/public/assets/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
				"aButtons": [
				{
					"sExtends": "print",
					"sButtonText": "نسخة للطباعة",
					"sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
					"sMessage": "التكافلية للتأمين"
				}]
			},
			"language": {
					"paginate": {
						"first":    '«',
						"previous": '‹',
						"next":     '›',
						"last":     '»'
					},
					"aria": {
						"paginate": {
							"first":    'الأول',
							"previous": 'السابق',
							"next":     'اللاحق',
							"last":     'الأخير'
						}
					},
					"search": '@lang("site.searchForBranches"): ',
					"info": '@lang("site.displayPage")'
				}			
		});

		var tableWrapper = jQuery('#branchesTable_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
		tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
	}


	// Table Init
	initTable2();
</script>
@endsection