@extends('backend.master')
@section('home')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Warning Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Success Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body">
                    <table class="table table-success table-striped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Main Url</th>
                          <th scope="col">Short Url</th>
                          <th scope="col">Time</th>
                          <th scope="col">Visites</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                        @php($i=0)
                          @foreach ($urlShortInfo  as $urlShortIn)
                          <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $urlShortIn->main_url }}</td>
                            <td>{{ $urlShortIn->short_url }}</td>
                            <td>{{ $urlShortIn->time }}</td>
                            <td>{{ $urlShortIn->visites }}</td>
                            <td><a href="{{ route('time.change', $urlShortIn->id) }}"><i class="fa-solid fa-file-pen"></i></a> </td>
                          </tr> 
                          @endforeach
                      </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.filter') }}" method="get">
                            @csrf
                            <label for="birthday">Start Date:</label>
                            <input type="date" id="birthday" name="start_date">
                            <label for="birthday">End Date:</label>
                            <input type="date" id="birthday" name="end_date">
                            <input type="submit" value="Filter">
                          </form>
                    </div>
                </div>
            </div>
          
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <a href="{{ url('exportTo/csv') }}">Export CSV</a>
            </div>
            <div class="card-body">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">IP Address</th>
                          <th scope="col">Location</th>
                          <th scope="col">Latitude</th>
                          <th scope="col">Longitude</th>
                          <th scope="col">Browser</th>
                          <th scope="col">OS Name</th>
                          <th scope="col">Device Name</th>
                          <th scope="col">Main Url</th>
                          <th scope="col">Short_url</th>
                          <th scope="col">visites</th>
                          <th scope="col">QR Code</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          
                        @php($i=0)
                          @foreach ($user_agent_infos  as $user_agent_info )
                          @php($result = $user_agent_info->ip_address . ' ' . $user_agent_info->location. ' ' .$user_agent_info->userInfo->main_url )
                          <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $user_agent_info->ip_address }}</td>
                            <td>{{ $user_agent_info->location }}</td>
                            <td>{{ $user_agent_info->latitude }}</td>
                            <td>{{ $user_agent_info->longitude }}</td>
                            <td>{{ $user_agent_info->browser }}</td>
                            <td>{{ $user_agent_info->os_name }}</td>
                            <td>{{ $user_agent_info->device }}</td>
                            <td>{{ $user_agent_info->userInfo->main_url }}</td>
                            <td>{{ $user_agent_info->userInfo->short_url }}</td>
                            <td>{{ $user_agent_info->userInfo->visites }}</td>
                            <td>{{QrCode::generate($result);}}</td>
                          </tr> 
                          @endforeach
                      </tbody>
                </table>
                <div class="d-felx justify-content-center">

                    {{ $user_agent_infos->links() }}
        
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
