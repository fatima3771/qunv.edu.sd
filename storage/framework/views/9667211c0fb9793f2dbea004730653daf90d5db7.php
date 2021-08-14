<?php  
	$lang = \Lang::get('site.getContent', ['ar' => 1, 'en' => 2]);
	$latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
	$testimonials = App\Testimonial::orderByRaw('rand()')->limit(4)->get();
	$branchesCount = App\Branch::where('typeID',1)->get()->count(); 
	$officesCount = App\Branch::where('typeID',2)->orWhere('typeID',3)->get()->count(); 
 ?>

<?php $__env->startSection('meta-description'); ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('site.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Section: About -->
<section id="about">
<div class="container">
  <div class="section-content">
  <div class="row">
	<div class="col-md-6">
	<h5 class="text-uppercase text-gray-darkgray mb-15"><?php echo app('translator')->getFromJson('site.siteName'); ?></h5>
	<div class="double-line-bottom-theme-colored-2"></div>
	<h3 class="font-weight-500 font-30 font- mt-10"><?php echo app('translator')->getFromJson('site.welcomeTitle'); ?></h3>
	<p><?php echo app('translator')->getFromJson('site.welcomeTxt'); ?></p>
	<img src="images/signature.png" alt="" class="mt-10 mb-15">
	<div><a href="#" class="btn btn-theme-colored mb-sm-30"><?php echo app('translator')->getFromJson('site.more'); ?></a></div>
	</div>
	<div class="col-md-6">
	<div class="box-hover-effect about-video">
	  <div class="effect-wrapper">
	  <div class="thumb">
		<img class="img-responsive img-fullwidth" src="<?php echo e(request()->root()); ?>/public/assets/learnpro/images/youtube-bg.jpg" alt="">
	  </div>
	  <div class="video-button"></div>
	  <a class="hover-link" data-lightbox-gallery="youtube-video" href="https://www.youtube.com/watch?v=kL1SevtBth8" title="Youtube Video">Youtube Video</a>
	  </div>
	</div>
	</div>
  </div>
  </div>
</div>
</section>

<!-- Section: Banners -->
<section class="clients bg-theme-colored">
	<div class="container pt-10 pb-10">
	  <div class="row">
		<div class="col-md-12">
			<div class="owl-carousel-4col">
				<?php $__currentLoopData = App\Banner::where('publish',1)->orderByRaw('rand()')->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bann): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item"><img src="<?php echo e($bann->getPicture()); ?>" alt=""></div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	  </div>
	</div>
  </section>

	<!-- Section: blog -->
	<section id="blog">
		<div class="container pb-0">
		  <div class="section-title text-center">
			<div class="row">
			  <div class="col-md-12">
				<h2 class="text-uppercase title"><?php echo app('translator')->getFromJson('site.latestNews'); ?></h2>              
				<p class="text-uppercase mb-0">See All Time Latest News</p>
				  <div class="double-line-bottom-center-theme-colored-2"></div>
				  </div>
			</div>
		  </div>
		  <div class="section-content">
			<div class="row">
			  <div class="col-md-12">
				<div class="owl-carousel-3col owl-nav-top" data-nav="true">
				  <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <div class="item">
						  <article class="post clearfix mb-30">
							  <div class="entry-header">
							  <div class="post-thumb thumb"> 
								  <img src="<?php echo e($n->getPicture()); ?>" alt="" class="img-responsive img-fullwidth"> 
							  </div>                    
							  <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
								  <ul>
								  <li class="font-16 text-white font-weight-600"><?php echo e(date('d', strtotime($n->getDate()))); ?></li>
								  <li class="font-12 text-white text-uppercase"><?php echo e(date('M', strtotime($n->getDate()))); ?></li>
								  </ul>
							  </div>
							  </div>
							  <div class="entry-content p-15">
							  <div class="entry-meta media no-bg no-border mt-0 mb-10">
								  <div class="media-body pl-0">
								  <div class="event-content pull-left flip">
									  <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="<?php echo e($n->getUrl()); ?>"><?php echo e(Str::words(strip_tags($n->title),5)); ?></a></h4>
									  <ul class="list-inline">
									  <li><i class="fa fa-calendar mr-5 text-theme-colored2"></i> <?php echo e(date('d-m-Y', strtotime($n->getDate()))); ?></li>
									  <li><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i> Likes</li>
									  <li><i class="fa fa-share-alt mr-5 text-theme-colored2"></i> 895 Likes</li>
									  </ul>
								  </div>
								  </div>
							  </div>
							  <p class="mt-5"><?php echo e(Str::words(strip_tags($n->txt),15)); ?></p>
							  <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="<?php echo e($n->getUrl()); ?>"> <?php echo app('translator')->getFromJson('site.more'); ?> </a>
							  </div>
						  </article>
					  </div>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </section>
  


  <!-- Section: Counters -->

  <section class="parallax layer-overlay overlay-theme-colored-7" dir="ltr" data-bg-img="<?php echo e(request()->root()); ?>/public/assets/learnpro/images/neelain-mosque-bg.jpg" data-parallax-ratio="0.4" style="background-image: url('<?php echo e(request()->root()); ?>/public/assets/learnpro/images/neelain-mosque-bg.jpg'); background-position: 50% 20px;">
	<div class="container pt-70 pb-90">
		<div class="section-content">
		  <div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
			  <div class="funfact text-center">
				<div class="odometer-animate-number text-white font-weight-600 font-48" data-value="5100" data-theme="minimal">0</div>
				<div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
				<h5 class="text-white text-uppercase mb-0">Happy Students</h5>
			  </div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
			  <div class="funfact text-center">
				<div class="odometer-animate-number text-white font-weight-600 font-48" data-value="200" data-theme="minimal">0</div>
				<div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
				<h5 class="text-white text-uppercase mb-0">Approved Courses</h5>
			  </div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
			  <div class="funfact text-center">
				<div class="odometer-animate-number text-white font-weight-600 font-48" data-value="20" data-theme="minimal">0</div>
				<div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
				<h5 class="text-white text-uppercase mb-0">Certified Teachers</h5>
			  </div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
			  <div class="funfact text-center">
				<div class="odometer-animate-number text-white font-weight-600 font-48" data-value="600" data-theme="minimal">0</div>
				<div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
				<h5 class="text-white text-uppercase mb-0">Graduate Students</h5>
			  </div>
			</div>
		  </div>
		</div>
	  </div>	</section>

