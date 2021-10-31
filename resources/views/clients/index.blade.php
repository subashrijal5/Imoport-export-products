@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row ">
        <a class="btn btn-success m-2" href="{{route('clients.export')}}">Export To Excel</a>
        <a class="btn btn-primary m-2" href="{{route('clients.create')}}">Add new</a>
    </div>
    <div class="row">
        <table id="client_datatable" class="table table-hover responsive nowrap" style="width:100%">
            <thead>
              <tr>
                <th>Client Name</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Nationality</th>
                <th>Education background</th>
                <th>preffrerd contact mode</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($clients as $key => $client)
              <tr>

                <td>
                  <a href="#">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-blue mr-3">{{$key + 1}}</div>

                      <div class="">
                        <p class="font-weight-bold mb-0">{{$client->name ?? ''}}</p>
                        <p class="text-muted mb-0">{{$client->email ?? ''}}</p>
                      </div>
                    </div>
                  </a>
                </td>
                <td>{{$client->phone ?? ''}}</td>
                <td>{{$client->gender ?? ''}}</td>
                <td>{{$client->date_of_birth ?? ''}}</td>
                <td>
                    {{$client->address ?? ''}}
                </td>
                <td>
                    {{$client->nationality ?? ''}}
                </td>
                <td>
                    {{$client->education_background ?? ''}}
                </td>
                <td>
                    {{$client->prefered_contact_mode ?? ''}}
                </td>
              </tr>
              @empty
           <tr>
                <td>No clients Found</td>
            </tr>
              @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection
@section('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@include('clients.script')
@endsection
@section('page_header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
@endsection
