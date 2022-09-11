@extends('admin.app')
@section('title','All Subscribers')
@section('subscribers','active')
@section('subscriber','active')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Subscriber Email</th>
                                    <th>Status</th>
                                    
                                 
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $data->email }}</td>
                                    @if ($data->status == 1)
                                    <td>Verified</td>
                                    @else
                                    <td>Unverified</td>
                                    @endif
                                    
                                    
                                

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