<!-- Section: Team -->
<section id="team" class="bg-silver-deep">
  <div class="container pb-40">
	<div class="section-title text-center">
	  <div class="row">
		<div class="col-md-12">
		  <h2 class="text-uppercase title">Qualified <span class="text-theme-colored2">Teachers</span></h2>              
		  <p class="text-uppercase mb-0">We Have Highly Qualified Teachers</p>
					  <div class="double-line-bottom-centered-theme-colored-2"></div>
					</div>
	  </div>
	</div>
	<div class="row mtli-row-clearfix">
	  <div class="col-xs-12 col-sm-6 col-md-3">
		<div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
		  <div class="team-thumb">
			<img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
			<div class="team-overlay"></div>
			<ul class="styled-icons team-social icon-sm">
			  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
			  <li><a href="#"><i class="fa fa-skype"></i></a></li>
			</ul>
		  </div>
		  <div class="team-details">
			<h4 class="text-uppercase text-theme-colored font-weight-600 m-5">Jhon Anderson</h4>
			<h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">Civil Engineer</h6>
			<p class="hidden-md">Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium</p>
		  </div>
		</div>
	  </div>
	  <div class="col-xs-12 col-sm-6 col-md-3">
		<div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
		  <div class="team-thumb">
			<img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
			<div class="team-overlay"></div>
			<ul class="styled-icons team-social icon-sm">
			  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
			  <li><a href="#"><i class="fa fa-skype"></i></a></li>
			</ul>
		  </div>
		  <div class="team-details">
			<h4 class="text-uppercase text-theme-colored font-weight-600 m-5">Jhon Anderson</h4>
			<h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">Civil Engineer</h6>
			<p class="hidden-md">Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium</p>
		  </div>
		</div>
	  </div>
	  <div class="col-xs-12 col-sm-6 col-md-3">
		<div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
		  <div class="team-thumb">
			<img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
			<div class="team-overlay"></div>
			<ul class="styled-icons team-social icon-sm">
			  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
			  <li><a href="#"><i class="fa fa-skype"></i></a></li>
			</ul>
		  </div>
		  <div class="team-details">
			<h4 class="text-uppercase text-theme-colored font-weight-600 m-5">Jhon Anderson</h4>
			<h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">Civil Engineer</h6>
			<p class="hidden-md">Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium</p>
		  </div>
		</div>
	  </div>
	  <div class="col-xs-12 col-sm-6 col-md-3">
		<div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
		  <div class="team-thumb">
			<img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
			<div class="team-overlay"></div>
			<ul class="styled-icons team-social icon-sm">
			  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
			  <li><a href="#"><i class="fa fa-skype"></i></a></li>
			</ul>
		  </div>
		  <div class="team-details">
			<h4 class="text-uppercase text-theme-colored font-weight-600 m-5">Jhon Anderson</h4>
			<h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">Civil Engineer</h6>
			<p class="hidden-md">Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium</p>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>

