@if (count($errors) > 0)
    <div class="alert alert-danger ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <ul>
            {{--            @if(session('expired'))--}}
            {{--                <li>hiiiiiiiii</li>--}}
            {{--            @endif--}}
            {{--            @foreach ($errors->first() as $error)--}}

            <li>{{ $errors->first() }}</li>


        </ul>
    </div>
@endif