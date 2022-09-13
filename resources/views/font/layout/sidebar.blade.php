<div class="sidebar">

    <div class="widget">
        @foreach ($global_sidebar_top_ad as $data)


        <div class="ad-sidebar">
            @if($data->sidebar_ad_url == '')
            <img src="{{ asset('font_asset/uploads/'.$data->sidebar_ad) }}" alt="">
            @else
            <a href="{{ $data->sidebar_ad_url }}"><img src="{{ asset('font_asset/uploads/'.$data->sidebar_ad) }}" alt=""></a>
            @endif
        </div>
        @endforeach
    </div>

    <div class="widget">
        <div class="tag-heading">
            <h2>Tags</h2>
        </div>
        <div class="tag">
            @php
            $tags_array = [];
                $all_tags_data  = \App\Models\Tag::select('tag_name')->distinct()->get();







            @endphp

          @foreach($all_tags_data as $data)
            <div class="tag-item">
                <a href="{{ route('tag_post',$data->tag_name) }}"><span class="badge bg-secondary">{{ $data->tag_name }}</span></a>
            </div>
            @endforeach

        </div>
    </div>

    <div class="widget">
        <div class="archive-heading">
            <h2>Archive</h2>
        </div>
        <div class="archive">

                @php
                $archive_array = [];
                    $all_post_data  = \App\Models\Post::orderBy('id','desc')->get();
                    foreach($all_post_data as $data){
                        $ts =  strtotime($data->created_at);

                         $month = date('m',$ts);
                         $month1 = date('F',$ts);
                         $year = date('Y',$ts);
                         $archive_array[] =$month.'-'.$month1.'-'.$year;
                    }
                    $final_array = array_values(array_unique($archive_array));
                @endphp
            <form action="{{ route('archive_post') }}" method="POST">
                @csrf
                 <select name="archive_data" class="form-select" onchange="this.form.submit()">
                    <option value="">Select Month</option>
                    @for ($i=0;$i<count($final_array);$i++)
                         @php
                             $temp_array = explode('-',$final_array[$i]);
                         @endphp
                    <option value="{{ $temp_array[0].'-'.$temp_array[2] }}">{{  $temp_array[1]}} - {{ $temp_array[2] }}</option>

                    @endfor

            </select>
        </form>
        </div>
    </div>



    <div class="widget">
        <div class="news">
            <div class="news-heading">
                <h2>Popular Post</h2>
            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent Post</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular Post</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @foreach ($global_recent_post as $post)


                    <div class="news-item">
                        <div class="left">
                            <img src="{{ asset('font_asset/uploads/'.$post->post_photo) }}" alt="">
                        </div>
                        <div class="right">
                            <div class="category">
                                <span class="badge bg-success">{{ $post->subCategory->sub_category_name }}</span>
                            </div>
                            <h2><a href="{{ route('post_detail',$post->slug) }}">{{ $post->post_title }}</a></h2>
                            <div class="date-user">
                                <div class="user">
                                    @if($post->author_id == 0)
                                    <a href="">{{ App\Models\Admin::where('id',$post->admin_id)->first()->name }}</a>
                                    @else
                                    <a href="">{{ App\Models\Author::where('id',$post->author_id)->first()->name }}</a>
                                    @endif
                                </div>
                                <div class="date">
                                    <a href="">@php
                                        $ts =  strtotime($post->created_at);
                                        $final_date = date('d F, Y',$ts);
                                        @endphp
                                         {{ $final_date }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @foreach ($global_popular_post as $data)


                <div class="news-item">
                        <div class="left">
                            <img src="{{ asset('font_asset/uploads/'.$data->post_photo) }}" alt="">
                        </div>
                        <div class="right">
                            <div class="category">
                                <span class="badge bg-success">{{ $data->subCategory->sub_category_name }}</span>
                            </div>
                            <h2><a href="{{ route('post_detail',$data->slug) }}">{{ $data->post_title }}</a></h2>
                            <div class="date-user">
                                <div class="user">
                                    @if($post->author_id == 0)
                                    <a href="">{{ App\Models\Admin::where('id',$post->admin_id)->first()->name }}</a>
                                    @else
                                    <a href="">{{ App\Models\Author::where('id',$post->author_id)->first()->name }}</a>
                                    @endif
                                </div>
                                <div class="date">
                                    <a href="">@php
                                        $ts =  strtotime($data->created_at);
                                        $final_date = date('d F, Y',$ts);
                                        @endphp
                                         {{ $final_date }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>

    <div class="widget">
        @foreach ($global_sidebar_bottom_ad as $data)


        <div class="ad-sidebar">
            @if($data->sidebar_ad_url == '')
            <img src="{{ asset('font_asset/uploads/'.$data->sidebar_ad) }}" alt="">
            @else
            <a href="{{ $data->sidebar_ad_url }}"><img src="{{ asset('font_asset/uploads/'.$data->sidebar_ad) }}" alt=""></a>
            @endif
        </div>
        @endforeach
    </div>

    <div class="widget">
        <div class="poll-heading">
            <h2>Online Poll</h2>
        </div>
        <div class="poll">
            <div class="question">
                {!! $global_online_poll->poll !!}
            </div>
            @php
                $total_vote = ($global_online_poll->yes_vote+$global_online_poll->no_vote+$global_online_poll->no_comment_vote);
                if($total_vote == 0){
                    $yes_per = 0;
                    $no_per =0;
                    $no_com_per =0;
                }else{
                    $yes_per = $global_online_poll->yes_vote*100/$total_vote;
                $yes_per = ceil($yes_per);

                $no_per = $global_online_poll->no_vote*100/$total_vote;
                $no_per = ceil($no_per);

                $no_com_per = $global_online_poll->no_comment_vote*100/$total_vote;
                $no_com_per = ceil($no_com_per);
                }

            @endphp
            @if(session()->get('poll_id') == $global_online_poll->id)
            <div class="poll-result">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 150px">Yes ({{ $global_online_poll->yes_vote }})</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $yes_per }}%" aria-valuenow="{{ $yes_per }}" aria-valuemin="0" aria-valuemax="100">{{ $yes_per }}%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>No ({{ $global_online_poll->no_vote }})</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_per }}%" aria-valuenow="{{ $no_per }}" aria-valuemin="0" aria-valuemax="100">{{ $no_per }}%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>No Comment ({{ $global_online_poll->no_comment_vote }})</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $no_com_per }}%" aria-valuenow="{{ $no_com_per }}" aria-valuemin="0" aria-valuemax="100">{{ $no_com_per }}%</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="{{ route('old_poll_result') }}" class="btn btn-primary old" style="margin-top: 0;">Old Result</a>
            </div>
            @endif
            @if(session()->get('poll_id') != $global_online_poll->id)
            <div class="answer-option">
                <form action="{{ route('poll_submit',$global_online_poll->id) }}" method="post">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_1" value="yes" checked>
                        <label class="form-check-label" for="poll_id_1">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_2" value="no">
                        <label class="form-check-label" for="poll_id_2" >No</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_3" value="no_comment">
                        <label class="form-check-label" for="poll_id_3">No Comment</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('old_poll_result') }}" class="btn btn-primary old">Old Result</a>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>

</div>
