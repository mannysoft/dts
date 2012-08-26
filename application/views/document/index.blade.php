@layout('template')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-head">
                <h3>Dashboard</h3>
            </div>
            <div class="box-content">
                Welcome!
                <ul class="quicktasks">
                    <li>
                        <a href="#">
                            <img src="{{URL::base()}}/public/img/icons/essen/32/lock.png" alt="">
                            <span>Security</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{URL::base()}}/public/img/icons/essen/32/user.png" alt="">
                            <span>Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="{{URL::base()}}/public/img/icons/essen/32/database.png" alt="">
                            <span>Database</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{URL::base()}}/public/img/icons/essen/32/email.png" alt="">
                            <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{URL::base()}}/public/img/icons/essen/32/date.png" alt="">
                            <span>Events</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection