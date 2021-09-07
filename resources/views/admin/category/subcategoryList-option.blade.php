<?php $dash.='-- '; ?>
@foreach($children as $child)
    <option value="{{$child->id}}" {{(isset($edit_cat) && $edit_cat->parent_id == $child->id)?"selected":''}}><i>{{$dash}}</i>{{$child->name}}</option>
    @if(count($child->children))
        @include('admin.category.subCategoryList-option',['children' => $child->children])
    @endif
@endforeach