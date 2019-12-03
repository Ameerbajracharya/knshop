<br>
<h4>Reviews</h4>
<hr>
@php
if (isset($approved) and $approved == true) {
    $comments = $model->approvedComments;
} else {
    $comments = $model->comments;
}
@endphp

@if($comments->count() < 1)
<div class="alert alert-warning">There are no Reviews yet. Thank You!</div>
@endif

<ul class="list-unstyled">
    @php
    $grouped_comments = $comments->sortByDesc('created_at')->groupBy('child_id');
    $grouped_comments = $grouped_comments
    @endphp
    @foreach($grouped_comments as $comment_id => $comments)
    {{-- Process parent nodes --}}
    @if($comment_id == '')
    @foreach($comments as $comment)
    @include('comments::_comment', [
        'comment' => $comment,
        'grouped_comments' => $grouped_comments
        ])
        @endforeach
        @endif
        @endforeach
    </ul>

    @auth('client')
    @include('comments::_form')
    @elseif(config('comments.guest_commenting') == true)
    @include('comments::_form', [
        'guest_commenting' => true
        ])
        @else
        
        <div class="alert alert-danger">
            <h5 class="card-title" style="color: #f46600;">*** LogIn Required. ***</h5>
            <p class="card-text" style="color: #f46600;">Please Login To Provide Your Valueable Reviews. Thank You!</p>
            <a href="{{ route('client.login') }}" class="btn btn-primary">Log in</a>
        </div>

        @endauth
        <hr>
