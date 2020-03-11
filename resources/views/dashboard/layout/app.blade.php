@extends('layouts.app')

@section('content')

<!-- <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">User Dashboard</h1>
                            <p>Welcome</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section> -->
    <!--/#page-breadcrumb-->

    <section id="projects" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="sidebar portfolio-sidebar">
                        <div class="sidebar-item categories">
                            <h3>Menu</h3>
                            <ul class="nav navbar-stacked">
                            @if(auth()->check())
                            @if(auth()->user()->admin == 1)
                                <li class="submenu @if(Request::is('dashboard/user/*')) active @endif"><a href="#" class="btn-submenu">Staff<span class="pull-right">(1)</span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('create.user')}}">Create</a></li>
                                        <li><a href="{{route('view.users')}}">View</a></li>
                                    </ul>
                                </li>
                                <li class="@if(Request::is('dashboard/permission/staff')) active @endif"><a href="{{route('view.staff.permission')}}">Assign Permission</a>
                                </li>
                                 <li class="submenu @if(Request::is('dashboard/assign-supervisor/*')) active @endif"><a href="#" class="btn-submenu">Assign Supervisor<span class="pull-right"></span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('assign.supervisor')}}">Create</a></li>
                                        <li><a href="{{route('view.assign.supervisor')}}">View</a></li>
                                    </ul>
                                </li>
                                <li class="submenu @if(Request::is('dashboard/department/*')) active @endif"><a href="#" class="btn-submenu" > Department</a>
									<ul class="nav collapse"  >
										<li><a href="{{route('create.department')}}">Create</a></li>
										<li><a href="{{route('view.department')}}">View</a></li>
									</ul>
								</li>
                                <li class="submenu @if(Request::is('dashboard/job-title/*')) active @endif"><a href="#" class="btn-submenu" > Job Title<span class="pull-right">(8)</span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('create.job_title')}}">Create</a></li>
                                        <li><a href="{{route('view.job_title')}}">View</a></li>
                                    </ul>
                                </li>
                                <li class="submenu @if(Request::is('dashboard/account-type/*')) active @endif"><a href="#" class="btn-submenu" > Account Type<span class="pull-right"></span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('create.account_type')}}">Create</a></li>
                                        <li><a href="{{route('view.account_type')}}">View</a></li>
                                    </ul>
                                </li>
                                <li class="@if(Request::is('dashboard/appraisal/send-appraisal')) active @endif"><a href="{{route('send.appraisal')}}">Send Appraisal Form</a>
                                </li>
                                <li class="@if(Request::is('dashboard/appraisal/admin/view')) active @endif"><a href="{{route('admin.view.appraisal')}}">View All Appraisals<span class="pull-right"></span>
                                </a>
                                </li>



                                @endif

                                @if(auth()->user()->auditor == 1 || auth()->user()->admin == 1)
                                <li class="submenu @if(Request::is('dashboard/account-verify/*')) active @endif"><a href="#" class="btn-submenu" > Auditor Verify  Accounts<span class="pull-right"></span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('view.account.for.verify')}}">View Account For Verify</a></li>
                                    </ul>
                                </li>

                                <li class="submenu @if(Request::is('dashboard/mobilisation-verify/*')) active @endif"><a href="#" class="btn-submenu" > Auditor Verify Deposit Mobilisation<span class="pull-right"></span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('view.deposit.mobilisation.for.verify')}}">View Mobilisation For Verify</a></li>
                                    </ul>
                                </li>
                                @endif

                                <li class="@if(Request::is('dashboard/appraisal/view')) active @endif"><a href="{{route('view.appraisal')}}" >View Appraisals<span class="pull-right"></span>
                                </a>
                                </li>
                                <li class="@if(Request::is('dashboard/appraisal/my-appraisal')) active @endif"><a href="{{route('view.my.appraisal')}}" >View My Appraisals<span class="pull-right"></span>
                                </a>
                                </li>
                                <li class="submenu @if(Request::is('dashboard/account/*')) active @endif"><a href="#" class="btn-submenu" > {{auth()->user()->fullname}} Accounts<span class="pull-right"></span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('create.account')}}">Create</a></li>
                                        <li><a href="{{route('view.account')}}">View</a></li>
                                    </ul>
                                </li>

                                <li class="submenu @if(Request::is('dashboard/mobilisation/*')) active @endif"><a href="#" class="btn-submenu" > Deposit Mobilisation<span class="pull-right"></span></a>
                                    <ul class="nav collapse"  >
                                        <li><a href="{{route('create.deposit.mobilisation')}}">Create</a></li>
                                        <li><a href="{{route('view.deposit.mobilisation')}}">View</a></li>
                                    </ul>
                                </li>

                                
                               <!--  <li><a href="#">Save Appraisals<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Pending Apraisals<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">History<span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Approve<span class="pull-right">(8)</span></a></li> -->
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                	@yield('dashboard-content')
                </div>
        </div>
        </div>
    </section>

    <!-- Draft and Publish Modal Begins -->
    <div id="modalStatus" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to <span class="status">publish</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                    <form style="display: inline-block;" action="" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="put">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Draft and Publish Modal End -->

    <!--Edit Modal Begins -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">EDIT</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to EDIT?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-primary"> EDIT </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal End -->

    <!--Edit Modal Begins -->
    <div id="transferModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">TRANSFER</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to TRANSFER ACCOUNT TO STAFF?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-primary"> TRANSFER </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal End -->

    <!--DELETE Modal Begins -->
    <div id="deleteModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">DELETE</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to DELETE?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <form style="display: inline-block;" action="" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-denger">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE Modal End -->
    
</section>

@endsection