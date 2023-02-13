
@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

<form action="" method="POST">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tên danh mục</label>
            <input type="menu" name="name" value="{{ $menu->name }}" class="form-control" id="menu" placeholder="Nhập tên danh mục">
        </div>

        <div class="form-group">
            <label for="menu">Danh mục</label>
            <select name="parent_id"  class="form-control">
                <option value="0" {{ $menu->parent_id == 0 ? 'selected' : ''}} >Danh mục cha</option>
                @foreach($menus as $menuParent)
                    <option value="{{ $menuParent->id }}" 
                        {{ $menu->parent_id == $menuParent->id ? 'selected' : ''}}>
                            {{ $menuParent->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" id="content" class="form-control">{{ $menu->conetnt }}</textarea>
        </div>


        <div class="form-group">
            <label>Kích hoạt</label>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" 
                    name="active" {{ $menu->active == 1 ? 'checked=""' : ''}}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="0" id="no_active" 
                    name="active" {{ $menu->active == 0 ? 'checked=""' : ''}}>
                <label for="no_active" class="custom-control-label">Không</label>
            </div>

        </div>




    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
    </div>

    @csrf

</form>

@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection