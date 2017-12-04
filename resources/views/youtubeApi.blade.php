@php


@endphp
<html>
    <header>
    <title>youtube api testing page</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <style type="text/css">
        h1 {
            text-align: center;
            margin: 50px auto;
        }
        .wrapper {
            width: 90%;
            margin: 0 auto;
        }
        #player {
            width: 550px;
            margin: 0 auto;
        }
        .text-center {
            text-align: center;
        }
    </style>
    </header>

    <body>
        @if(isset($res["items"][0]["snippet"]["thumbnails"]["maxres"]["url"]))
        <div class="heroPic"><img src='{{ $res["items"][0]["snippet"]["thumbnails"]["maxres"]["url"] }}' width="100%"></div>
        @else
        <div class="heroPic"><img src='{{ $res["items"][0]["snippet"]["thumbnails"]["high"]["url"] }}' width="100%"></div>
        @endif
        <h1>youtube api testing page</h1>
        <div class="text-center">REQUEST = {{ $curl_url }}</div>
        <hr />
        <div class="wrapper">
            <div class="panel">
                <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
                <div class="row">
                    <div class="col-6">
                        <div id="player"></div>
                        <br /><br />
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Video id</th>
                                    <td>{{ $res["items"][0]["id"] }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Video link</th>
                                    <td>https://www.youtube.com/watch?v={{ $res["items"][0]["id"] }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Video title</th>
                                    <td>{{$res["items"][0]["snippet"]["title"]}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Channel id</th>
                                    <td>{{$res["items"][0]["snippet"]["channelId"]}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Channel title</th>
                                    <td>{{$res["items"][0]["snippet"]["channelTitle"]}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">description</th>
                                    <td>{!! nl2br($res["items"][0]["snippet"]["description"]) !!}</td>
                                </tr>

                                @if(isset($res["items"][0]["snippet"]["tags"]))
                                <tr>
                                    <th scope="row">tags</th>
                                    <td>{{ implode(",", $res["items"][0]["snippet"]["tags"]) }}</td>
                                </tr>
                                @endif

                                <tr>
                                    <th scope="row">viewCount</th>
                                    <td>{{ $res["items"][0]["statistics"]["viewCount"] }}</td>
                                </tr>

                                @if(isset($res["items"][0]["statistics"]["likeCount"]))
                                <tr>
                                    <th scope="row">likeCount</th>
                                    <td>{{ $res["items"][0]["statistics"]["likeCount"] }}</td>
                                </tr>
                                @endif

                                @if(isset($res["items"][0]["statistics"]["dislikeCount"]))
                                <tr>
                                    <th scope="row">dislikeCount</th>
                                    <td>{{ $res["items"][0]["statistics"]["dislikeCount"] }}</td>
                                </tr>
                                @endif

                                @if(isset($res["items"][0]["statistics"]["commentCount"]))
                                <tr>
                                    <th scope="row">commentCount</th>
                                    <td>{{ $res["items"][0]["statistics"]["commentCount"] }}</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <!-- basic thumbnails -->
                        <h3>default</h3>
                        <img src="{{ $res["items"][0]["snippet"]["thumbnails"]["default"]["url"] }}"><hr />
                        <!-- medium quality version of the thumbnail -->
                        <h3>mqdefault</h3>
                        <img src="{{ $res["items"][0]["snippet"]["thumbnails"]["medium"]["url"] }}"><hr />
                        <!-- high quality version of the thumbnail -->
                        <h3>hqdefault</h3>
                        <img src="{{ $res["items"][0]["snippet"]["thumbnails"]["high"]["url"] }}"><hr />
                        <!-- maximum resolution version of the thumbnail -->
                        <h3>maxresdefault</h3>
                        (see the top pic in this page)<hr />
                    </div>
                </div>
            </div>

        </div>


        <script>
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";

            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: "{{$res["items"][0]["id"]}}",
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                event.target.playVideo();
            }

            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.
            var done = false;
            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.PLAYING && !done) {
                    //setTimeout(stopVideo, 6000);
                    //done = true;
                }
            }
            function stopVideo() {
                player.stopVideo();
            }
        </script>
    </body>
</html>
