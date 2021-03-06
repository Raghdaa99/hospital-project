@extends('cms.parent')

@section('styles')

@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <form id="create-form">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Category Title</label>
                            <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Category Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{old('description')}}</textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <button type="button" onclick="performStore()" class="btn btn-success float-right">
                    Create new Category</button>

            </div>
        </div>
    </form>
</section>
<!-- /.content -->
@endsection
@section('title')
Add Category
@endsection
@section('title_page')
Add Categories Page
@endsection

@section('scripts')

<script>
    function performStore() {

        axios.post('/cms/admin/categories', {
                title: document.getElementById('title').value,
                description: document.getElementById('description').value,

            })
            .then(function(response) {
                toastr.success(response.data.message);

                console.log(response);
                document.getElementById('create-form').reset();
            })
            .catch(function(error) {
                toastr.error(error.response.data.message);

                console.log(error.response.data.message);
            });
    }
</script>
@endsection