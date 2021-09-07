@foreach($files as $file)

    <input class="imageClass" type="radio" id="image-{{$file->id}}"
           value="{{$file->id}}">
    <label for="image-{{$file->id}}" class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
        <div class="card app-file-list">
            <div class="app-file-icon p-0"
                 style="height:100px;display: flex;align-items: center;justify-content: center;">
                {!! $file->preview !!}
            </div>
            <div class="p-2 small">
                <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;padding-left: 10px;">
                    {{$file->file_real_name}}
                </div>
                <div class="text-muted">
                    {{$file->format_size}}
                </div>
                <div class="dropdown position-absolute right-0 mr-1" style="bottom: 15%;">
                    <a href="#" class="font-size-14 pl-2 pr-2" data-toggle="dropdown">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form class="dropdown-item" method="POST" action="{{ route('admin.file.delete',[$file->id]) }}">
                            @csrf
                            @method('delete')
                            <button class="btn p-0 btnDelete" type="submit">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </label>

@endforeach