<!-- Section: Events -->
<section class="layer-overlay overlay-white-9" data-bg-img="images/bg/bg-pattern.png">
  <div class="container">
	<div class="section-content">
	  <div class="row">
		<div class="col-md-6">
		  <h3 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Upcoming <span class="text-theme-colored2">Events</span></h3>
		  <article>
			<div class="event-block">
			  <div class="event-date text-center">
				<ul class="text-white font-18 font-weight-600">
				  <li class="border-bottom">28</li>
				  <li class="">Feb</li>
				</ul>
			  </div>
			  <div class="event-meta border-1px pl-40">
				<div class="event-content pull-left flip">
				  <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="#">Admission Fair Spring 2017</a></h4>
				  <span class="mb-10 text-gray-darkgray mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored2"></i> at 5.00 pm - 7.30 pm</span>
				  <span class="text-gray-darkgray"><i class="fa fa-map-marker mr-5 text-theme-colored2"></i> 25 Newyork City</span>
				  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commod</p>
				</div>
			  </div>
			</div>
		  </article>
		  <article>
			<div class="event-block">
			  <div class="event-date text-center">
				<ul class="text-white font-18 font-weight-600">
				  <li class="border-bottom">28</li>
				  <li class="">Feb</li>
				</ul>
			  </div>
			  <div class="event-meta border-1px pl-40">
				<div class="event-content pull-left flip">
				  <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="#">Learning Spoken English</a></h4>
				  <span class="mb-10 text-gray-darkgray mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored2"></i> at 5.00 pm - 7.30 pm</span>
				  <span class="text-gray-darkgray"><i class="fa fa-map-marker mr-5 text-theme-colored2"></i> 25 Newyork City</span>
				  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commod</p>
				</div>
			  </div>
			</div>
		  </article>
		  <article>
			<div class="event-block">
			  <div class="event-date text-center">
				<ul class="text-white font-18 font-weight-600">
				  <li class="border-bottom">28</li>
				  <li class="">Feb</li>
				</ul>
			  </div>
			  <div class="event-meta border-1px pl-40">
				<div class="event-content pull-left flip">
				  <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="#">Workshop Online Marketing</a></h4>
				  <span class="mb-10 text-gray-darkgray mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored2"></i> at 5.00 pm - 7.30 pm</span>
				  <span class="text-gray-darkgray"><i class="fa fa-map-marker mr-5 text-theme-colored2"></i> 25 Newyork City</span>
				  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commod</p>
				</div>
			  </div>
			</div>
		  </article>
		</div>   
		<div class="col-md-6">
		  <h3 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Video <span class="text-theme-colored2">Tour</span></h3>
		  <div class="box-hover-effect about-video">
			<div class="effect-wrapper">
			  <div class="thumb">
				<img class="img-responsive img-fullwidth" src="http://placehold.it/560x360" alt="">
			  </div>
			  <div class="video-button"></div>
			  <a class="hover-link" data-lightbox-gallery="youtube-video" href="https://www.youtube.com/watch?v=F3QpgXBtDeo" title="Youtube Video">Youtube Video</a>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>


<!-- end main-content -->




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>