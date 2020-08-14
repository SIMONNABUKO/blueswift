
@extends('admin')
@section('Profile', 'active')
@section('title', 'User DETAILS')


@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user"></i> @lang('USER DETAILS')</h1>
            
        </div>
        <div class="float-right">
            
            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
 Delete User
</button>

<!--Delete User Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #621f87;">
        <h5 class="modal-title text-light" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " >
        Are you sure you want to completely delete this user from the system?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
         <form action="{{route('admin.userDetails.deleteUser')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf

                <input  type="hidden" name="id" value="{{$data->id}}">
                <button type="submit" class="btn btn-danger">Delete User</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--END OF Delete User Modal -->
           
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="text-center">
                    @if($data->avatar == NULL)
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                      @else
                    <img style="max-height: 250px;" src="{{asset('assets/image/avatar/'.$data->avatar)}}" class="avatar img-circle img-thumbnail" alt="avatar">

                    @endif
                    <div class="col-md-12"><br>
                       <h5>{{$data->name}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-money" aria-hidden="true"></i>
                        <div class="info">
                             <h4>@lang('Current balance')</h4>
                            <p><b>{{$data->balance}} {{$gnl->cur}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-credit-card-alt"></i>
                        <div class="info">
                      <h4>@lang('Total Deposited')</h4>
                            <p><b>{{$totaldepo}} {{$gnl->cur}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="widget-small warning coloured-icon" ><i class="icon fa fa-reply" style="background-color: #28a745;"></i>
                        <div class="info">
                            <h4>@lang('Total Withdrawal')</h4>
                            <p><b>{{$totalwithd}} {{$gnl->cur}}</b></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tile">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block" href="{{route('admin.withdraw.report', $data->id)}}">Withdraw Report</a>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block" href="{{route('admin.transaction.report', $data->id)}}">Transaction Report  <br></a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block" href="#addsubModal" data-toggle="modal">Debit / Credit Balance</a>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block" href="#emailModal" data-toggle="modal">Send Mail</a>
                                <br>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="tile">
                <h3 class="tile-title">@lang('UPDATE PROFILE')</h3>
                <form action="{{route('admin.userDetails.update')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf

                    <input  type="hidden" name="id" value="{{$data->id}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('First Name')</label>
                            <input class="form-control form-control-lg" type="text" name="first_name" value="{{$data->first_name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Last Name')</label>
                            <input class="form-control form-control-lg" type="text" name="last_name" value="{{$data->last_name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Username')</label>
                            <input class="form-control form-control-lg" type="text" name="username" value="{{$data->username}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Account Number')</label>
                            <input class="form-control form-control-lg" type="text" name="account_number" value="{{$data->account_number}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Email')</label>
                            <input class="form-control form-control-lg" type="text" name="email" value="{{$data->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Mobile')</label>
                            <input class="form-control form-control-lg" type="text" name="phone" value="{{$data->phone}}">
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">@lang('Status')
                            </label><br>
                            <input type="checkbox" name="user_banned"
                                   @if($data->user_banned == 0) checked @endif
                                   data-toggle="toggle"   data-on="Active" data-off="Blocked"  data-onstyle="success" data-offstyle="danger" data-width="100%">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">@lang('Email Verification')
                            </label><br>
                            <input type="checkbox" name="email_verified"
                                   @if($data->email_verified == 1) checked @endif
                                   data-toggle="toggle"   data-on="Verified" data-off="Unverified"  data-onstyle="success" data-offstyle="danger" data-width="100%">
                        </div>
                        
                     
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">@lang('Mobile Verification')</label><br>
                            <input  type="checkbox" name="sms_verified"  @if($data->sms_verified == 1) checked @endif data-toggle="toggle"  data-on="Verified" data-off="Unverified" data-onstyle="success"  data-offstyle="danger" data-width="100%">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">@lang('User Approval')</label><br>
                            <input  type="checkbox" name="is_approved"  @if($data->is_approved == 1) checked @endif data-toggle="toggle"  data-on="Approved" data-off="Approve this user" data-onstyle="success"  data-offstyle="danger" data-width="100%">
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" style="width: 100%!important;" type="submit">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>



<div class="modal fade" id="addsubModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Debit/Credit Balance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="frmProducts" method="post" action="{{route('admin.add.sub',$data->id)}}" class="form-horizontal">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <strong>Select Type :</strong>
                        <input type="checkbox" name="type"
                               data-toggle="toggle"   data-on="Credit Balance" data-off="Debit Balance"  data-onstyle="success" data-offstyle="danger" data-width="100%">

                    </div>

                    <div class="form-group">
                        <strong>Amount :</strong>
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="amount">
                            <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$gnl->cur_symbol}}
                                        </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Description :</strong>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Send Mail {{$data->name}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="frmProducts" method="post" action="{{route('admin.sendMailToUser', $data->id)}}" class="form-horizontal">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <strong>Subject:</strong>
                        <input class="form-control" type="text" name="subject">
                    </div>

                    <div class="form-group">
                        <strong>Message:</strong>
                        <textarea class="form-control" rows="10" type="text" name="message"></textarea>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Send Mail</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
