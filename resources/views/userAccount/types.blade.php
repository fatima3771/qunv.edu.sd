@extends('userAccount.layouts.master')

@section('content')
		<div id="fh5co-our-services" data-section="services" style="background:url({{ asset('public/assets/crew/images/pageBG.jpg') }}) no-repeat;">
			<div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <ol class="breadcrumb" style="border:1px rgba(0,0,0,0.2) solid;">
                            <li><a href="index.html">@lang('site.home')</a></li>
                            <li><a href="">@lang('site.aboutProgram')</a></li>
                            <li class="active">@lang('site.getContent',['ar'=>'أنواع التطوع','en'=>'أنواع التطوع'])</li>
                        </ol>
                    </div>
                </div>
				<div class="row row-bottom-padded-sm">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">أنواع التطوع</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 to-animate">
								<h3>تراعي المنظمة ظروف المتطوعين لذلك تقدم المنظمة عدداً من أنواع التطوع تتمثل في:</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="box to-animate" style="background:#EEE; border:1px dotted #CCC;">
							<div class="icon colored-1"><span><i class="icon-home"></i></span></div>
							<h3>تطوع في مكاتب المنظمة</h3>
							<p>و هو تطوع لفترة زمنية طويلة ضمن أحد المكاتب التنفيذية او الفرعية للمنظمة ، و يكون المتطوع ضمن عضوية المنظمة و يكون للمتطوع هنا الأولوية في المشاركة في البرامج و المشاريع و التخطيط لتلك المشاريع.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box to-animate" style="background:#EEE; border:1px dotted #CCC;">
							<div class="icon colored-4"><span><i class="icon-cogs"></i></span></div>
							<h3>تطوع للمشاركة في المشاريع و البرامج</h3>
							<p>وهو تطوع لبرنامج واحد أو أكثر ، يقوم فيه المتطوع بتسجيل بياناته ، و دائرة الانشطة التي يهتم بها و تقوم المنظمة بالاتصال به وفق سياسة تواصل معدة من قبل المنظمة ، لدعوته للمشاركة في النشاط قيد التنفيذ وفق ظروفه و امكانية مشاركته في تلك الفترة.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box to-animate" style="background:#EEE; border:1px dotted #CCC;">
							<div class="icon colored-2"><span><i class="icon-users"></i></span></div>
							<h3>تطوع غير الكوادر الطبية</h3>
							<p>وهو يكون للكوادر المساعدة في البرامج و الانشطة المختلفة ويمكن ان يشمل هذا النوع ما ذكر في كل الانواع المذكورة سابقا ، مع خصوصية الحوجة للمجال الذي ينتمي اليه المتطوع خارج القطاع الصحي.</p>
						</div>
					</div>
				</div>
			</div>
		</div>    
@endsection
