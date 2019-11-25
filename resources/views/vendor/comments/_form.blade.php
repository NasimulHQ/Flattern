<form id="commentform" method="POST" action="{{ url('comments') }}" name="comment-form">
    @csrf
    <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
    <input type="hidden" name="commentable_id" value="{{ $model->id }}" />
    <div class="row">
        {{--<div class="span4">
            <input type="text" placeholder="* Enter your full name" />
        </div>
        <div class="span4">
            <input type="text" placeholder="* Enter your email address" />
        </div>
        <div class="span4 margintop10">
            <input type="text" placeholder="Enter your website" />
        </div>--}}
        <div class="span8 margintop10">
            <p>
                <textarea rows="12" name="message" class="input-block-level @if($errors->has('message')) is-invalid @endif" placeholder="*Your comment here"></textarea>
            </p>
            <p>
            <div class="invalid-feedback">
                Your message is required.
            </div>
            </p>
            <p>
                <button class="btn btn-theme margintop10" type="submit">Submit comment</button>
            </p>
        </div>
    </div>
</form>
{{--<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ url('comments') }}">
            @csrf
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->id }}" />
            <div class="form-group">
                <label for="message">Enter your message here:</label>
                <textarea class="form-control @if($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                <div class="invalid-feedback">
                    Your message is required.
                </div>
                <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Submit</button>
        </form>
    </div>
</div>--}}
<br />
