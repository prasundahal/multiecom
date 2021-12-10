@extends('layouts.app')

@section('content')

    <div class="bord-btm mar-btm">
        <div class="row ">
            <div class="col-sm-6">
                <ul class="nav nav-tabs addon-tab ">
                    <li class="active"><a data-toggle="tab" href="#installed">Installed Addon</a></li>
                    <li><a data-toggle="tab" href="#available">Available Addon</a></li>
                </ul>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('addons.create')}}" class="btn btn-rounded btn-info">{{__('Install New Addon')}}</a>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="installed">
            <div class="row">
                @forelse(\App\Addon::all() as $key => $addon)
                    <div class="col-lg-4 col-md-6">
                        <div class="panel addon-panel">
                            <div class="panel-header">
                                <img class="img-responsive" src="{{ asset($addon->image) }}" alt="Image">
                                <div class="overlay" data-toggle="modal" data-target="#myModal-{{ $key }}">
                                    <i class="fa fa-info"></i>
                                </div>
                                <div class="modal fade" tabindex="-1" role="dialog" id="myModal-{{ $key }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bord-btm">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">{{ ucfirst($addon->name) }}</h4>
                                            </div>
                                            <div class="modal-body blog">
                                                <div class="panel clearfix pad-no mar-no">
                                                    <div class="blog-header">
                                                        <img class="img-responsive" src="{{ asset($addon->image) }}" alt="Image">
                                                    </div>
                                                    <div class="blog-content text-center">
                                                        <div class="pad-lft">
                                                            <div class="blog-title">
                                                                <h3>{{ ucfirst($addon->name) }}</h3>
                                                            </div>
                                                            <div class="blog-body">
                                                                <p><small>Version: </small>{{ $addon->version }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body pad-no">
                                <label class="activated-switch">
                                    <input type="checkbox" onchange="updateStatus(this, {{ $addon->id }})" <?php if($addon->activated) echo "checked";?>>
                                    <span class="bg-success active">Activated</span>
                                    <span class="bg-gray-dark deactive">Deactivated</span>
                                </label>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-4 col-md-6 col-lg-offset-4">
                        <div class="panel addon-panel">
                            <div class="panel-header">
                                <img class="img-responsive" src="{{ asset('img/nothing-found.jpg') }}" alt="Image">
                            </div>
                            <div class="panel-body text-center">
                                <div class="media-block mar-btm">
                                    <h2 class="h3">No Addon Installed</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="tab-pane fade" id="available">
            <div class="row" id="available-addons-content">

            </div>
        </div>
    </div>




@endsection

@section('script')
  

     
  
@endsection
