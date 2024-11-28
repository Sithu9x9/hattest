@inject('request', 'Illuminate\Http\Request')

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <x-sidebar-item
                route="admin.dashboard"
                icon="fas fa-th-large"
                title="Dashboard"
                activeWord="dashboard"
            />
            <x-sidebar-item
                route="admin.act.index"
                icon="fas fa-users"
                title="Activities"
                activeWord="activities"
            />
            <x-sidebar-item
                route="admin.corporate.index"
                icon="fas fa-people-carry"
                title="Corporate Information"
                activeWord="corporate"
            />
            <x-sidebar-item
                route="admin.stock.index"
                icon="fas fa-chart-line"
                title="Stock Information"
                activeWord="stock"
            />
            <x-sidebar-item
                route="admin.career.index"
                icon="fas fa-briefcase"
                title="Career"
                activeWord="career"
            />
            <x-sidebar-item
                route="admin.annual.index"
                icon="fas fa-file-contract"
                title="Annual Reports"
                activeWord="annual_reports"
            />
            <x-sidebar-item
                route="admin.financial.index"
                icon="fas fa-file-invoice-dollar"
                title="Financial Reports"
                activeWord="financial_reports"
            />
            <x-sidebar-item
                route="admin.meeting.index"
                icon="fas fa-file-alt"
                title="Meeting Minute"
                activeWord="meeting-minute"
            />
            <x-sidebar-item
                route="register"
                icon="fas fa-user-cog"
                title="Admin Register"
                activeWord="register"
            />
            <x-sidebar-item
                route="auth.change_password"
                icon="fas fa-key"
                title="Change Password"
                activeWord="change_password"
            />

            {{-- <x-sidebar-item route="admin.slider.index" icon="fas fa-sliders-h" title="Slider" activeWord="slider"/> --}}

            <x-sidebar-item
                route="admin.sliders.index"
                icon="fas fa-sliders-h"
                title="Sliders"
                activeWord="sliders"
            />
            <x-sidebar-item
                route="admin.products.index"
                icon="fab fa-product-hunt"
                title="Products"
                activeWord="products"
            />
            <x-sidebar-item
                route="admin.services.index"
                icon="fas fa-box-open"
                title="Services"
                activeWord="services"
            />
            <x-sidebar-item
                route="admin.clients.index"
                icon="fas fa-handshake"
                title="Clients"
                activeWord="clients"
            />
            <li>
                <a
                    href="#logout"
                    onclick="$('#logout').submit();"
                >
                    <i
                        class="fas fa-sign-out-alt"
                        style="margin-right: 5px;"
                    ></i>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'logout', 'style' => 'display:none;']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}
