@extends('layouts.app')

@section('content')
@push('css')
 
<script type="text/javascript" src="{{asset ('app-assets/css/plugins/mock.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset ('app-assets/css/plugins/jquery.dropdown.css')}}">
<script src="{{asset ('app-assets/css/plugins/jquery.dropdown.js')}}"></script>
@endpush
<div class="card">
        <div class="card-header">
            <h4 class="mb-0">Contenitori</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('Role.update',$role->id) }}">
            @csrf
            @method('PUT')

            <div class="card-content">
                <div class="card-body">
                   
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Name</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="name" type="text" class="form-control input-sm" value="{{$role->name}}"
                                   placeholder="Role Name" required>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Permission</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                
                                <select required="" data-select-2="" name="permission[]"
                                        class="form-control input-sm select2-hidden-accessible" multiple id="crud-contratto mul-2">
                                   @foreach (permission() as $item)
                            <option
                            @foreach($per as $peri) 
                            @if($item->id==$peri->permission_id)

                            selected

                            value="{{$item->id}}"
                            @endif
                            @endforeach
                             >{{$item->name}}</option>
                                       
                                   @endforeach
                                    
                                   
                                </select>
                            </div>
                        </div>    
                    {{-- <div class="row">
                            <div class="col-sm-4">
                              <div class="text-info">Single Mode</div><br>
                              <div class="dropdown-mul-2">
                                    <select style="display:none"  name="" id="mul-2" multiple placeholder="Select">
                                      <option value="1" selected>1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                   
                                    </select>
                                  </div>
                            </div>
                          </div> --}}


                    <hr>


                </div>
            </div>
            <div class="card-footer mb-3">
                <div class="pull-right">

              
                      <button type="reset" class="btn btn-warning btn-xs text-white">Cancel</button>  
                   
                    <button type="submit" class="btn btn-success btn-xs text-white">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>








    <script>
            var Random = Mock.Random;
            var json1 = Mock.mock({
              "data|10-50": [{
                name: function () {
                  return Random.name(true)
                },
                "id|+1": 1,
                "disabled|1-2": true,
                groupName: 'Group Name',
                "groupId|1-4": 1,
                "selected": false
              }]
            });
        
            $('.dropdown-mul-1').dropdown({
              data: json1.data,
              limitCount: 40,
              multipleMode: 'label',
              choice: function () {
                // console.log(arguments,this);
              }
            });
        
            var json2 = Mock.mock({
              "data|10000-10000": [{
                name: function () {
                  return Random.name(true)
                },
                "id|+1": 1,
                "disabled": false,
                groupName: 'Group Name',
                "groupId|1-4": 1,
                "selected": false
              }]
            });
        
            $('.dropdown-mul-2').dropdown({
              limitCount: 5,
              searchable: false
            });
        
            $('.dropdown-sin-1').dropdown({
              readOnly: true,
              input: '<input type="text" maxLength="20" placeholder="Search">'
            });
        
          
          </script>

@endsection