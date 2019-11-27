@extends('layouts.app')


@push('css')
@toastr_css
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
@endpush
@section('content')

<div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <!-- <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Archive</a>
                                    <a class="dropdown-item" href="#">Print</a>
                                    <a class="dropdown-item" href="#">Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">User</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a>
                            </li>
                            <li class="breadcrumb-item active">User
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @role('SuperAdmin')
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{url('User/create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
        @endrole
    </div>
                    <!-- DataTable starts -->
                    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Gestione del parco contenitori</p>
                            <div class="table-responsive">
                                <table class="table table-sm zero-configuration">
                                    <thead>
                                    <tr>
                                    <th> <a href="#">id</a>  </th>

                                        <th> <a href="#">Name</a>  </th>
                                        <th> <a href="#">Email </a> </th>
                                        <th>  <a href="#">Password </a> </th>
                                        <th>  <a href="#">Roles </a> </th>


                                    

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $use)
                                    <tr>
                                        <td>{{$use->id}}</td>
                                        <td>{{$use->name}}</td>
                                        <td>{{$use->email}}</td>
                                        <td>{{$use->password}}</td>
                                        <td>
                                            <ul>
                                                @foreach(all_roles($use->id) as $roles)
                                                <li>
{{$roles->name}}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>

                                    @role('SuperAdmin')
                                        

                                        <td>
                                                        <a href="{{route('User.edit',$use->id)}}" class=""><i
                                                            class="feather icon-edit" vx-tooltip
                                                            title="Modifica"></i></a>
                                               
                                                            <button class="fabutton"  data-toggle="modal" data-target="#confirm-delete{{$use->id}}">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                                </td>
                                                @endrole
                                    </tr>
                                    <div class="modal fade" id="confirm-delete{{$use->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                               Do You Really Want to Delete?
                                                            </div>
                                                            <div class="modal-body">
                                                                    <form action="{{route('User.destroy', $use->id)}}" method="POST">
                                    
                                                                    @csrf
                                                            @method('DELETE')
                                                            </div>
                                                            <div class="modal-footer">
                                                                   
                                                                    <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                                </form>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                                
@endforeach
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4>ADD NEW DATA</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-category"> Category </label>
                                            <select class="form-control" id="data-category">
                                                <option>Audio</option>
                                                <option>Computers</option>
                                                <option>Fitness</option>
                                                <option>Appliance</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-status">Order Status</label>
                                            <select class="form-control" id="data-status">
                                                <option>Pending</option>
                                                <option>Canceled</option>
                                                <option>Delivered</option>
                                                <option>On Hold</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-price">Price</label>
                                            <input type="number" class="form-control" id="data-price">
                                        </div>
                                        <div class="col-sm-12 data-field-col data-list-upload">
                                            <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                                <div class="dz-message">Upload Image</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
    <!--/ Zero configuration table -->
  @push('js')
  @jquery
  @toastr_js
  @toastr_render
  @endpush
@endsection

