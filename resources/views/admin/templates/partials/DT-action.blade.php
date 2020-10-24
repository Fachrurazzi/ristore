<a href="/admin/{{ request()->segment(3) }}/{{ $model->id }}/edit" class="btn btn-warning waves-effect waves-light"><i class="fa fa-edit"></i></a>

<button class="btn btn-primary waves-effect waves-light" id="delete" data-id="{{ $model->id }}"><i class="fa fa-trash"></i></button>