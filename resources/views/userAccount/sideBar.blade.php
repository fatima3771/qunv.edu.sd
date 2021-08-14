<nav id="sideNav"><!-- MAIN MENU -->
    <ul class="nav nav-list">
        @if(auth()->guard('user')->user()->isExpiredMembership())
            <li class="bg-red">
                <a class="text-white">
                    <i class="main-icon fa fa-calendar-times-o" aria-hidden="true"></i>
                    <span>انتهت العضوية</span>
                </a>
            </li>
        @endif
        @if(auth()->guard('user')->user()->isActiveMembership())
            <li class="bg-olive">
                <a class="text-white">
                    <i class="main-icon fa fa-check-square-o" aria-hidden="true"></i>
                    <span>العضوية نشطة</span>
                </a>
            </li>
        @endif
        <li>
            <a  class="dashboard1" href="{{ request()->root() }}">
                <i class="main-icon fa fa-home" aria-hidden="true"></i>
                <span> @lang('site.home') </span>
            </a>
        </li>
        <li>
            <a href="{{ request()->root() }}/userAccount">
                <i class="main-icon fa fa-desktop" aria-hidden="true"></i>
                <span> حسابي </span>
            </a>
        </li>
        @if(auth()->guard('user')->user()->isMember())
            <li>
                <a href="{{ request()->root() }}/userAccount/card">
                    <i class="main-icon fa fa-credit-card" aria-hidden="true"></i>
                    <span>طلب بطاقة عضوية</span>
                </a>
            </li>
            <li>
                <a href="{{ request()->root() }}/userAccount/connect">
                    <i class="main-icon fa fa-mobile" aria-hidden="true"></i>
                    <span>طلب بطاقة اتصال</span>
                </a>
            </li>
            <li>
                <a href="{{ request()->root() }}/userAccount/withYou">
                    <i class="main-icon fa fa-users" aria-hidden="true"></i>
                    <span>طلب برنامج معاك</span>
                </a>
            </li>
            <li>
                <a href="{{ request()->root() }}/userAccount/certificate">
                    <i class="main-icon fa fa-certificate" aria-hidden="true"></i>
                    <span class="menu-text"> طلب شهادة فعالية </span>
                </a>
            </li>
        @endif
    </ul>
</nav>
