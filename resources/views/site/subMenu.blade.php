<?php $parent = $page->parent;
    if(isset($parent->parent)) { $parent = $parent->parent; }
?>
@if($parent > null)


				<!-- side navigation -->
				<div class="side-nav mb-60 mt-30">
					
					<div class="side-nav-head">
						<button class="fa fa-bars"></button>
						<h4>@lang('site.subMenu')</h4>
					</div>
					<ul class="list-group list-group-bordered list-group-noicon uppercase">
                        @foreach($parent->children as $subMenu)
                            <li class="list-group-item">
                                <a @if(!$subMenu->hasChild()) href="{{$subMenu->getLink()}}" @else class="dropdown-toggle" @endif>
									@lang('site.getContent',['ar'=>$subMenu->title,'en'=>$subMenu->titleEn])
								</a>
								@if($subMenu->hasChild())
									<ul>
										@foreach($subMenu->children as $child)
											<li><a href="{{$child->getLink()}}">@lang('site.getContent',['ar'=>$child->title,'en'=>$child->titleEn])</a></li>
										@endforeach
									</ul>
								@endif
                            </li>
                        @endforeach
					</ul>
					<!-- /side navigation -->

				
				</div>
@endif