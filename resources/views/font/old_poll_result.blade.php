@extends('font.layout.app')
@section('title','Old Poll Result')
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Poll Results</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Poll Results</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
@foreach ($datas as $data)
@if ($loop->iteration ==1)
@continue

@endif
@php
$total_vote = ($data->yes_vote+$data->no_vote+$data->no_comment_vote);
if($total_vote == 0){
    $yes_per = 0;
    $no_per =0;
    $no_com_per =0;
}else{
$yes_per = $data->yes_vote*100/$total_vote;
$yes_per = ceil($yes_per);

$no_per = $data->no_vote*100/$total_vote;
$no_per = ceil($no_per);

$no_com_per = $data->no_comment_vote*100/$total_vote;
$no_com_per = ceil($no_com_per);
}

@endphp
                <div class="poll-item">
                    <div class="question">
                        {!! $data->poll !!}
                    </div>
                    <div class="poll-date">
                        <b>Poll Date:</b>   @php
                        $ts =  strtotime($data->created_at);
                        $final_date = date('d F, Y',$ts);
                        @endphp
                         {{ $final_date }}
                    </div>

                    <div class="total-vote">
                        <b>Total Votes:</b> {{ $total_vote }}
                    </div>
                    <div class="poll-result">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Yes ({{ $data->yes_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $yes_per }}%" aria-valuenow="{{ $yes_per }}" aria-valuemin="0" aria-valuemax="100">{{ $yes_per }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No ({{ $data->no_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_per }}%" aria-valuenow="{{ $no_per }}" aria-valuemin="0" aria-valuemax="100">{{ $no_per }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Comment ({{ $data->no_comment_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $no_com_per }}%" aria-valuenow="{{ $no_com_per }}" aria-valuemin="0" aria-valuemax="100">{{ $no_com_per }}%</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach











            </div>
        </div>
    </div>
</div>
@endsection
