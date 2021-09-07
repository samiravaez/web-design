<?php $dash.='-- '; ?>
@foreach($children as $child)
    <tr><td><i>{{$dash}}</i>{{ $child->name }}</td>
        <td>{{ $child->description }}</td>
        {{--                                                <td>{{ $category->slug }}</td>--}}
<td>

        <a href="#" class="btn btn-sm"
           data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" type="button" href="{{route("category.edit",$child->id)}}">ویرایش</a>
            <form method="post" action="{{route("category.destroy",$child->id)}}">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <button class="dropdown-item" type="submit">حذف</button>
            </form>
        </div>
        </td>
    </tr>

    @if(count($child->children))
        @include('admin.category.subCategoryShow',['children' => $child->children])
    @endif
@endforeach