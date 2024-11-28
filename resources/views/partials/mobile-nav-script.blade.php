<script>
    $(document).ready(function() {
        $(window).bind('resize', function() {
            if ($(window).width() < 992) {
                var corporate = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('about', 'Board&CEO', 'Org-structure', 'Company-policy') ? 'active' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#cor" aria-controls="cor" aria-expanded="false" aria-label="Toggle navigation">
                       {{ __('all.nav.corporate.text') }}
                       </a>
                       <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="cor">
                           <li class="dropdown-submenu" id="mti_about">

                           </li>

                           <li><a class="dropdown-item" href="{{ route('organization-structure') }}">{{ __('all.nav.corporate.org') }}</a></li>
                           <li class="dropdown-submenu" id="policy">

                           </li>
                       </ul>`;
                $("#corporate").html(corporate);

                var mti_about = `<a class="dropdown-item sub-expanded" href="{{ route('about') }}" type="button" data-toggle="collapse" data-target="#mti" aria-controls="mti" aria-expanded="false" aria-label="Toggle navigation">{{ __('all.nav.corporate.about.mobile_title') }}</a>
                               <ul class="collapse navbar-collapse my-0 py-0" id="mti">
                                    <li><a class="dropdown-item" href="{{ route('about') }}">{{ __('all.nav.corporate.about.mti') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#history') }}">{{ __('all.nav.corporate.about.history') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#values') }}">{{ __('all.nav.corporate.about.VMV') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#slogan') }}">{{ __('all.nav.corporate.about.PS') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#resources') }}">{{ __('all.nav.corporate.about.RE') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#strategies') }}">{{ __('all.nav.corporate.about.strategies') }}</a></li>
                               </ul>`;

                $("#mti_about").html(mti_about);

                var policy = `<a class="dropdown-item sub-expanded" href="{{ route('corporate-policy') }}" type="button" data-toggle="collapse" data-target="#poli" aria-controls="poli" aria-expanded="false" aria-label="Toggle navigation">{{ __('all.nav.corporate.policy.text') }}</a>
                               <ul class="collapse navbar-collapse my-0 py-0" id="poli">
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#home">{{ __('all.nav.corporate.policy.COC') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#gov">{{ __('all.nav.corporate.policy.gov') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#ec">{{ __('all.nav.corporate.policy.EC') }}</a></li>
                               </ul>`;

                $("#policy").html(policy);

                var partners = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('partners') ? 'active' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#part" aria-controls="part" aria-expanded="false" aria-label="Toggle navigation">
                        {{ __('all.nav.partner.text') }}
                    </a>

                    <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="part">
                        <li><a class="dropdown-item" href="{{ route('partners') }}#home">{{ __('all.nav.partner.what-we-look') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('partners') }}#interest">{{ __('all.nav.partner.interest') }}</a></li>
                    </ul>`;

                $("#partners").html(partners);

                var investor = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('investment_relations', 'financial-reports', 'annual-reports', 'corporate-information') ? 'active' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#invest" aria-controls="invest" aria-expanded="false" aria-label="Toggle navigation">
                    {{ __('all.nav.investor.text') }}
                    </a>

                    <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="invest">
                        <li><a class="dropdown-item" href="{{ route('corporate-information.index') }}">{{ __('all.nav.investor.cor-info') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('financial-reports.index') }}">{{ __('all.nav.investor.financial') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('stock-information.index') }}">{{ __('all.nav.investor.stock-info') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('annual-reports.index') }}">{{ __('all.nav.investor.annual') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('meeting-minutes.index') }}">{{ __('all.nav.investor.meeting') }}</a></li>
                    </ul>`;

                $("#investor").html(investor);

                var language = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#lan" aria-controls="lan" aria-expanded="false" aria-label="Toggle navigation">
                        @if (session('locale') == 'mm')
                        <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">
                        @else
                        <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">
                        @endif
                    </a>

                    <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="lan">
                        @if (session('locale') == 'mm')
                        <li><a href="{{ route('language', 'en') }}" class="dropdown-item">
                                <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; English
                            </a>
                        </li>
                        @else
                        <li><a href="{{ route('language', 'mm') }}" class="dropdown-item">
                                <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; ​Myanmar
                            </a>
                        </li>
                        @endif
                    </ul>`;

                $("#language").html(language);
            } else {
                var corporate = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('about', 'Board&CEO', 'Org-structure', 'Company-policy') ? 'active' : '' }} dropdown-toggle expanded" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{ __('all.nav.corporate.text') }}
                       </a>
                       <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                           <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ route('about') }}">{{ __('all.nav.corporate.about.mti') }}</a>
                               <ul class="dropdown-menu my-0 py-0">
                                   <li><a class="dropdown-item" href="{{ url('about#history') }}">{{ __('all.nav.corporate.about.history') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#values') }}">{{ __('all.nav.corporate.about.VMV') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#slogan') }}">{{ __('all.nav.corporate.about.PS') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#resources') }}">{{ __('all.nav.corporate.about.RE') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#strategies') }}">{{ __('all.nav.corporate.about.strategies') }}</a></li>
                               </ul>
                           </li>

                           <li><a class="dropdown-item" href="{{ route('organization-structure') }}">{{ __('all.nav.corporate.org') }}</a></li>
                           <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ route('corporate-policy') }}">{{ __('all.nav.corporate.policy.text') }}</a>
                               <ul class="dropdown-menu my-0 py-0">
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#home">{{ __('all.nav.corporate.policy.COC') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#gov">{{ __('all.nav.corporate.policy.gov') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#ec">{{ __('all.nav.corporate.policy.EC') }}</a></li>
                               </ul>
                           </li>
                       </ul>`;
                $("#corporate").html(corporate);

                var partners = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ __('all.nav.partner.text') }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('partners') }}#home">{{ __('all.nav.partner.what-we-look') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('partners') }}#interest">{{ __('all.nav.partner.interest') }}</a></li>
                    </ul>`;

                $("#partners").html(partners);

                var investor = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('all.nav.investor.text') }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('corporate-information.index') }}">{{ __('all.nav.investor.cor-info') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('financial-reports.index') }}">{{ __('all.nav.investor.financial') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('stock-information.index') }}">{{ __('all.nav.investor.stock-info') }}</a></li>
                         <li><a class="dropdown-item" href="{{ route('annual-reports.index') }}">{{ __('all.nav.investor.annual') }}</a></li>
                         <li><a class="dropdown-item" href="{{ route('meeting-minutes.index') }}">{{ __('all.nav.investor.meeting') }}</a></li>
                    </ul>`;

                $("#investor").html(investor);


                var language = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        @if (session('locale') == 'mm')
                        <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">
                        @else
                        <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                        @if (session('locale') == 'mm')
                        <li><a href="{{ route('language', 'en') }}" class="dropdown-item">
                                <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; English
                            </a>
                        </li>
                        @else
                        <li><a href="{{ route('language', 'mm') }}" class="dropdown-item">
                                <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; ​Myanmar
                            </a>
                        </li>
                        @endif
                    </ul>`;

                $("#language").html(language);
            }
        })

        if ($(window).width() < 992) {
            var corporate = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('about', 'Board&CEO', 'Org-structure', 'Company-policy') ? 'active' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#cor" aria-controls="cor" aria-expanded="false" aria-label="Toggle navigation">
                       {{ __('all.nav.corporate.text') }}
                       </a>
                       <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="cor">
                           <li class="dropdown-submenu" id="mti_about">

                           </li>

                           <li><a class="dropdown-item" href="{{ route('organization-structure') }}">{{ __('all.nav.corporate.org') }}</a></li>
                           <li class="dropdown-submenu" id="policy">

                           </li>
                       </ul>`;
            $("#corporate").html(corporate);

            var mti_about = `<a class="dropdown-item sub-expanded" href="{{ route('about') }}" type="button" data-toggle="collapse" data-target="#mti" aria-controls="mti" aria-expanded="false" aria-label="Toggle navigation">{{ __('all.nav.corporate.about.mobile_title') }}</a>
                               <ul class="collapse navbar-collapse my-0 py-0" id="mti">
                                    <li><a class="dropdown-item" href="{{ route('about') }}">{{ __('all.nav.corporate.about.mti') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#history') }}">{{ __('all.nav.corporate.about.history') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#values') }}">{{ __('all.nav.corporate.about.VMV') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#slogan') }}">{{ __('all.nav.corporate.about.PS') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#resources') }}">{{ __('all.nav.corporate.about.RE') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#strategies') }}">{{ __('all.nav.corporate.about.strategies') }}</a></li>
                               </ul>`;

            $("#mti_about").html(mti_about);

            var policy = `<a class="dropdown-item sub-expanded" href="{{ route('corporate-policy') }}" type="button" data-toggle="collapse" data-target="#poli" aria-controls="poli" aria-expanded="false" aria-label="Toggle navigation">{{ __('all.nav.corporate.policy.text') }}</a>
                               <ul class="collapse navbar-collapse my-0 py-0" id="poli">
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#home">{{ __('all.nav.corporate.policy.COC') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#gov">{{ __('all.nav.corporate.policy.gov') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#ec">{{ __('all.nav.corporate.policy.EC') }}</a></li>
                               </ul>`;

            $("#policy").html(policy);

            var partners = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('partners') ? 'active' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#part" aria-controls="part" aria-expanded="false" aria-label="Toggle navigation">
                        {{ __('all.nav.partner.text') }}
                    </a>

                    <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="part">
                        <li><a class="dropdown-item" href="{{ route('partners') }}#home">{{ __('all.nav.partner.what-we-look') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('partners') }}#interest">{{ __('all.nav.partner.interest') }}</a></li>
                    </ul>`;

            $("#partners").html(partners);

            var investor = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('investment_relations', 'financial-reports', 'annual-reports', 'corporate-information') ? 'active' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#invest" aria-controls="invest" aria-expanded="false" aria-label="Toggle navigation">
                    {{ __('all.nav.investor.text') }}
                    </a>

                    <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="invest">
                        <li><a class="dropdown-item" href="{{ route('corporate-information.index') }}">{{ __('all.nav.investor.cor-info') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('corporate-information.index') }}">{{ __('all.nav.investor.cor-info') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('financial-reports.index') }}">{{ __('all.nav.investor.financial') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('stock-information.index') }}">{{ __('all.nav.investor.stock-info') }}</a></li>
                          <li><a class="dropdown-item" href="{{ route('annual-reports.index') }}">{{ __('all.nav.investor.annual') }}</a></li>
                          <li><a class="dropdown-item" href="{{ route('meeting-minutes.index') }}">{{ __('all.nav.investor.meeting') }}</a></li>
                    </ul>`;

            $("#investor").html(investor);


            var language = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} navbar-toggler expanded" type="button" data-toggle="collapse" data-target="#lan" aria-controls="lan" aria-expanded="false" aria-label="Toggle navigation">
                        @if (session('locale') == 'mm')
                        <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">
                        @else
                        <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">
                        @endif
                    </a>

                    <ul class="collapse navbar-collapse my-0 py-0" aria-labelledby="navbarDropdownMenuLink" id="lan">
                        @if (session('locale') == 'mm')
                        <li><a href="{{ route('language', 'en') }}" class="dropdown-item">
                                <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; English
                            </a>
                        </li>
                        @else
                        <li><a href="{{ route('language', 'mm') }}" class="dropdown-item">
                                <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; ​Myanmar
                            </a>
                        </li>
                        @endif
                    </ul>`;

            $("#language").html(language);
        } else {
            var corporate = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} {{ request()->is('about', 'Board&CEO', 'Org-structure', 'Company-policy') ? 'active' : '' }} dropdown-toggle expanded" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{ __('all.nav.corporate.text') }}
                       </a>
                       <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                           <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ route('about') }}">{{ __('all.nav.corporate.about.mti') }}</a>
                               <ul class="dropdown-menu my-0 py-0">
                                   <li><a class="dropdown-item" href="{{ url('about#history') }}">{{ __('all.nav.corporate.about.history') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#values') }}">{{ __('all.nav.corporate.about.VMV') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#slogan') }}">{{ __('all.nav.corporate.about.PS') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#resources') }}">{{ __('all.nav.corporate.about.RE') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ url('about#strategies') }}">{{ __('all.nav.corporate.about.strategies') }}</a></li>
                               </ul>
                           </li>

                           <li><a class="dropdown-item" href="{{ route('organization-structure') }}">{{ __('all.nav.corporate.org') }}</a></li>
                           <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ route('corporate-policy') }}">{{ __('all.nav.corporate.policy.text') }}</a>
                               <ul class="dropdown-menu my-0 py-0">
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#home">{{ __('all.nav.corporate.policy.COC') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#gov">{{ __('all.nav.corporate.policy.gov') }}</a></li>
                                   <li><a class="dropdown-item" href="{{ route('corporate-policy') }}#ec">{{ __('all.nav.corporate.policy.EC') }}</a></li>
                               </ul>
                           </li>
                       </ul>`;
            $("#corporate").html(corporate);

            var partners = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ __('all.nav.partner.text') }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('partners') }}#home">{{ __('all.nav.partner.what-we-look') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('partners') }}#interest">{{ __('all.nav.partner.interest') }}</a></li>
                    </ul>`;

            $("#partners").html(partners);

            var investor = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('all.nav.investor.text') }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('corporate-information.index') }}">{{ __('all.nav.investor.cor-info') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('financial-reports.index') }}">{{ __('all.nav.investor.financial') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('stock-information.index') }}">{{ __('all.nav.investor.stock-info') }}</a></li>
                          <li><a class="dropdown-item" href="{{ route('annual-reports.index') }}">{{ __('all.nav.investor.annual') }}</a></li>
                          <li><a class="dropdown-item" href="{{ route('meeting-minutes.index') }}">{{ __('all.nav.investor.meeting') }}</a></li>
                    </ul>`;

            $("#investor").html(investor);

            var language = `<a class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }} dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                        @if (session('locale') == 'mm')
                        <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">
                        @else
                        <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right my-0 py-0" aria-labelledby="navbarDropdownMenuLink">
                        @if (session('locale') == 'mm')
                        <li><a href="{{ route('language', 'en') }}" class="dropdown-item">
                                <img src="{{ url('images/english_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; English
                            </a>
                        </li>
                        @else
                        <li><a href="{{ route('language', 'mm') }}" class="dropdown-item">
                                <img src="{{ url('images/myanmar_flag.png') }}" width="30px" alt="">&nbsp;&nbsp;&nbsp; ​Myanmar
                            </a>
                        </li>
                        @endif
                    </ul>`;

            $("#language").html(language);
        }
    })
</script>
