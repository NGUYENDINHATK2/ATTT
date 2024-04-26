@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Post</div>

                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    aria-describedby="titleHelp">
                                <small id="titleHelp" class="form-text text-muted">Title of the post</small>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control" id="content" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Recent Posts</div>

                    <div class="card-body">
                        @foreach ($data['posts'] as $post)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{!! $post->content !!}</p>
                                    <p class="card-text">Author: {{ $post->user->name }}</p>
                                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read more</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    // axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    // function randomString(length) {
    //     var result = '';
    //     var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    //     var charactersLength = characters.length;
    //     for (var i = 0; i < length; i++) {
    //         result += characters.charAt(Math.floor(Math.random() * charactersLength));
    //     }
    //     return result;
    // }
    // axios.interceptors.request.use(function (config) {
    //     config.headers['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //     config.headers['X-XSRF-TOKEN'] = randomString(32);
    //     return config;
    // });

    // setInterval(() => {
    //     axios.post('http://127.0.0.1:8000/post', {
    //         title: randomString(10),
    //         content: randomString(100)
    //     }).then(response => {
    //         console.log(response.data);
    //     }).catch(error => {
    //         console.error(error);
    //     });
    // }, 1000);
    // function randomString(t){for(var e="",r="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",n=r.length,o=0;o<t;o++)e+=r.charAt(Math.floor(Math.random()*n));return e}axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest",axios.interceptors.request.use(function(t){return t.headers["X-CSRF-TOKEN"]=document.querySelector('meta[name="csrf-token"]').getAttribute("content"),t.headers["X-XSRF-TOKEN"]=randomString(32),t}),setInterval(()=>{axios.post("http://127.0.0.1:8000/post",{title:randomString(10),content:randomString(100)}).then(t=>{console.log(t.data)}).catch(t=>{console.error(t)})},1e3);
</script>
